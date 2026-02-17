<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Infografis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InfografisController extends Controller
{
    /**
     * Tampilkan form edit data infografis
     */
    public function edit()
    {
        // Ambil data infografis (hanya 1 row)
        $data = Infografis::first();

        // Jika belum ada data, buat data baru dengan default 0
        if (!$data) {
            $data = Infografis::create([]);
        }

        return view('admin.infografis.edit', compact('data'));
    }

    /**
     * Update data infografis
     */
    public function update(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'total_penduduk' => 'required|integer|min:0',
            'laki_laki' => 'required|integer|min:0',
            'perempuan' => 'required|integer|min:0',
            'jumlah_keluarga' => 'required|integer|min:0',
        ], [
            'required' => ':attribute wajib diisi',
            'integer' => ':attribute harus berupa angka',
            'min' => ':attribute minimal :min',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Terdapat kesalahan pada input data!');
        }

        // Ambil data infografis
        $infografis = Infografis::first();

        // Jika belum ada, buat baru
        if (!$infografis) {
            $infografis = new Infografis();
        }

        // Update semua field
        $infografis->fill($request->except(['_token', '_method']));
        $infografis->save();

        return redirect()->route('admin.infografis.edit')
            ->with('success', 'Data infografis berhasil diperbarui!');
    }
}
