<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infografis extends Model
{
    use HasFactory;

    protected $table = 'infografis';

    protected $fillable = [
        // Statistik Penduduk Umum
        'total_penduduk',
        'laki_laki',
        'perempuan',
        'jumlah_keluarga',

        // Statistik Per Jaga
        'jaga1_penduduk',
        'jaga1_kk',
        'jaga1_laki',
        'jaga1_perempuan',
        'jaga2_penduduk',
        'jaga2_kk',
        'jaga2_laki',
        'jaga2_perempuan',

        // Distribusi Usia
        'usia_0_14',
        'usia_15_24',
        'usia_25_39',
        'usia_40_59',
        'usia_60_keatas',

        // Tingkat Pendidikan
        'sd',
        'smp',
        'sma',
        'sarjana',

        // Jenis Pekerjaan
        'petani',
        'wiraswasta',
        'pelajar',
        'pns',
        'lainnya',

        // Kondisi Perumahan & Sanitasi
        'rumah_layak',
        'rumah_tidak_layak',
        'tpa_terorganisir',
        'jamban_cemplung',

        // Sumber Air
        'rumah_sumur',
        'rumah_pam',
        'rumah_sumber_lain',

        // Sarana & Prasarana
        'posyandu',
        'sekolah',
        'tempat_ibadah',
        'kantor_desa',

        // Produksi Pertanian
        'padi',
        'jagung',
        'sayuran',
        'buah',

        // Potensi UMKM & Pariwisata
        'umkm_kuliner',
        'umkm_kerajinan',
        'wisata',
        'umkm_lainnya',

        // Pertumbuhan Penduduk Tahunan
        'penduduk_2021',
        'penduduk_2022',
        'penduduk_2023',
        'penduduk_2024',
        'penduduk_2025',
    ];

    protected $casts = [
        'total_penduduk' => 'integer',
        'laki_laki' => 'integer',
        'perempuan' => 'integer',
        'jumlah_keluarga' => 'integer',
        'jaga1_penduduk' => 'integer',
        'jaga1_kk' => 'integer',
        'jaga1_laki' => 'integer',
        'jaga1_perempuan' => 'integer',
        'jaga2_penduduk' => 'integer',
        'jaga2_kk' => 'integer',
        'jaga2_laki' => 'integer',
        'jaga2_perempuan' => 'integer',
        'usia_0_14' => 'integer',
        'usia_15_24' => 'integer',
        'usia_25_39' => 'integer',
        'usia_40_59' => 'integer',
        'usia_60_keatas' => 'integer',
        'sd' => 'integer',
        'smp' => 'integer',
        'sma' => 'integer',
        'sarjana' => 'integer',
        'petani' => 'integer',
        'wiraswasta' => 'integer',
        'pelajar' => 'integer',
        'pns' => 'integer',
        'lainnya' => 'integer',
        'rumah_layak' => 'integer',
        'rumah_tidak_layak' => 'integer',
        'tpa_terorganisir' => 'integer',
        'jamban_cemplung' => 'integer',
        'rumah_sumur' => 'integer',
        'rumah_pam' => 'integer',
        'rumah_sumber_lain' => 'integer',
        'posyandu' => 'integer',
        'sekolah' => 'integer',
        'tempat_ibadah' => 'integer',
        'kantor_desa' => 'integer',
        'padi' => 'integer',
        'jagung' => 'integer',
        'sayuran' => 'integer',
        'buah' => 'integer',
        'umkm_kuliner' => 'integer',
        'umkm_kerajinan' => 'integer',
        'wisata' => 'integer',
        'umkm_lainnya' => 'integer',
        'penduduk_2021' => 'integer',
        'penduduk_2022' => 'integer',
        'penduduk_2023' => 'integer',
        'penduduk_2024' => 'integer',
        'penduduk_2025' => 'integer',
    ];
}
