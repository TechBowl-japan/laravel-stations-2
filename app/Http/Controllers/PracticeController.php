<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Practice;

class PracticeController extends Controller
{
    //1~3
    public function sample()
    {
        return view('practice');
    }
    public function sample2()
    {
        $test = 'practice2';
        return view('practice2', ['testParam' => $test]);
    }
    public function sample3()
    {
        $test = 'test';
        return view('practice2', ['testParam' => $test]);
    }

    //4~
    public function getPractice()
    {
        $practice = Practice::all();
        return view('getPractice',['practices' => $practice]);
    }

    
}
