<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
//$table->string('name');
//$table->string('Description')->nullable();
    protected $fillable=[
        'name',
        'description',
    ];

    public function Students(){
        return $this->belongsToMany('App\Model\Student','student_rosters');
    }

    public static $rule=[
        'name'=>'required|max:191',
        'description'=>'required|max:191'
    ];

}
