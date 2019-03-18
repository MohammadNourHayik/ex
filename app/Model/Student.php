<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{


//$table->String('f_name');
//$table->String('l_name');
//$table->date('dob');
//$table->String('email')->unique();
//$table->String("phone", 20)->unique();
//$table->string('gender');
//$table->string('city');
//$table->timestamps();


    protected $fillable=[
        'f_name',
        'l_name',
        'dob',
        'email',
        'phone',
        'gender',
        'city',
    ];

    public function Roster(){
        return $this->belongsToMany('App\Model\Roster','student_rosters');
    }

    public static $rule=[
        'f_name'=>'required|max:191',
        'l_name'=>'required|max:191',
        'dob'=>'required|date',
        'email'=>'required|email|unique:students',
        'phone'=>'required|numeric|unique:students',
        'gender'=>'required',
        'city'=>'required|max:191'
        ];

}
