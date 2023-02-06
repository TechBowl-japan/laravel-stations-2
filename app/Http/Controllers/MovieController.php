<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MovieController extends Controller
{
    public function index(Request $request): View
    {
        $keyword = $request->query('keyword');
        $isShowing = $request->query('is_showing', 'all');

        $movies = (new Movie())
            ->when(isset($keyword), function($query) use ($keyword) {
                $query->where(function($q) use($keyword) {
                    $q->where('title', 'LIKE', '%'.$keyword.'%')
                      ->orwhere('description', 'LIKE', '%'.$keyword.'%');
                });
            })
            ->when($isShowing !== 'all', function($query) use ($isShowing) {
                $query->where('is_showing', '=', $isShowing);
            })
            ->paginate(20);

        return view('movies.index')->with(compact('keyword', 'movies', 'isShowing'));
    }

    public function show(int $id): View
    {
        $movie = Movie::findOrFail($id);
        $schedules = Schedule::where('movie_id', $id)->orderBy('start_time', 'asc')->get();

        return view('movies.show')->with(['movie' => $movie, 'schedules' => $schedules]);
    }
}
