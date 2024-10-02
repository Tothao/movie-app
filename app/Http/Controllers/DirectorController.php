<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director;

class DirectorController extends Controller
{
    public function index()
    {
        $directors = Director::all();
        return view("admin.directors.index", [
            'directors' => $directors
        ]);
    }

    public function create()
    {
        return view('admin.directors.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'age' => 'required|integer|min:1|max:120',
        ]);
    
        $director = Director::create($validatedData);
    
        if ($director) {
            return redirect()->route('admin.director')
                             ->with('success', 'Thêm đạo diễn thành công.');
        } else {
            return redirect()->route('admin.director')
                             ->with('error', 'Thêm đạo diễn thất bại.');
        }
    }
}
