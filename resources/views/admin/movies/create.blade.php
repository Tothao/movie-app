@extends('admin.layouts.index')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm phim mới</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Tiêu đề</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="release_date">Năm phát hành</label>
                        <input type="date" class="form-control" id="release_date" name="release_date" required>
                    </div>
                    <div class="form-group">
                        <label for="genreIds">Thể loại</label>
                        <select class="form-control" id="genreIds" name="genreIds[]" multiple required>
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="directorIds">Đạo diễn</label>
                        <select class="form-control" id="directorIds" name="directorIds[]" multiple required>
                            @foreach($directors as $director)
                                <option value="{{ $director->id }}">{{ $director->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="actorIds">Diễn viên</label>
                        <select class="form-control" id="actorIds" name="actorIds[]" multiple required>
                            @foreach($actors as $actor)
                                <option value="{{ $actor->id }}">{{ $actor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="poster">Poster phim</label>
                        <input type="file" class="form-control-file" id="image_path" name="image_path" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-3">Thêm phim</button>
            <a href="{{ route('admin.movies.index') }}" class="btn btn-secondary mt-3">Hủy</a>
        </form>
    </div>
</div>
@endsection
