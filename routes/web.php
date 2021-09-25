<?php

use App\Models\Brief;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix("/dash")->group(function () {

    Route::get("/", function () {
        return view("dashBoard")->with('briefs', Brief::all());
    });

    Route::prefix("/{brief}")->group(function () {

        Route::get("/", function (Brief $brief) {
            return view("brief", ["id" => $brief])->with('briefs', $brief);
        });

        Route::prefix("edit")->group(function () {

            Route::get("/", function (Brief $brief) {
                return view("editBrief", ["id" => $brief])->with('briefs', $brief);
            });

            Route::patch("/", "BriefController@patch");
        });

        Route::delete("/", "BriefController@delete");

    });

    Route::prefix("/create")->group(function () {

        Route::get("/", function () {
            return view("createBrief");
        });

        Route::put("/", "BriefController@create");
    });
});
