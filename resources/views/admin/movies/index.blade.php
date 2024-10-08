@extends('admin.layouts.index')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách phim</h6>
        <a href="{{ route('admin.movies.create') }}"  class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Thêm phim mới</span>
        </a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Năm phát hành</th>
                        <th>Hình ảnh</th>
                        <th>Đạo diễn</th>
                        <th>Diễn viên</th>
                        <th>Thể loại</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($movies as $movie)
                    <tr>
                        <td>{{ $movie->id }}</td>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->release_date }}</td>
                        <td><img src="{{ asset('storage/' . $movie->image_path) }}" alt="{{ $movie->title }}" style="width: 100px; height: auto;"></td>
                        <td>{{ $movie->directors->pluck('name')->implode(', ') }}</td>
                        <td>{{ $movie->actors->pluck('name')->implode(', ') }}</td>
                        <td>{{ $movie->genres->pluck('name')->implode(', ') }}</td>
                        <td>
                            <a href="{{ route('admin.movies.edit', $movie->id) }}" class="btn btn-info btn-circle btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.movies.destroy', $movie->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa phim này?');">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
