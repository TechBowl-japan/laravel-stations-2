<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Genre;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MovieController extends Controller
{
    public function index(): View
    {
        $movies = Movie::all();
        return view('admin.movies.index')->with('movies', $movies);
    }

    public function show(int $id): View
    {
        $movie = Movie::findOrFail($id);
        return view('admin.movies.show')->with('movie', $movie);
    }

    public function create(): View
    {
        return view('admin.movies.create');
    }

    public function store(CreateMovieRequest $request): RedirectResponse
    {
        $input = $request->validated();
        $genre = Genre::whereName($input['genre'])->first();

        DB::transaction(function () use ($input, $genre) {
            if (empty($genre)) {
                $genre = Genre::create(['name' => $input['genre']]);
            }
            Movie::create(array_merge($input, ['genre_id' => $genre->id]));
        });

        $request->session()->flash('success', '映画を保存しました');
        return redirect(route('admin.movies.index'));
    }

    public function edit(int $id): View
    {
        $movie = Movie::findOrFail($id);
        return view('admin.movies.edit')->with('movie', $movie);
    }

    public function update(int $id, UpdateMovieRequest $request): RedirectResponse
    {
        $input = $request->validated();
        $genre = Genre::whereName($input['genre'])->first();

        $movie = Movie::findOrFail($id);

        DB::transaction(function () use ($input, $genre, $movie) {
            if (empty($genre)) {
                $genre = Genre::create(['name' => $input['genre']]);
            }
            $movie->update(array_merge($input, ['genre_id' => $genre->id]));
        });

        $request->session()->flash('success', '映画を更新しました');
        return redirect(route('admin.movies.index'));
    }

    public function destroy(int $id, Request $request): RedirectResponse
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        $request->session()->flash('success', '映画を削除しました');
        return redirect(route('admin.movies.index'));
    }
}
