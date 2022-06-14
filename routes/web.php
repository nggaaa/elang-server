<?php

use App\Models\ConfirmationSignUp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

Route::get('/confirmation', function (Request $req) {
    $req->validate(["token" => "required"]);
    $token = $req->query('token');
    $user = ConfirmationSignUp::where('token', $token)->first();
    if ($user) {
        User::create([
            'name' => $user->name,
            'email' => $user->email,
            'email_verified_at' => now(),
            'password' => $user->password,
        ]);
        ConfirmationSignUp::where('token', $token)->delete();
        return view('confirmation', ["err" => false]);
    }
    return view("confirmation", ["err" => true]);
})->name("w_signup-confirm");

Route::get("/forgot-confirm/{token}", function ($token) {
    $data = DB::table("password_resets")->where("token", $token)->first();
    if ($data) {
        return view("auth.forgot-confirm", ["token" => $token]);
    }
    return abort(404);
})->name("w_forgot-confirm");

Route::post("/forgot-confirm/{token}", function (Request $req, $token) {
    $req->validate([
        "email" => "required|email",
        "password" => "required",
        "password_confirmation" => "required",
    ]);
    $data = DB::table("password_resets")->where("token", $token)->first();
    if ($data) {
        $user = User::where("email", $data->email)->first();
        if ($user) {
            $user->password = Hash::make($req->password);
            $user->save();
            DB::table("password_resets")->where("token", $token)->delete();
            return "silahkan login lagi";
        }
        return back()->with("error", "email tidak ditemukan");
    }
    return abort(404);
})->name("w_forgot-confirm-put");