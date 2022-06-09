<?php

use App\Models\ConfirmationSignUp;
use App\Models\User;
use Illuminate\Http\Request;
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
})->name("confirmation");