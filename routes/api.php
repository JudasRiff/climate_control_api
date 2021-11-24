<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SchoolController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/classrooms', [ClassroomController::class, 'index'])->name('show.lokalen');
Route::get('/schools/{schoolnaam}/classroom/{lokaalnaam}', [ClassroomController::class, 'show'])->name('show.lokalen');
Route::get('/results', [ResultController::class, 'index'])->name('show.meetwaardes');
Route::get('/results/{devicenaam}', [ResultController::class, 'show'])->name('show.meetwaardes');
Route::get('/schools', [SchoolController::class, 'index'])->name('show.scholen');