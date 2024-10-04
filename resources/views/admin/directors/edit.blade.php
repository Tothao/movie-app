@extends('admin.layouts.index')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Sửa thông tin đạo diễn</h1> 
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Director Information</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.director.update', $director->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $director->name) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $director->age) }}" required min="1" max="120">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
