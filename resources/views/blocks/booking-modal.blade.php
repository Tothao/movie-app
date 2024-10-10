<!-- Nút Mua Vé -->
<button type="button" class="btn btn-primary btn-booking" data-movie-id="{{ $movie->id }}" data-toggle="modal" data-target="#showtimeModal">
    Mua vé
</button>

<!-- Modal -->
<div class="modal fade" id="showtimeModal" tabindex="-1" aria-labelledby="showtimeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showtimeModalLabel">Chọn ngày xem phim</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="date-buttons">
                    @php
                        $today = \Carbon\Carbon::today();
                    @endphp
                    @for ($i = 0; $i < 30; $i++)
                        @php
                            $date = $today->copy()->addDays($i);
                        @endphp
                        <button class="btn btn-outline-primary date-button select-date" data-date="{{ $date->format('Y-m-d') }}">
                            {{ $date->format('d/m') }}
                            <small class="d-block">{{ $date->format('D') }}</small>
                        </button>
                    @endfor
                </div>
                <div class="city-buttons mt-3">
                    <button class="btn btn-sm btn-outline-secondary city-button select-city" data-city="Hà Nội">Hà Nội</button>
                    <button class="btn btn-sm btn-outline-secondary city-button select-city" data-city="Đà Nẵng">Đà Nẵng</button>
                    <button class="btn btn-sm btn-outline-secondary city-button select-city" data-city="Hồ Chí Minh">Hồ Chí Minh</button>
                </div>

                <div id="theater-schedule" class="mt-3">
                    <!-- Lịch chiếu sẽ được cập nhật ở đây -->
                </div>

                <style>
                    .modal-dialog {
                        max-width: 50.33%;
                        width: 50.33%;
                    }
                    .date-buttons {
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: flex-start;
                        max-height: 300px;
                        overflow-y: auto;
                        padding: 10px;
                    }
                    .date-button {
                        width: 50px;
                        height: 50px;
                        font-size: 12px;
                        padding: 2px;
                        text-align: center;
                        border-radius: 50%;
                        margin: 5px;
                    }
                    .date-button:hover {
                        background-color: #007bff;
                        color: white;
                    }
                    .date-button small {
                        font-size: 10px;
                    }

                    .city-buttons {
                        display: flex;
                        justify-content: flex-start;
                        margin-top: 15px;
                        margin-left: 15px;
                    }
                    .city-button {
                        width: auto;
                        padding: 5px 10px;
                        font-size: 14px;
                        margin-right: 10px;
                    }
                    .city-button:hover, .city-button:focus {
                        background-color: #007bff;
                        color: white;
                    }
                </style>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="confirmBooking">Tiếp tục</button>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof $ === 'undefined') {
        console.error('jQuery is not loaded. Please make sure jQuery is included before this script.');
        return;
    }

    let selectedDate = null;
        let selectedCity = null;
        let movieId = null;

        $(document).on('click', '.btn-booking', function() {
            movieId = $(this).data('movie-id');
        });

        // Khi chọn ngày
        $(document).on('click', '.select-date', function () {
            selectedDate = $(this).data('date');
            $('.select-date').removeClass('btn-primary').addClass('btn-outline-primary'); // Reset màu nút ngày
            $(this).removeClass('btn-outline-primary').addClass('btn-primary'); // Đổi màu nút đã chọn
            updateTheaterSchedule();
        });

        // Khi chọn tỉnh thành
        $(document).on('click', '.select-city', function () {
            selectedCity = $(this).data('city');
            $('.select-city').removeClass('btn-primary').addClass('btn-outline-secondary'); // Reset màu nút tỉnh
            $(this).removeClass('btn-outline-secondary').addClass('btn-primary'); // Đổi màu nút đã chọn
            updateTheaterSchedule();
        });

        // Hàm cập nhật lịch chiếu
        function updateTheaterSchedule() {
            if (selectedDate && selectedCity) {
                $.ajax({
                    url: '/get-showtimes',
                    method: 'GET',
                    data: {
                        date: selectedDate,
                        city: selectedCity,
                        movieId: movieId
                    },
                    success: function (data) {
                        $('#theater-schedule').html(data);
                    }
                });
            } else {
                $('#theater-schedule').html('<p>Chọn ngày và tỉnh để hiển thị các rạp và suất chiếu.</p>');
                $('#confirmBooking').prop('disabled', true); // Tắt nút Tiếp tục nếu chưa chọn
            }
        }

    // ... rest of the existing JavaScript code ...
});
</script>
