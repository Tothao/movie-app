@extends('admin.layouts.index')

@section('content')


    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Them moi dao dien</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST" action="{{route('admin.director.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Ten dao dien</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="nhap ten dao dien">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                            <label class="form-check-label" for="male">
                                Nam
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                            <label class="form-check-label" for="female">
                                Nu
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success mt-4">
                            Lưu
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
