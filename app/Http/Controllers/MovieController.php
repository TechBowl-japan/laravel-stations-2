<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function movies()
    {
        $movie = Movie::all();
        return view('movies',['movies' => $movie]);
    }
}
