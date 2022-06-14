<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model {
    // use HasFactory;
    public $fillable = ['question', 'a_option', 'b_option', 'c_option', 'd_option', 'answer'];
}