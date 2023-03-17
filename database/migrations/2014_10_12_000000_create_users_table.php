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


        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('no_hp');
            $table->string('name');
            $table->string('provinsi_id')->nullable();
            $table->string('kota_id')->nullable();
            $table->string('kecamatan_id')->nullable();
            $table->string('desa_id')->nullable();
            $table->string('public_id')->nullable();
            $table->string('foto')->nullable();
            $table->string('jenis_kelamin')->nullable();
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

        Schema::dropIfExists('users');
    }
}
