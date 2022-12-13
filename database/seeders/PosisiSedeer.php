<?php

namespace Database\Seeders;

use App\Models\Pgr;
use App\Models\Posisi;
use App\Models\Seksi;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PosisiSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Posisi::insert([
            [
                'nama_posisi' => 'Direktur',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_posisi' => 'Super visor',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_posisi' => 'Sekertaris',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_posisi' => 'Human Resources',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
        Seksi::insert([
            [
                'nama_seksi' => 'Seksi 1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_seksi' => 'Seksi 2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_seksi' => 'Seksi 3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_seksi' => 'Seksi 4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
        Pgr::insert([
            [
                'kode_pgr' => 001,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_pgr' => 002,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_pgr' => 003,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_pgr' => 004,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}