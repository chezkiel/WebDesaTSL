<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Infografis;

class InfografisSeeder extends Seeder
{
    public function run()
    {
        Infografis::create([
            // --- Statistik Penduduk ---
            'total_penduduk' => 1450,
            'laki_laki' => 720,
            'perempuan' => 730,
            'jumlah_keluarga' => 380,

            // --- Distribusi Usia ---
            'usia_0_5' => 85,
            'usia_6_17' => 280,
            'usia_18_35' => 450,
            'usia_36_55' => 380,
            'usia_56_keatas' => 255,

            // --- Pendidikan ---
            'sd' => 320,
            'smp' => 280,
            'sma' => 420,
            'sarjana' => 180,

            // --- Pekerjaan ---
            'petani' => 420,
            'wiraswasta' => 280,
            'pelajar' => 320,
            'pns' => 85,
            'lainnya' => 345,

            // --- Sarana & Prasarana ---
            'posyandu' => 3,
            'sekolah' => 4,
            'tempat_ibadah' => 6,
            'kantor_desa' => 1,

            // --- Pertanian (dalam ton/tahun) ---
            'padi' => 120,
            'jagung' => 80,
            'sayuran' => 150,
            'buah' => 90,
        ]);
    }
}