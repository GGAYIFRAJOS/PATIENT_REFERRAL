<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Hospital;
use App\Doctor;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientsController extends Controller
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

                $hospital = Hospital::where('id', $hospital_id)->first();

                $patients = Patient::where('hospital_id', $hospital_id)->get();

                return view('patients.index',['patients' => $patients, 'hospital' => $hospital]);
            }
            else{

                $user_id = Auth::user()->id;

                $hospital = Hospital::where('user_id', Auth::user()->id)->first();

                $patients = Patient::where('user_id', $user_id);

                return view('patients.index',['patients' => $patients, 'hospital' => $hospital]);
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
        $doctor = Doctor::where('email', Auth::user()->email)->first();

        $hospital_id = $doctor->hospital_id;

        $user_id = $doctor->user_id;

        $hospital = Hospital::where('id', $hospital_id)->first();

        $user_id = Auth::user()->id;

        return view('patients.create', ['hospital' => $hospital, 'user_id' => $user_id]);
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

            $date = $request->input('date_of_birth');

            $date_new = date("Y-m-d", strtotime($date));

            $patient = Patient::create([
                'patient_name' => $request->input('patient_name'),
                'contact' => $request->input('contact'),
                'email' => $request->input('email'),
                'age' => $request->input('age'),
                'residence' => $request->input('residence'),
                'user_id' => $request->input('user_id'),
                'hospital_id' =>  $request->input('hospital_id')
                //'user_id' => Auth::user()->id
            ]);


            if($patient){

                return redirect()->route('patients.index')
                ->with('success', 'Patient created succesfully');
            }
        }

        return back()->withInput()->with('errors', 'Sorry!, the user is not logged in');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show(patient $patient)
    {
        //$hospital = hospital::where('id', $hospital->id)->first();

        $patient = Patient::find($patient->id);



        return view('patients.show',['patient' => $patient]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit(patient $patient)
    {
        $hospital = hospital::find($hospital->id);

        return view('hospitals.edit', ['hospital' => $hospital]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, patient $patient)
    {
        $hospitalUpdate = hospital::where('id' , $hospital->id)->update([
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
    public function destroy(patient $patient)
    {
        $findhospital = hospital::find($hospital->id);

        if($findhospital->delete()){

            return redirect()->route('hospitals.index')
            ->with('success', 'hospital deleted Successfully');
        }

        return back()->withInput()->with('error', 'hospital could not be deleted');
        //dd($hospital);
    }


    public function show_all_patients(){

        $patients = DB::table('patients')->get();

        return view('patients.show_all',['patients' => $patients]);
    }
}
