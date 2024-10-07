@extends('admin.layouts.index')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sửa thông tin phim</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.movies.update', $movie->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Tiêu đề</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $movie->title) }}" required>
            </div>
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $movie->description) }}</textarea>
            </div>
            <div class="form-group">
                <label for="release_year">Năm phát hành</label>
                <input type="number" class="form-control" id="release_year" name="release_year" value="{{ old('release_year', $movie->release_year) }}" required>
            </div>
            <div class="form-group">
                <label for="director">Đạo diễn</label>
                <select name="directorIds[]" multiple class="form-control select2" data-placeholder="Chọn đạo diễn">
                    @foreach($directors as $director)
                        <option value="{{ $director->id }}" {{ $movie->directors->contains($director->id) ? 'selected' : '' }}>
                            {{ $director->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
            <a href="{{ route('admin.movies.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>
@endsection
