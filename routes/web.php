<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BibitController;
use App\Http\Controllers\PupukController;
use App\Http\Controllers\PeralatanController;

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

Route::get('/', function () {
    return view('layouts.default');
});

Route::resource('admin/pupuk', PupukController::class);
Route::resource('admin/bibit', BibitController::class);
Route::resource('admin/peralatan', PeralatanController::class);
