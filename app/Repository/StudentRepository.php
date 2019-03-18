<?php

/**
 * Created by PhpStorm.
 * User: Nour
 * Date: 18/03/2019
 * Time: 12:31 م
 */

namespace App\Repository;
use App\infrastructure\BaseRepository;
use App\Model\Student;

class StudentRepository extends BaseRepository
{

    public function model()
    {
      return Student::class;
    }
    public function getAllRoster(){
        return $this->model->Roster;
    }
    public function create(array $fields)
    {
      return  $this->model->create($fields)->Roster()->attach($fields['roster_id']);
    }
    public function getLikeColumn($column,$value){
        return $this->model->where($column,'like',"%{$value}%");
    }
    public function getWhereColumn($column,$value){
        return $this->model->where($column,$value);
    }
    public function sortByColumn($column){
        return $this->model->orderBy($column);
    }


    public function customList(array $input){
       $q=$this->model;
        if(isset($input['gender'])){
           $q=$q->where('gender',$input['gender']);
        }
        if(isset($input['city'])){
            $q=$q->where('city',$input['city']);
        }
        if(isset($input['age'])){
            $q=$q->where('dob',$input['age'])->orderBy('dob');
        }
        if(isset($input['first_name'])){
            $q=$q->where('f_name','like',"%{$input['first_name']}%")->orderBy('f_name');
        }
        if(isset($input['last_name'])){
            $q=$q->where('l_name','like',"%{$input['last_name']}%")->orderBy('l_name');
        }
        return $q->paginate(10);
    }



}