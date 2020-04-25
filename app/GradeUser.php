<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradeUser extends Model
{
    protected $table = "grade_user";

    protected $fillable = [
    	'grade_id',
    	'user_id',
    ];
}
