<?php

/**
 * Created by PhpStorm.
 * User: Nour
 * Date: 18/03/2019
 * Time: 12:31 م
 */

namespace App\Repository;

use App\infrastructure\BaseRepository;
use App\Model\Roster;


class RosterRepository extends BaseRepository
{


    public function model()
    {
      return Roster::class;
    }

    public function getAllStudent(){
        $this->model->Student;
    }
}