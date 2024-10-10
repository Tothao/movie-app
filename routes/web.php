<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\ShowtimeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//client
Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('movies/showing', [HomeController::class, 'showing'])->name('movies.showing');
Route::get('movies/upcoming', [HomeController::class, 'upcoming'])->name('movies.upcoming');
Route::get('/movies/{id}', [MoviesController::class, 'show'])->name('movies.show');

//booking
//Route::get('/book-ticket/{showtime}', [BookingController::class, 'showBookingForm'])->name('booking.form');
Route::get('/get-showtimes', [ShowtimeController::class, 'getShowtimes'])->name('get.showtimes');

//Route admin/director
Route::prefix('admin')->group(function (){
   Route::get('/',[AdminController::class, 'dashboard'])->name('admin.dashboard');
   Route::get('director',[DirectorController::class, 'index'])->name('admin.director');
   Route::get('director/create', [DirectorController::class, 'create'])->name('admin.director.create');
   Route::post('director', [DirectorController::class, 'store'])->name('admin.director.store');
   Route::get('director/{id}/edit', [DirectorController::class, 'edit'])->name('admin.director.edit');
   Route::put('director/{id}', [DirectorController::class, 'update'])->name('admin.director.update');
   Route::delete('director/{id}', [DirectorController::class, 'destroy'])->name('admin.director.destroy');

});

// route admin/movies
   Route::prefix('admin')->group(function () {
       Route::resource('movies', MoviesController::class)->names([
           'index' => 'admin.movies.index',
           'create' => 'admin.movies.create',
           'store' => 'admin.movies.store',
           'edit' => 'admin.movies.edit',
           'update' => 'admin.movies.update',
           'destroy' => 'admin.movies.destroy',
       ])->except(['show']);
   });



// route admin/actors
   Route::prefix('admin')->group(function () {
       Route::resource('actors', ActorsController::class)->names([
           'index' => 'admin.actors.index',
           'create' => 'admin.actors.create',
           'store' => 'admin.actors.store',
           'edit' => 'admin.actors.edit',
           'update' => 'admin.actors.update',
           'destroy' => 'admin.actors.destroy',
       ])->except(['show']);
   });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
