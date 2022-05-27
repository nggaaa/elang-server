<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfirmationSignUp extends Model {
    protected $table = "confirm_signup";
    protected $fillable = ['name', 'email', 'password', 'token'];
}