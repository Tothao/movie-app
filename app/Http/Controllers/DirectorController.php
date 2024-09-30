<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function index()
    {
        $directors = Director::all();
        return view('admin.directors.index', ['directors' => $directors]);
    }

    public function create()
    {
        return view('admin.directors.create');
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'gender' => $request->input('gender')
        ];

        try {
            Director::create($data);
            return redirect()->route('admin.director')
                ->with('success','Luu thanh cong!');
        } catch (\Exception $exception) {
            return redirect()->route('admin.director')
                ->with('fail','Luu that bai!');
        }
    }

    public function destroy(string $id)
    {
        $model = Director::find($id);

        if ($model) {

            Director::destroy($id);

            return redirect()->route('admin.director')->with('success','Xoa thanh cong');
        }

        return redirect()->route('admin.director')->with('warning','dien vien muon xoa khong ton tai');

    }
}
