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
};
