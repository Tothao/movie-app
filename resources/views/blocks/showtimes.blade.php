@if($cinemas->isNotEmpty())
    @foreach($cinemas as $cinema)
        <div class="cinema">
            <h3>{{ $cinema->name }}</h3>
            <div class="cinema_rooms">
                @foreach($cinema->rooms as $cinema_room)
                    <div class="cinema_room mb-3">
                        <p>{{ $cinema_room->name }}</p>
                        <div class="showtimes btn-group flex-wrap">
                            @foreach($cinema_room->showtimes as $showtime)
                            <a href="#" class="btn btn-outline-primary select-showtime">
                                {{-- <a href="{{ route('showtime.seatSelection', ['showtime_id' => $showtime->id]) }}" class="btn btn-outline-primary select-showtime"> --}}
                                    {{ $showtime->show_time }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
@else
    <p>Không có suất chiếu nào cho phim này vào ngày đã chọn tại thành phố này.</p>
@endif

<style>
    .cinema {
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 20px;
        background-color: #f9f9f9;
    }
    .cinema h3 {
        font-size: 1.2rem;
        color: #333;
        margin-bottom: 10px;
    }
    .cinema_room {
        background-color: #ffffff;
        border-radius: 5px;
        padding: 10px;
    }
    .cinema_room p {
        font-size: 1rem;
        color: #555;
        margin-bottom: 5px;
    }
    .showtimes {
        display: flex;
        flex-wrap: wrap;
    }
    .select-showtime {
        font-size: 0.9rem;
        margin: 2px;
    }
    .select-showtime:hover {
        background-color: #007bff;
        color: white;
    }
</style>
