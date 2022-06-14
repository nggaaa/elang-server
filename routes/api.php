<?php

use App\Http\Controllers\APIController;
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
Route::get("/", function () {
    if (env("APP_MAINTENANCE") === true) {
        return response()->json(["status" => "error", "message" => "Server Dalam Perbaikan"]);
    }
    return response()->json(["status" => "success", "message" => "Server Online"]);

});

Route::get("/clean", [APIController::class, "cleanDB"]);
Route::post("/login", [APIController::class, "login"]);
Route::post("/register", [APIController::class, "register"]);
Route::post("/forgot", [APIController::class, "forgotPassword"]);

Route::group(["middleware" => "auth.api"], function () {
    Route::post("/user/all", [APIController::class, "allUser"]);
    Route::post("/user", [APIController::class, "getUser"]);
    Route::post("/videos", [APIController::class, "getVideo"]);
    Route::post("/getQuestion", [APIController::class, "getQuestion"]);
    Route::post("/postScore", [APIController::class, "postScore"]);
});