<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/cgvlogo.png') }}" alt="CGV Logo" height="30">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            PHIM
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('movies.showing') }}">PHIM ĐANG CHIẾU</a>
                            <a class="dropdown-item" href="{{ route('movies.upcoming') }}">PHIM SẮP CHIẾU</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">RẠP CGV</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">THÀNH VIÊN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CULTUREPLEX</a>
                    </li>
                </ul>
                
            </div>

            <div class="ml-3">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-white">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-white mr-2">Đăng nhập</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-white">Đăng ký</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>
</header>
