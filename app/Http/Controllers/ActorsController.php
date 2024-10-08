<?php

namespace App\Http\Controllers;
use App\Models\Actor;
use Illuminate\Http\Request;

class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actors = Actor::all();
        return view('admin.actors.index', compact('actors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.actors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $actor = Actor::create($request->all());
        return redirect()->route('admin.actors.index')->with('success', 'Thêm diễn viên thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $actor = Actor::find($id);
        return view('admin.actors.show', compact('actor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $actor = Actor::find($id);
        return view('admin.actors.edit', compact('actor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $actor = Actor::find($id);
        $actor->update($request->all());
        return redirect()->route('admin.actors.index')->with('success', 'Cập nhật diễn viên thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $actor = Actor::find($id);
        $actor->delete();
        return redirect()->route('admin.actors.index')->with('success', 'Xóa diễn viên thành công');
    }
}
