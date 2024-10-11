@extends('client.layouts.index')

@section('title', 'Chọn Ghế')

@section('content')
<div class="container mt-4 mb-4">
    <h2>Chọn ghế cho suất chiếu {{ $showtime->show_time }} - {{ $showtime->cinemaRoom->name }}</h2>
    <div class="seat-selection">
        <div class="screen text-center mb-4">
            <div class="screen-label">Màn hình</div>
        </div>
        <form action="{{ route('payment.show') }}" method="POST">
            @csrf
            <input type="hidden" name="showtime_id" value="{{ $showtime->id }}">
            <div class="seat-layout">
                @foreach($seatsByRow as $row => $seats)
                <div class="seat-row">
                    <div class="row-label">{{ $row }}</div>
                    @foreach($seats as $index => $seat)
                    @php
                    $isBooked = !$seat->is_available;
                    $seatNumber = $seat->seat_number; // Use the seat_number from the seat model
                    $seatType = $seat->type;
                    @endphp
                    <div class="seat-wrapper">
                        <input type="checkbox" id="seat-{{ $seat->id }}" class="seat-checkbox" value="{{ $seat->id }}"
                            name="selected_seats[]" data-price="{{ $showtime->price }}" data-type="{{ $seatType }}"
                            {{ $isBooked ? 'disabled' : '' }} />
                        <label for="seat-{{ $seat->id }}" class="seat {{ $isBooked ? 'booked' : '' }} {{ $seatType }}">
                            {{ $seatNumber }}
                        </label>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>

            <button type="button" class="btn btn-primary mt-4" data-toggle="modal"
                data-target="#bookingSummaryModal">Tiếp theo</button>

            <!-- Modal -->
          @include('blocks.payment-modale')

        </form>
    </div>
</div>

<div class="mt-4">
    <h4>Tổng tiền: <span id="totalAmount">0</span> VNĐ</h4>
</div>

