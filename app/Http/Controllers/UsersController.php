<?php

namespace App\Http\Controllers;

use App\User;
use App\Doctor;
use App\Hospital;
use App\Department;
use App\Referral;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->where('role_id','!=',3)->get();

        $users_count = DB::table('users')->count();

        $doctors_count = DB::table('doctors')->count();

        $hospitals_count =  DB::table('hospitals')->count();

        $patients_count =  DB::table('patients')->count();

        $referrals_count =  DB::table('referrals')->count();

        return view('admin.index', [
            'users' => $users,
            'users_count' => $users_count,
            'doctors_count' => $doctors_count,
            'hospitals_count' => $hospitals_count,
            'patients_count' => $patients_count,
            'referrals_count' => $referrals_count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user_id = Auth::user()->id;

        return view('users.edit', ['user_id' => $user_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $userUpdate = User::where('id' , $user_id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        if($userUpdate != null){
            return redirect('home')->withInput()->with('success','User Information updated Succesfully');
        }
        else
            return back()->withInput()->with('error', 'User information could not be updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $findUser = User::find($user->id);

        if($findUser->delete()){

            return redirect()->route('home')
            ->with('success', 'User deleted Successfully');
        }

        return back()->withInput()->with('error', 'User could not be deleted');
    }
}
