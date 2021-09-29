<?php

use App\Http\Controllers\BriefsController;
use App\Http\Controllers\DecisionsController;
use App\Http\Controllers\LevelsController;
use App\Http\Controllers\PositionsController;
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
Route::get("/", function(){
    return view("index");
});

Route::resources([
    "briefs" => BriefsController::class,
    "levels" => LevelsController::class,
    "decisions" => DecisionsController::class,
    "positions" => PositionsController::class
]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
