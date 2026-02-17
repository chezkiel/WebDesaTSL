<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('infografis', function (Blueprint $table) {
            $table->id();
            
            // --- Statistik Penduduk ---
            $table->integer('total_penduduk')->default(0);
            $table->integer('laki_laki')->default(0);
            $table->integer('perempuan')->default(0);
            $table->integer('jumlah_keluarga')->default(0);

            // --- Distribusi Usia ---
            $table->integer('usia_0_5')->default(0);
            $table->integer('usia_6_17')->default(0);
            $table->integer('usia_18_35')->default(0);
            $table->integer('usia_36_55')->default(0);
            $table->integer('usia_56_keatas')->default(0);

            // --- Pendidikan ---
            $table->integer('sd')->default(0);
            $table->integer('smp')->default(0);
            $table->integer('sma')->default(0);
            $table->integer('sarjana')->default(0);

            // --- Pekerjaan ---
            $table->integer('petani')->default(0);
            $table->integer('wiraswasta')->default(0);
            $table->integer('pelajar')->default(0);
            $table->integer('pns')->default(0);
            $table->integer('lainnya')->default(0);

            // --- Sarana & Prasarana ---
            $table->integer('posyandu')->default(0);
            $table->integer('sekolah')->default(0);
            $table->integer('tempat_ibadah')->default(0);
            $table->integer('kantor_desa')->default(1);

            // --- Pertanian ---
            $table->integer('padi')->default(0);
            $table->integer('jagung')->default(0);
            $table->integer('sayuran')->default(0);
            $table->integer('buah')->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('infografis');
    }
};