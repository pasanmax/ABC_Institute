<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\BatchesController;

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

Route::get('/', function () {
    return view('index');
});
Auth::routes();

Route::resource('/students', StudentsController::class)->middleware('auth');
Route::get('/students/{id}/pdf', [StudentsController::class, 'pdf'])->middleware('auth');
Route::resource('/courses', CoursesController::class)->middleware('auth');
Route::resource('/batches', BatchesController::class)->middleware('auth');

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

