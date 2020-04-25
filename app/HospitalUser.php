<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalUser extends Model
{	

	protected $table = "hospital_user";

    protected $fillable = [
    	'hospital_id',
    	'user_id',
    ];
}
