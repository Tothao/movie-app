<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Director;
use App\Models\Actor;
use App\Models\Genre;
class MoviesController extends Controller
{
    
    public function index()
    {

        $movies = Movie::all();
        $categories = Genre::all();  
        return view('admin.movies.index', compact('movies','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $directors = Director::all();
        $categories = Genre::all();
        $actors = Actor::all();
        return view('admin.movies.create', compact('directors', 'categories', 'actors'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $movie = new Movie();
        // $movie->title = $request->title;
        // $movie->description = $request->description;
        // $movie->release_year = $request->release_year;
        // $movie->director = $request->director;
        // $movie->genre = $request->genre;
        // $movie->save();
        $movie->fill($request->all());
        $movie->save();
        if ($request->has('directorIds')) {
            $movie->directors()->attach($request->input('directorIds')); // Gán quan hệ nhiều-nhiều
        }
        if ($request->has('genreIds')) {
            $movie->genres()->attach($request->input('genreIds'));
        }
        if ($request->has('actorIds')) {
            $movie->actors()->attach($request->input('actorIds'));
        }
     
        
        return redirect()->route('admin.movies.index')->with('success', 'Phim đã được thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::find($id);
        $movie->load('directors');
        $movie->load('category');
        $movie->load('actors');
        return view('admin.movies.edit', compact('movie', 'directors','actors','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = Movie::find($id);
        $directors = Director::all();
        $actors = Actor::all();
        $categories = Genre::all();
        return view('admin.movies.edit', compact('movie', 'directors', 'actors','categories'));
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
        // $movie->director = $request->director;
        // $movie->genre = $request->genre;
        $movie->fill($request->all());
        $movie->save();
       
        if ($request->has('directorIds')) {
            $movie->directors()->sync($request->input('directorIds')); // Gán quan hệ nhiều-nhiều
        }
        if ($request->has('actorIds')) {
            $movie->actors()->sync($request->input('actorIds')); // Gán quan hệ nhiều-nhiều
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
