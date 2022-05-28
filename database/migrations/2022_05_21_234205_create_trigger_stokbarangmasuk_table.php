<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTriggerStokbarangmasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::unprepared('
        CREATE TRIGGER trigger_stokbarangmasuk after INSERT ON barang_masuks
        FOR EACH ROW BEGIN
        UPDATE barangs
        SET jumlah_barang = jumlah_barang + NEW.jumlah
        WHERE
        id = NEW.barang_id;
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trigger_stokbarangmasuk');
    }
}