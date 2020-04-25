<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'patient_name',
        'contact',
        'email',
        'age',
        'date_of_birth',
        'residence',
        'hospital_id',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function hospital(){
        return $this->belongsTo('App\Hospital');
    }

    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }

    public function referrals(){
        return $this->belongsToMany('App\Referral');
    }

    public function comments(){
        return $this->morphMany('App\Comment','commentable');
    }
}
