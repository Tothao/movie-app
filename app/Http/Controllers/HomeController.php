<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('client.pages.home');
    }
    /**
     * Show the now showing movies.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showing()
    {
        $movies = Movie::where('category_id', 1)->with(['genres'])->get();
        return view('client.pages.now-showing', compact('movies'));
      
    }
    /**
     * Show the upcoming movies.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function upcoming()
    {
        $movies = Movie::where('category_id', 2)->with(['genres'])->get();
        return view('client.pages.upcoming', compact('movies'));
        // TODO: Fetch upcoming movies from the database
        // For now, we'll just return the view
    
    }
}
