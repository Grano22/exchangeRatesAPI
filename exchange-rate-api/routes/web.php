<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackerController;
use App\Http\Controllers\HistoricalDataController;
use App\Http\Controllers\DailyDataController;
use App\Http\Controllers\CourseDataController;
use App\Http\Controllers\DataTrackerController;

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
Route::get('/tracker', [TrackerController::class, 'show']);
Route::get('/historical-data', [HistoricalDataController::class, 'show']);
Route::get('/daily-data', [DailyDataController::class, 'show']);
Route::get('/course-status', [CourseDataController::class, 'show']);
Route::get('/data-tracker', [DataTrackerController::class, 'show']);