<?php

use App\Models\Brief;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResources(
    [
        "briefs" => \App\Http\Controllers\Api\BriefsController::class,
        "levels" => \App\Http\Controllers\Api\LevelsController::class,
        "decisions" => \App\Http\Controllers\Api\DecisionsController::class,
        "positions" => \App\Http\Controllers\Api\PositionsController::class
    ]
);
