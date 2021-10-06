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
    return redirect('briefs');
});

Route::resources([
    "briefs" => BriefsController::class,
    "levels" => LevelsController::class,
    "decisions" => DecisionsController::class,
    "positions" => PositionsController::class
]);
