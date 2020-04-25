<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
    	'doctor_name',
        'department_id',
    	'user_id',
        'contact',
        'email',
    	'hospital_id',
    	'working_hours',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function hospital(){
        return $this->belongsTo('App\Hospital');
    }

    public function referrals(){
        return $this->hasMany('App\Referral');
    }

     public function patients(){
        return $this->belongsToMany('App\Patient');
    }

    public function comments(){
    	return $this->morphMany('App\Comment','commentable');
    }

   
}
