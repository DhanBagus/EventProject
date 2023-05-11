<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\EventController;
use App\Http\Controllers\PartisipanController;
// Route::resource('events', EventController::class);

// Route::get('/events/create', [App\Http\Controllers\EventController::class,'create'])->name('events.create');

Route::get('/', function () {
    return redirect('/home');
});

// Route::get('/', function () {
//     return view('home');
// });



Auth::routes();

Route::get('/home', [App\Http\Controllers\EventController::class, 'index'])->name('home');
Route::get('/events/create', [App\Http\Controllers\EventController::class, 'create'])->name('events.create');
Route::post('/events/store', [App\Http\Controllers\EventController::class, 'store'])->name('events.store');
Route::delete('/events/{id}/destroy', [App\Http\Controllers\EventController::class, 'destroy'])->name('events.destroy');
Route::get('/events/{id}/edit', [App\Http\Controllers\EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{id}/update', [App\Http\Controllers\EventController::class, 'update'])->name('events.update');
Route::get('/events/{id}/show', [App\Http\Controllers\EventController::class, 'show'])->name('events.show');

Route::get('/partisipan/{id}', [App\Http\Controllers\PartisipanController::class, 'index'])->name('partisipan');
Route::post('/partisipan/store', [App\Http\Controllers\PartisipanController::class, 'store'])->name('partisipan.store');
Route::delete('/partisipan/{id}/destroy', [App\Http\Controllers\PartisipanController::class, 'destroy'])->name('partisipan.destroy');