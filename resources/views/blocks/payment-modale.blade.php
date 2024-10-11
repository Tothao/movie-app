<div class="container">
        <h2>Thanh Toán</h2>
        <p><strong>Phim:</strong> {{ $showtime->movie->title }}</p>
        <p><strong>Rạp:</strong> {{ $showtime->cinemaRoom->cinema->name }}</p>
        <p><strong>Phòng chiếu:</strong> {{ $showtime->cinemaRoom->name }}</p>
        <p><strong>Xuất chiếu:</strong> Ngày: {{ $showtime->show_date }} - Giờ: {{ $showtime->show_time }}</p>
        <p><strong>Số ghế đã chọn:</strong> {{ implode(', ', $seatNumbers) }}</p>

        </p>
        <p><strong>Tổng tiền:</strong> {{ number_format($totalAmount, 0, ',', '.') }} VNĐ</p>

        <form action="{{ route('payment.checkout') }}" method="POST">
            @csrf
            <input type="hidden" name="showtime_id" value="{{ $showtime->id }}">
            <input type="hidden" name="total_amount" value="{{ $totalAmount }}">
            <input type="hidden" name="selected_seats" value="{{ implode(',',$selectedSeatIds) }}">
            <button type="submit" class="btn btn-success">Xác Nhận Thanh Toán</button>
        </form>
    </div>
    <script>
$(document).ready(function() {
    let totalAmount = 0;

    $('.seat-checkbox').on('change', function() {
        let seatPrice = parseFloat($(this).data('price'));
        let seatType = $(this).data('type');

        // Adjust price based on seat type
        if (seatType === 'vip') {
            seatPrice *= 1.5; // VIP seats cost 50% more
        }

        if (this.checked) {
            totalAmount += seatPrice;
        } else {
            totalAmount -= seatPrice;
        }

        $('#totalAmount').text(totalAmount.toLocaleString('vi-VN', {
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }));
    });

    // Cập nhật thông tin trong modal khi nhấn nút "Tiếp theo"
    $('button[data-toggle="modal"]').on('click', function() {
        let selectedSeats = [];
        $('.seat-checkbox:checked').each(function() {
            let seatLabel = $(this).siblings('label').text(); // Lấy nhãn ghế
            selectedSeats.push(seatLabel); // Thêm vào mảng
        });

        // Hiển thị ghế đã chọn và tổng tiền trong modal
        $('#selectedSeats').text(selectedSeats.join(', '));
        $('#modalTotalAmount').text(totalAmount.toLocaleString('vi-VN', {
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }));
    });
});
</script>
@endsection

<style>
.seat-selection {
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 10px;
}

.screen {
    background-color: #e9ecef;
    height: 50px;
    position: relative;
    margin-bottom: 30px;
}

.screen-label {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-weight: bold;
}

.seat-layout {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.seat-row {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.row-label {
    width: 30px;
    text-align: center;
    font-weight: bold;
    margin-right: 10px;
}

.seat-wrapper {
    margin: 0 5px;
}

.seat-checkbox {
    display: none;
}

.seat {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    border: 1px solid #007bff;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 12px;
}

.seat-checkbox:checked+.seat {
    background-color: #007bff;
    color: white;
}

.seat.booked {
    background-color: #dc3545;
    color: white;
    cursor: not-allowed;
}

.seat.vip {
    border-color: #ffc107;
    color: #ffc107;
}

.seat-checkbox:checked+.seat.vip {
    background-color: #ffc107;
    color: black;
}

.btn-primary {
    margin-top: 20px;
}
</style>