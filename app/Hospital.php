<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
   protected $fillable = [
        'hospital_name',
        'location',
        'grade',
        'user_id',
        'grade_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function doctors(){
        return $this->hasMany('App\Doctor');
    }

    public function referrals(){
        return $this->hasMany('App\Referral');
    }

     public function patients(){
        return $this->hasMany('App\Patient');
    }

     public function departments(){
        return $this->hasMany('App\Department');
    }

    public function comments(){
        return $this->morphMany('App\Comment','commentable');
    }

    public function grade(){
        return $this->belongsTo('App\Grade');
    }


}
