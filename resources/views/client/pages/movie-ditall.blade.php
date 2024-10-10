@extends('client.layouts.index')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $movie->image_path) }}" alt="{{ $movie->title }}" class="img-fluid rounded" />
        </div>
        <div class="col-md-8">
            <h1>{{ $movie->title }}</h1>
            <p><strong>Đạo diễn:</strong> {{ $movie->directors->pluck('name')->implode(', ') }}</p>
            <p><strong>Diễn viên:</strong> {{ $movie->actors->pluck('name')->implode(', ') }}</p>
            <p><strong>Thể loại:</strong> {{ $movie->genres->pluck('name')->implode(', ') }}</p>
            <p><strong>Khởi chiếu:</strong> {{ \Carbon\Carbon::parse($movie->release_date)->format('d/m/Y') }}</p>
            <p><strong>Thời lượng:</strong> {{ $movie->duration }} phút</p>
            <p><strong>Ngôn ngữ:</strong> {{ $movie->language }}</p>
            <p><strong>Rated:</strong> {{ $movie->rated }}</p>
            @include('blocks.booking-modal')

        </div>
    </div>

        <div class="row mt-4">
            <div class="col-12 offset-md-1">
                <h2>Nội dung phim</h2>
                <p>{{ $movie->description }}</p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 offset-md-1">
                <h2>Trailer</h2>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="{{ $movie->trailer_url }}" allowfullscreen></iframe>
                </div>
            </div>
        </div>

    <div class="row mt-4">
        <div class="col-12">
            <h2>Lịch chiếu</h2>
            <!-- Thêm lịch chiếu ở đây nếu có -->
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Thêm jQuery và Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
