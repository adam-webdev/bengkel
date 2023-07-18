<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBengkelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bengkels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_bengkel');
            $table->string('foto_bengkel');
            $table->string('deskripsi')->nullable();
            $table->string('public_id')->nullable();
            $table->string('email')->unique();
            $table->time('jam_buka');
            $table->time('jam_tutup');
            $table->string('no_hp');
            $table->string('alamat_lengkap')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('provinsi_id')->nullable();
            $table->string('kota_id')->nullable();
            $table->string('kecamatan_id')->nullable();
            $table->string('desa_id')->nullable();
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
        Schema::dropIfExists('bengkels');
    }
}
