@extends('client.layouts.index')

@section('content')
    <div>
        <div class="container mt-4">
            <h2 class="mb-4">Phim Sắp Chiếu</h2>
            <div class="row">
                @foreach ($movies->where('category_id', 2) as $movie)
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $movie->image_path) }}" class="card-img-top" alt="{{ $movie->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $movie->title }}</h5>
                                <p class="card-text">Thể loại: {{ $movie->genres->pluck('name')->implode(', ') }}</p>
                                <p class="card-text">Ngày khởi chiếu: {{ \Carbon\Carbon::parse($movie->release_date)->format('d/m/Y') }}</p>
                                <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-secondary">Thông tin chi tiết</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
