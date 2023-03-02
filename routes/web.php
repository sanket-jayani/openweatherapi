<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WhetherController;

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
    return view('welcome');
});

Route::get('next24hour/whether', [WhetherController::class, 'Next24Hour'])->name('next24hour.whether');
Route::get('current/whether', [WhetherController::class, 'CurrentWhether'])->name('current.whether');
Route::get('next7days/whether', [WhetherController::class, 'Next7Days'])->name('next7days.whether');

/* Routes fo Ajax Call*/
Route::post('current/whether/getData', [WhetherController::class, 'currentWeatherGetData'])->name('currentWeatherGetData');
