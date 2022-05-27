<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePindahBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pindah_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('barangpindah_id');
            $table->foreignId('barang_id')->constrained('barangs')->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('ruangan_id')->constrained('ruangans')->onDelete("cascade")->onUpdate("cascade");
            $table->integer("jumlah");
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
        Schema::dropIfExists('pindah_barangs');
    }
}