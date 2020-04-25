<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
    	'user_id',
        'grade_id',
    ];

    public function hospital(){
        return $this->hasMany('App\Hospital');
    }
}
