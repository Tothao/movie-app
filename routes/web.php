<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\MovieController;


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

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('now-showing', function (){
    return view('client.pages.now-showing');
})->name('now-showing');

//Route admin
Route::prefix('admin')->group(function (){
   Route::get('/',[AdminController::class, 'dashboard'])->name('admin.dashboard');
   Route::get('director',[DirectorController::class, 'index'])->name('admin.director');
   Route::get('director/create', [DirectorController::class, 'create'])->name('admin.director.create');
   Route::post('director', [DirectorController::class, 'store'])->name('admin.director.store');
   Route::get('director/{id}/edit', [DirectorController::class, 'edit'])->name('admin.director.edit');
   Route::put('director/{id}', [DirectorController::class, 'update'])->name('admin.director.update');
   Route::delete('director/{id}', [DirectorController::class, 'destroy'])->name('admin.director.destroy');

});

   Route::prefix('admin')->group(function () {
       Route::resource('movie', MovieController::class);
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
