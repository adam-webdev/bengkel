<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('posisi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_posisi', 200);
            $table->timestamps();
        });
        Schema::create('seksi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_seksi', 200);
            $table->timestamps();
        });
        Schema::create('pgr', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pgr');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('nik');
            $table->foreignId('posisi_id')->constrained('posisi')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('seksi_id')->constrained('seksi')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('pgr_id')->constrained('pgr')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('foto');
            $table->string('jenis_kelamin');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('posisi');
        Schema::dropIfExists('seksi');
        Schema::dropIfExists('pgr');
        Schema::dropIfExists('users');
    }
}