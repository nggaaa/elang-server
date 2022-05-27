<?php

use App\Models\ConfirmationSignUp;
use App\Models\User;
use Illuminate\Http\Request;
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
    $token = $req->query('token');
    $user = ConfirmationSignUp::where('token', $token)->first();
    if ($user) {
        User::create([
            'name' => $user->name,
            'email' => $user->email,
            'email_verified_at' => now(),
            'password' => Hash::make($user->password),
            'score' => 0,
        ]);
        ConfirmationSignUp::where('token', $token)->delete();
        return redirect('/')->with('success', 'Your account has been created. Please check your email to activate your account.');
    }
    return redirect('/')->with('error', 'Invalid token.');
})->name("confirmation");
