<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerbarangrusakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER trigger_stokbarangrusak after INSERT ON barang_rusaks
            FOR EACH ROW BEGIN
            UPDATE barangs
                SET jumlah_barang = jumlah_barang - NEW.jumlah
            WHERE
            id = NEW.id;
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
        Schema::dropIfExists('triggerbarangrusak');
    }
}