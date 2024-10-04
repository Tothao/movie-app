@extends('admin.layouts.index')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Add New Director</h1> 
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Director Information</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.director.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" id="age" name="age" required min="1" max="120">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
