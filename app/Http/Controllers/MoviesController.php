<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;
use App\Models\Movie;
class MoviesController extends Controller
{

    public function index()
    {
        $movies = Movie::all();
        return view('admin.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $directors = Director::all();
        return view('admin.movies.create', compact('directors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $movie = new Movie();
//        $movie->title = $request->title;
//        $movie->description = $request->description;
//        $movie->release_year = $request->release_year;
//        $movie->director = $request->director;
//        $movie->genre = $request->genre;

        $movie->fill($request->all());
        $movie->save();

        if ($request->has('directorIds')) {
            $movie->directors()->attach($request->input('directorIds')); // Gán quan hệ nhiều-nhiều
        }
        return redirect()->route('admin.movies.index')->with('success', 'Phim đã được thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::find($id);
        return view('admin.movies.edit', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = Movie::find($id);
        $directos = Director::all();

        return view('admin.movies.edit', ['movie' => $movie, 'directors' => $directos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $movie = Movie::find($id);
        // $movie->title = $request->title;
        // $movie->description = $request->description;
        // $movie->release_year = $request->release_year;
        $movie->fill($request->all());

        $movie->save();
        // Xóa tất cả các quan hệ đạo diễn hiện tại
        $movie->directors()->detach();

        // Thêm các quan hệ đạo diễn mới
        if ($request->has('directorIds')) {
            $movie->directors()->attach($request->input('directorIds'));
        }
        return redirect()->route('admin.movies.index')->with('success', 'Phim đã được cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect()->route('admin.movies.index')->with('success', 'Phim đã được xóa thành công');
    }
}
