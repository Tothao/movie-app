<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cinema;
use App\Models\Showtime;
class ShowtimeController extends Controller
{
    //

    public function index(Request $request)
    {
        $date = $request->query('date');
        $city = $request->query('city');
        $movieId = $request->query('movieId');

        // Giả sử bạn có phương thức trong model để lấy lịch chiếu theo ngày, tỉnh và phim
        $showtimes = Showtime::where('date', $date)
            ->where('city', $city)
            ->where('movie_id', $movieId)
            ->get();

        // Trả về dữ liệu dưới dạng view hoặc JSON
        return view('client.showtimes', compact('showtimes'));
        // hoặc nếu bạn muốn trả về JSON
        // return response()->json($showtimes);
    }
    public function getShowtimes(Request $request)
    {
        $date = $request->input('date');
        $city = $request->input('city');
        $movieId = $request->input('movieId'); // Nhận movieId từ request

        // Lọc các rạp theo city và lấy các showtimes theo movieId và date
        $cinemas = Cinema::where('city', $city)
            ->with(['halls.showtimes' => function ($query) use ($date, $movieId) {
                $query->where('show_date', $date)
                    ->where('movie_id', $movieId); // Lọc theo movieId
            }])
            ->get();

        // Render view cho suất chiếu
        return view('blocks.showtimes', ['cinemas' => $cinemas]);
    }
}
