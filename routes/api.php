<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;

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

Route::get("/", function(){
	return response()->json(["status"=>"error","message"=>"Server Dalam Perbaikan"]);
});
Route::post("/login", [APIController::class, "login"]);
Route::post("/register", [APIController::class, "register"]);

Route::get("/user", [APIController::class, "allUser"]);
Route::get("/user/{id}", [APIController::class, "getUser"]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
