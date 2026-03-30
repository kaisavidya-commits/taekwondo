<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IuranMasterSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('iuran_master')->insert([
            // BANDUNG TIMUR
            [
                'unit' => 'GOR MEKAR GALIH',
                'harga' => 75000,
                'keterangan' => 'Bandung Timur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'unit' => 'GOR GDN CICALENGKA',
                'harga' => 75000,
                'keterangan' => 'Bandung Timur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'unit' => 'GOR NAGREG',
                'harga' => 75000,
                'keterangan' => 'Bandung Timur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'unit' => 'SMP FK BINA MUDA',
                'harga' => 75000,
                'keterangan' => 'Bandung Timur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'unit' => 'SMPN 1 CICALENGKA',
                'harga' => 75000,
                'keterangan' => 'Bandung Timur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'unit' => 'SDIT ALFALAH',
                'harga' => 0,
                'keterangan' => 'Dibayar Sekolah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'unit' => 'SDIT ALMUBAROKAH',
                'harga' => 90000,
                'keterangan' => 'Bandung Timur',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // KOTA BANDUNG
            [
                'unit' => 'SDN 221 BABAKAN SENTRAL KIRCON',
                'harga' => 75000,
                'keterangan' => 'Kota Bandung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'unit' => 'SDN 270 GENTRA MAKSEDAS',
                'harga' => 85000,
                'keterangan' => 'Kota Bandung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'unit' => 'GOR YM KOPO',
                'harga' => 120000,
                'keterangan' => 'Kota Bandung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}