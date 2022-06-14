<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('url')->unique();
            $table->longText('question');
            $table->longText('a_option');
            $table->longText('b_option');
            $table->longText('c_option');
            $table->longText('d_option');
            $table->text('answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('quizzes');
    }
};