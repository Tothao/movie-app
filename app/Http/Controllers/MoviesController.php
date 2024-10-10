<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Director;
use App\Models\Actor;
use App\Models\Genre;
use App\Models\Category;
class MoviesController extends Controller
{
    
    public function index()
    {

        $movies = Movie::all();
        $genres = Genre::all();  
        $categories = Category::all();  
        return view('admin.movies.index', compact('movies','genres','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $directors = Director::all();
        $genres = Genre::all();
        $actors = Actor::all();
        $categories = Category::all();
        return view('admin.movies.create', compact('directors', 'genres', 'actors','categories' ));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $movie = new Movie();
         $imagePath = $request->file('image_path')->store('images', 'public');
         $movie->image_path = $imagePath;
     
         // Điền các trường còn lại từ request
         $movie->fill($request->except('image_path')); // Để bỏ qua trường 'image_path'
         $movie->save();
         $movie->category_id = $request->category_id;
         $movie->save();
         if ($request->has('directorIds')) {
            $movie->directors()->attach($request->input('directorIds')); // Gán quan hệ nhiều-nhiều
        }
        if ($request->has('category_ids')) {
            $movie->categories()->attach($request->input('category_ids'));
        }
        if ($request->has('genreIds')) {
            $movie->genres()->attach($request->input('genreIds'));
        }
        if ($request->has('actorIds')) {
            $movie->actors()->attach($request->input('actorIds'));
        }
        // $movie->title = $request->title; 
        // $movie->description = $request->description;
        // $movie->release_year = $request->release_year;
        // $movie->director = $request->director;
        // $movie->genre = $request->genre;
        // $movie->save();
      
       
        
        return redirect()->route('admin.movies.index')->with('success', 'Phim đã được thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::find($id);
        $directors = $movie->directors;
        $genres = $movie->genres;
        $actors = $movie->actors;
        $categories = $movie->category;
        return view('client.pages.movie-ditall', compact('movie', 'directors','actors','genres','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = Movie::find($id);
        $directors = Director::all();
        $actors = Actor::all();
        $genres = Genre::all();
        $categories = Category::all();
        return view('admin.movies.edit', compact('movie', 'directors', 'actors','genres','categories'));
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
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('images', 'public');
            $movie->image_path = $imagePath; // Cập nhật đường dẫn ảnh
        }
    
        // Cập nhật thông tin phim từ request
        $movie->fill($request->except(['directorIds', 'actorIds', 'image_path', 'category_id','genres'])); // Không cập nhật các trường liên quan đến mối quan hệ
        $movie->save(); // Lưu thông tin phim;
        $movie->category_id = $request->category_id;
        $movie->save();
        
        if ($request->has('directorIds')) {
            $movie->directors()->sync($request->input('directorIds')); // Gán quan hệ nhiều-nhiều
        }
        if ($request->has('actorIds')) {
            $movie->actors()->sync($request->input('actorIds')); // Gán quan hệ nhiều-nhiều
        }
        if ($request->has('genreIds')) {
            $movie->genres()->sync($request->input('genreIds'));
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
