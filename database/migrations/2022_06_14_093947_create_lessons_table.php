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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("url");
            $table->integer("category");
            $table->bigInteger("duration");
            $table->bigInteger("minscore");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('lessons');
    }
};