<?php

namespace App\Http\Controllers;

use App\Hospital;
use App\Company;
use App\Doctor;
use App\User;
use App\HospitalUser;
use App\Department;
use App\Patient;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HospitalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


            //dump(Auth::user()->id);

            $doctor = Doctor::where('email', Auth::user()->email)->first();

            if($doctor){
                $hospital_id = $doctor->hospital_id;

                $user_id = $doctor->user_id;

                $hospital = Hospital::where('id', $hospital_id)->first();

                $other_hospitals = DB::select(DB::raw("SELECT * FROM hospitals WHERE hospital_name != :somevariable"),array(
                    'somevariable' => $hospital->hospital_name,
                ));

                $i = 0;

                return view('hospitals.index',['hospitals' => $other_hospitals, 'i' => $i]);
            }
            else{

                $user_id = Auth::user()->id;

                $hospital = Hospital::where('user_id', $user_id)->first();

                $user_id =  Auth::user()->id;

                $other_hospitals = DB::select(DB::raw("SELECT * FROM hospitals WHERE user_id != :somevariable"),array(
                    'somevariable' => $user_id,
                ));

                $i = 0;

                if($hospital != null){
                    $hospt_id = $hospital->id;

                    return view('hospitals.other',['hospitals' => $other_hospitals,'hospt_id' => $hospt_id, 'i' => $i])->with('success','Hospital registered succesfully!');
                }

                return view('hospitals.other',['hospitals' => $other_hospitals, 'i' => $i])->with('success','Hospital registered succesfully!');
            }

    }

    public function show_doctors($hospital_id)
    {

        $doctors = DB::table('doctors')
            ->leftJoin('departments', 'doctors.department_id', '=', 'departments.id')
            ->select('doctors.*', 'departments.name as department')
            ->where('hospital_id', $hospital_id)
            ->get();

        return view('hospitals.index2',['doctors' => $doctors, 'hospital_id' => $hospital_id]);
    }

    public function hospital_patients($hospital_id)
    {


        //$doctors = Doctor::where('hospital_id', $hospital_id)->get();
        $patients = Patient::where('hospital_id',$hospital_id)->get();



        return view('patients.index2',['patients' => $patients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $company_id = null )
    {
        $companies = null;

        if(!$company_id){

            $companies = Company::where('user_id', Auth::user()->id)->get();
        }

        return view('hospitals.create', ['company_id' => $company_id, 'companies' => $companies]);
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

            $hospital = Hospital::create([
                'hospital_name' => $request->input('hospital_name'),
                'location' => $request->input('location'),
                'grade_id' =>  $request->input('grade_id'),
                'user_id' => Auth::user()->id
                //'user_id' => Auth::user()->id
            ]);


            if($hospital){

                return redirect()->route('hospitals.index')
                ->with('success', 'Hospital added succesfully');
            }
        }

        return back()->withInput()->with('errors', 'Sorry!, the user is not logged in');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital)
    {
        //$hospital = hospital::where('id', $hospital->id)->first();

        $hospital = Hospital::where('id', $hospital->id)->first();

        $hospital_id = $hospital->id;

        $doctors = DB::table('doctors')
        ->leftJoin('departments', 'doctors.department_id', '=', 'departments.id')
        ->select('doctors.*', 'departments.name as department')
        ->where('hospital_id', $hospital_id)
        ->get();

        return view('hospitals.show', ['hospital' => $hospital,'doctors' => $doctors]);
    }


    public function show_hospital_doctors( $hospital_id )
    {

        $doctors = Doctor::where('hospital_id', $hospital_id)->get();

        return view('doctors.index', [ 'doctors' => $doctors ]);

    }

    public function show_all_hospitals(){

        $hospitals = DB::table('hospitals')->get();

        return view('hospitals.show_all',['hospitals' => $hospitals]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital)
    {
        $hospital = Hospital::find($hospital->id);

        return view('hospitals.edit', ['hospital' => $hospital]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hospital $hospital)
    {
        $hospitalUpdate = Hospital::where('id' , $hospital->id)->update([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        if($hospitalUpdate){
            return redirect()->route('hospitals.show',['hospital' => $hospital->id])
            ->with('success' , 'hospital information updated succesfully');
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy(hospital $hospital)
    {
        $findhospital = Hospital::find($hospital->id);

        if($findhospital->delete()){

            return redirect()->route('hospitals.index')
            ->with('success', 'hospital deleted Successfully');
        }

        return back()->withInput()->with('error', 'hospital could not be deleted');
        //dd($company);
    }
}
