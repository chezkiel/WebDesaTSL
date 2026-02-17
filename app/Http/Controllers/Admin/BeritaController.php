<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Tampilkan daftar berita
     */
    public function index()
    {
        $berita = Berita::orderBy('tanggal', 'desc')->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }

    /**
     * Tampilkan form tambah berita
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * Simpan berita baru
     */
    public function store(Request $request)
    {
        // Validasi
        $validator = Validator::make($request->all(), [
            'judul' => 'required|max:255',
            'konten' => 'required',
            'kategori' => 'nullable|max:255',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'judul.required' => 'Judul wajib diisi',
            'konten.required' => 'Konten wajib diisi',
            'tanggal.required' => 'Tanggal wajib diisi',
            'tanggal.date' => 'Format tanggal tidak valid',
            'gambar.image' => 'File harus berupa gambar',
            'gambar.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'gambar.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Terdapat kesalahan pada input data!');
        }

        // Buat slug dari judul
        $slug = Str::slug($request->judul);

        // Cek apakah slug sudah ada, jika ya tambahkan angka
        $slugCount = Berita::where('slug', 'LIKE', $slug . '%')->count();
        if ($slugCount > 0) {
            $slug = $slug . '-' . ($slugCount + 1);
        }

        // Handle upload gambar
        $gambarName = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . Str::slug(pathinfo($gambar->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('images/berita'), $gambarName);
        }

        // Simpan ke database
        Berita::create([
            'judul' => $request->judul,
            'slug' => $slug,
            'konten' => $request->konten,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
            'gambar' => $gambarName,
        ]);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit berita
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    /**
     * Update berita
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        // Validasi
        $validator = Validator::make($request->all(), [
            'judul' => 'required|max:255',
            'konten' => 'required',
            'kategori' => 'nullable|max:255',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'judul.required' => 'Judul wajib diisi',
            'konten.required' => 'Konten wajib diisi',
            'tanggal.required' => 'Tanggal wajib diisi',
            'tanggal.date' => 'Format tanggal tidak valid',
            'gambar.image' => 'File harus berupa gambar',
            'gambar.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'gambar.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Terdapat kesalahan pada input data!');
        }

        // Update slug jika judul berubah
        $slug = $berita->slug;
        if ($request->judul != $berita->judul) {
            $slug = Str::slug($request->judul);

            // Cek apakah slug sudah ada
            $slugCount = Berita::where('slug', 'LIKE', $slug . '%')
                ->where('id', '!=', $id)
                ->count();
            if ($slugCount > 0) {
                $slug = $slug . '-' . ($slugCount + 1);
            }
        }

        // Handle upload gambar baru
        $gambarName = $berita->gambar;
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($berita->gambar && file_exists(public_path('images/berita/' . $berita->gambar))) {
                unlink(public_path('images/berita/' . $berita->gambar));
            }

            // Upload gambar baru
            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . Str::slug(pathinfo($gambar->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('images/berita'), $gambarName);
        }

        // Update database
        $berita->update([
            'judul' => $request->judul,
            'slug' => $slug,
            'konten' => $request->konten,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
            'gambar' => $gambarName,
        ]);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Hapus berita
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        // Hapus gambar jika ada
        if ($berita->gambar && file_exists(public_path('images/berita/' . $berita->gambar))) {
            unlink(public_path('images/berita/' . $berita->gambar));
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus!');
    }
}
