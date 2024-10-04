@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Danh sách phim</h1>
        <a href="{{ route('admin.movie.create') }}" class="btn btn-primary mb-3">Thêm phim mới</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Thời lượng</th>
                    <th>Ngày phát hành</th>
                    <th>Ngôn ngữ</th>
                    <th>Xếp hạng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($movies as $movie)
                    <tr>
                        <td>{{ $movie->id }}</td>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->duration }} phút</td>
                        <td>{{ $movie->release_date }}</td>
                        <td>{{ $movie->language }}</td>
                        <td>{{ $movie->rated }}</td>
                        <td>
                            <a href="{{ route('admin.movie.edit', $movie->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                            <form action="{{ route('admin.movie.destroy', $movie->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa phim này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


