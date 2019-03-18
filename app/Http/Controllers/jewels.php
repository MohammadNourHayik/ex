<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class jewels extends Controller
{
    public function howMany($j,$s){
        $count=0;
        for ($i=0;$i<strlen($j);$i++) {
            $count=$count+substr_count($s,$j[$i]);
        }
        dd($count);
    }



}
