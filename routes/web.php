<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ResultController;
use App\Http\Controllers\DeviceController;

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
    return view('welcome');
});

Route::get('/add_device', function() {
    return view('add_device');
});

Route::post('/new_device', [DeviceController::class, 'addDevice']);