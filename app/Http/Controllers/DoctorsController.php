<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Hospital;
use App\User;
use App\Department;
use App\Referral;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         if(Auth::check()){

            //dump(Auth::user()->id);

            if(Auth::user()->role_id == 2){

                $user_email = Auth::user()->email;

                $doctor = Doctor::where('email', $user_email)->first();

                $hospital_id = $doctor->hospital_id;

                $doctors = DB::table('doctors')
                ->leftJoin('departments', 'doctors.department_id', '=', 'departments.id')
                ->select('doctors.*', 'departments.name as department')
                ->where('hospital_id', $hospital_id)
                ->get();

                return view('doctors.index',['doctors' => $doctors, 'hospital_id' => $hospital_id]);
            }
            else{
                $user_id = Auth::user()->id;

                $doctors = DB::table('doctors')
                ->leftJoin('departments', 'doctors.department_id', '=', 'departments.id')
                ->select('doctors.*', 'departments.name as department')
                ->where('user_id', $user_id)
                ->get();

                $hospital = Hospital::where('user_id', Auth::user()->id)->first();

                return view('hospitals.index2',['doctors' => $doctors,'hospital' => $hospital]);
            }

        }

        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $hospital = Hospital::where('user_id', Auth::user()->id)->first();

        $departments = DB::table('departments')->get();

        return view('doctors.create', ['hospital_id' => $hospital->id, 'departments' => $departments]);
    }

    public function show_all_doctors(){

        $doctors = DB::table('doctors')->get();

        return view('doctors.show_all',['doctors' => $doctors]);
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if(Auth::check()){

            $doctor = Doctor::create([
                'doctor_name' => $request->input('doctor_name'),
                'department_id' => $request->input('department_id'),
                'contact' => $request->input('contact'),
                'email' => $request->input('email'),
                'working_hours' => $request->input('working_hours'),
                'hospital_id' => $request->input('hospital_id'),
                'user_id' => $request->user()->id
                //'user_id' => Auth::user()->id
            ]);

            $user = User::create([
                'name' => $request->input('doctor_name'),
                'email' => $request->input('email'),
                'role_id' => 2,
                'password' => Hash::make($request->input('password'))
            ]);


            if($doctor && $user){

                return redirect()->route('doctors.index')
                ->with('success', 'Doctor added succesfully');
            }
            return back()->withInput()->with('errors', 'Error while registering User');
        }

        return back()->withInput()->with('errors', 'You are not logged in!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $Doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {


        $doctor = Doctor::find($doctor->id);

        $department = Department::find($doctor->department_id);

        return view('doctors.show', ['doctor' => $doctor, 'department' => $department]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $Doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $user_id = Auth::user()->id;

        $hospital = Hospital::where('user_id',$user_id)->first();

        $hospital_id = $hospital->id;

        $doctor = Doctor::find($doctor->id);

        $departments = DB::table('departments')->get();

        return view('doctors.edit', ['hospital_id' => $hospital->id, 'departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $Doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $Doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $hospital = Hospital::where('user_id',Auth::user()->id)->first();

        $findDoctor = Doctor::find($doctor->id);

        $user_id = Auth::user()->id;

        $findUserDoctor = User::where('name',$doctor->doctor_name)->first();



        $del1 = $findDoctor->delete();

        $del2 = $findUserDoctor->delete();

        $referral = Referral::find($doctor->id);

        if($referral){
            $del3 = $refferal->delete();
        }

        if( $del1 && $del2){

            redirect()->route('hospitals.show',['hospital_id' => $hospital->id])
                ->with('success', 'Doctor deleted succesfully');
        }

        return back()->withInput()->with('error', 'Doctor could not be deleted');
        //dd($company);
    }
}
