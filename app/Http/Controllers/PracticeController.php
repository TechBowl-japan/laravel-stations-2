<?php
namespace App\Http\Controllers;


use App\Practice;
use Illuminate\Database\Seeder;
class PracticeController extends Controller{
  public function sample(){
    return view("practice");
  }

  public function sample2(){
    $test = "practice2";
    return view("practice2", ["testParam" => $test]);}
  public function sample3(){
    $test3 = "test";
    return view("practice3", ["testParam" => $test3]);
  }
  public function getPractice(){
    $practices = Practice::all();
    return view('getPractice', ['practices' => $practices]);
  }

}