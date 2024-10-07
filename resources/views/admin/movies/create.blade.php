@extends('admin.layouts.index')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm phim mới</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.movies.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Tiêu đề</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="release_year">Năm phát hành</label>
                <input type="number" class="form-control" id="release_year" name="release_year" required>
            </div>
            <div class="form-group">
                <label for="director">Đạo diễn</label>
                <select name="directorIds[]" multiple class="form-control select2" data-placeholder="Chọn đạo diễn">
                    @foreach($directors as $director)
                        <option value="{{ $director->id }}">{{ $director->name }}</option>
                    @endforeach
                </select>
            </div>
{{--            <div class="form-group">--}}
{{--                <label for="genre">Thể loại</label>--}}
{{--                <input type="text" class="form-control" id="genre" name="genre" required>--}}
{{--            </div>--}}
            <button type="submit" class="btn btn-success">Thêm phim</button>
        </form>
    </div>
</div>
@endsection
