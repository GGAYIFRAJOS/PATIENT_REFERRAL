<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Hospital;
use App\Doctor;
use App\Department;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check()){
            $hospital = Hospital::where('user_id', Auth::user()->id)->first();

            $grades = DB::table('grades')->get();

            $user_id = Auth::user()->id;

            if(Auth::user()->role_id == 3){
                return redirect()->route('users.index');
            }

            if($hospital == null){

                $doctor = Doctor::where('email', Auth::user()->email)->first();

                if($doctor != null){

                    $hospital_id = $doctor->hospital_id;

                    $department_id = $doctor->department_id;

                    $department = Department::find($department_id);

                    $user_id = $doctor->user_id;

                    $hospital = Hospital::where('id', $hospital_id)->first();

                    $referrals = DB::table('referrals')
                    ->leftJoin('hospitals', 'hospital_id', '=', 'hospitals.id')
                    ->leftJoin('patients', 'patient_id', '=', 'patients.id')

                    ->leftJoin('doctors', 'doctor_id', '=', 'doctors.id')

                    ->select('referrals.*', 'doctors.doctor_name' , 'patients.patient_name','hospitals.hospital_name')
                    ->where('doctor_id', $doctor->id)
                    ->where('status', 'SENT')
                    ->get();

                    $i = 0;

                    return view('doctors.show', ['hospital' => $hospital,'user_id' => $user_id, 'doctor' => $doctor, 'department' => $department, 'referrals' => $referrals,'i' => $i]);

                }
                return view('hospitals.create', ['user_id' => $user_id, 'grades' => $grades]);
            }

            $doctors = Doctor::where('user_id', $user_id)->get();

            return view('hospitals.show', ['hospital' => $hospital, 'doctors' => $doctors]);
        }

        else
            return view('login');

    }
}
