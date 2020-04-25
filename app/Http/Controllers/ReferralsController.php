<?php

namespace App\Http\Controllers;

use App\Referral;
use App\Doctor;
use App\Hospital;
use App\Patient;
use App\Role;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferralsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            if(Auth::user()->role_id == 2){

                $referrals = DB::table('referrals')
                ->leftJoin('hospitals', 'hospital_id', '=', 'hospitals.id')
                ->leftJoin('patients', 'patient_id', '=', 'patients.id')

                ->leftJoin('doctors', 'doctor_id', '=', 'doctors.id')

                ->select('referrals.*', 'doctors.doctor_name' , 'patients.patient_name','hospitals.hospital_name')
                ->where('referrals.user_id', Auth::user()->id)
                ->get();

                $i = 0;

                return view('referrals.index',['referrals' => $referrals, 'i' => $i]);
            }
            else{
                $referrals = self::recieved_admin();

                $i = 0;

                return view('referrals.all_refferals',['referrals' => $referrals, 'i' => $i]);
            }

        }

        return view('auth.login');
    }

    public function recieved(){

        $doctor = Doctor::where('email', Auth::user()->email)->first();

        $doctor_id = $doctor->id;

        $referrals = DB::table('referrals')
            ->leftJoin('hospitals', 'hospital_id', '=', 'hospitals.id')
            ->leftJoin('patients', 'patient_id', '=', 'patients.id')

            ->leftJoin('doctors', 'doctor_id', '=', 'doctors.id')

            ->select('referrals.*', 'doctors.doctor_name' , 'patients.patient_name','hospitals.hospital_name')
            ->where('doctor_id', $doctor_id)
            ->get();

        $i = 0;

        $status = DB::table('status')->get();

        return view('referrals.index2',['referrals' => $referrals,'status' => $status, 'i' => $i]);

    }

    public function recieved_admin(){

        $user_id = Auth::user()->id;

        $referrals = DB::table('referrals')
            ->leftJoin('hospitals', 'hospital_id', '=', 'hospitals.id')
            ->leftJoin('patients', 'patient_id', '=', 'patients.id')

            ->leftJoin('doctors', 'doctor_id', '=', 'doctors.id')

            ->select('referrals.*', 'doctors.doctor_name' , 'patients.patient_name','hospitals.hospital_name')
            ->where('hospitals.user_id', $user_id)
            ->get();

        return $referrals;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( )
    {
        $doctor = Doctor::where('email', Auth::user()->email)->first();

        $doctors = DB::table('doctors')->get();

        $hospital_id = $doctor->hospital_id;

        $user_id = $doctor->user_id;

        $hospital = Hospital::where('id', $hospital_id)->first();

        $hospitals = DB::table('hospitals')->get();

        $patients = Patient::where('hospital_id', $hospital->id)->get();

        $user_id = Auth::user()->id;

        return view('referrals.create', ['user_id' => $user_id, 'doctor' => $doctor, 'hospital' => $hospital, 'patients' => $patients, 'hospitals' => $hospitals, 'doctors' => $doctors]);
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



            $referrals = Referral::create([
                'patient_id' => $request->input('patient_id'),
                'title' => $request->input('title'),
                'procedure' => $request->input('procedure'),
                'diagnosis' => $request->input('diagnosis'),
                'lab_report' => $request->input('lab_report'),
                'drug_allergies' => $request->input('drug_allergies'),
                'drugs_offered' => $request->input('drugs_offered'),
                'recommendations' => $request->input('recommendations'),
                'next_of_kin' => $request->input('next_of_kin'),
                'status' => $request->input('status'),
                'sending_hospital' => $request->input('hospital'),
                'sending_doctor' => $request->input('doctor'),
                'hospital_id' => $request->input('hos_id'),
                'doctor_id' => $request->input('doc_id'),
                'user_id' => $request->input('user_id')
                //'user_id' => Auth::user()->id
            ]);


            if($referrals){

                $hospital_id = $request->input('hospital_id');


                return redirect()->route('referrals.index')
                ->with('success', 'Refferal created succesfully');
            }

            return back()->withInput()->with('errors', 'Sorry, referral could not be created');
        }

        return back()->withInput()->with('errors', 'Sorry, the user is not logged in');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Referral $referral)
    {
        $set_date = $request->input('set_date');

        if($set_date != null){

            $referralUpdate = Referral::where('id' , $referral->id)->update([
                'status' => $request->input('stat'),
                'status' => $request->input('set_date')
            ]);
        }else{

            $referralUpdate = Referral::where('id' , $referral->id)->update([
                'set_date' => $request->input('set_date')
            ]);
        }


        return redirect()->back()->withInput()->with('success', 'Referral status updated succesfully');
    }

    public function show_all_referrals(){

        $referrals = DB::table('referrals')->get();

        return view('referrals.show_all',['referrals' => $referrals]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
