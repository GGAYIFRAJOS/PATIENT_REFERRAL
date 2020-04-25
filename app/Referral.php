<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $fillable = [
    	'patient_id',
        'title',
        'procedure',
        'diagnosis',
        'lab_report',
        'drug_allergies',
        'drugs_offered',
        'recommendations',
        'next_of_kin',
        'hospital_id',
        'doctor_id',
        'user_id',
    ];


    public function hospital(){
        return $this->belongsTo('App\Hospital');
    }

    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }

    public function patient(){
        return $this->belongsTo('App\Patient');
    }

    public function comments(){
        return $this->morphMany('App\Comment','commentable');
    }

    public function users(){
        return $this->hasMany('App\User');
    }
}
