<?php

namespace App\Http\Controllers;

use App\Mail\MailSignUp;
use App\Models\ConfirmationSignUp;
use App\Models\Materi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class APIController extends Controller {
    public function login(Request $req) {
        $validator = Validator::make($req->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }
        $search = User::where("email", $req->email)->first();
        if ($search) {
            if (Hash::check($req->password, $search->password)) {
                $apitoken = Str::random(60);
                User::where("email", $req->email)->update(["api_token" => $apitoken]);
                return response()->json(["status" => "success", "message" => "Login Sukses", "api_token" => $apitoken]);
            }
        } else {
            if (ConfirmationSignUp::where("email", $req->email)->first()) {
                return response()->json(["status" => "error", "message" => "Cek email kamu untuk aktivasi akun."]);
            }
        }
        return response()->json(["status" => "error", "message" => "Email atau password salah"]);
    }

    public function register(Request $req) {
        $req->validate([
            'email' => 'required|email',
            'name' => 'required|bail',
            'password' => 'required|bail',
        ]);
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
            return response()->json(["status" => "success", "message" => "Pendaftaran berhasil. Silahkan cek email"]);
        }
    }

    public function cleanDB() {
        ConfirmationSignUp::truncate();
    }

    public function logout(Request $req) {
        User::where("api_token", $req->api_token)->update(["api_token" => null]);
        return response()->json(["status" => "success", "message" => "Logout Sukses"]);
    }

    public function allUser() {
        return response()->json(User::get());
    }
    public function getUser(Request $req) {
        return response()->json(User::where('api_token', $req->api_token)->first());
    }
    public function getVideo(Request $req) {
        switch ($req->category) {
        case 1:
            $score = $req->eng_score;
            break;
        case 2:
            $score = $req->arab_score;
            break;
        default:
            # code...
            break;
        }
        return response()->json(Materi::where("category", $req->category)->where('minscore', '<=', $score)->get());
    }

    public function getQuestion(Request $req) {
        $req->validate([
            "url"
        ]);
    }
}