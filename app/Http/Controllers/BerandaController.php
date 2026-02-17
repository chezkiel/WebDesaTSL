<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class BerandaController extends Controller
{
    public function index()
    {
        // Ambil 3 berita terbaru dari database
        $beritaTerbaru = Berita::orderBy('tanggal', 'desc')->take(3)->get();

        // Kirim ke view 'pages.beranda'
        return view('pages.beranda', compact('beritaTerbaru'));
    }
}