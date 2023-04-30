<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUlasansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ulasans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('bengkel_id')->constrained('bengkels')->onDelete('cascade');
            $table->string('ulasan');
            $table->string('angka_ulasan');
            $table->date('tanggal_ulasan');
            $table->string('public_id')->nullable();
            $table->string('foto_ulasan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ulasans');
    }
}
