<?php

namespace App\Http\Controllers;

use App\Mail\MailSignUp;
use App\Models\ConfirmationSignUp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class APIController extends Controller {
    public function login(Request $req) {
        $search = User::where("email", $req->email)->first();
        if ($search) {
            if (Hash::check($req->password, $search->password)) {
                return $search;
            }
        } else {
            if (ConfirmationSignUp::where("email", $req->email)->first()) {
                return response()->json(["status" => "error", "message" => "Cek email kamu untuk aktivasi akun."]);
            }
        }
        return response()->json(["status" => "error", "message" => "Email atau password salah"]);
    }
    public function register(Request $req) {
        $search = User::where("email", $req->email)->first();
        if ($search) {
            return response()->json(["status" => "error", "message" => "Email sudah terdaftar"]);
        } else {
            $temp_token = Str::random(60);
            ConfirmationSignUp::create([
                "email" => $req->email,
                "password" => Hash::make($req->password),
                "name" => $req->name,
                'token' => $temp_token,
            ]);
            Mail::to($req->email)->send(new MailSignUp($req->email, $req->name, $temp_token));
            return response()->json(["status" => "success", "message" => "Sign Up berhasil. Silahkan cek email"]);
        }
    }
    public function allUser() {
        return response()->json(User::get());
    }
    public function getUser($id) {
        return response()->json(User::find($id));
    }

}