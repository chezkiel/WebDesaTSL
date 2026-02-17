<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Infografis;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin.
     * Ini mengambil data pemantauan utama.
     */
    public function index()
    {
        $infografis = Infografis::first();

        $beritaTerbaru = Berita::orderBy('tanggal', 'desc')->take(5)->get();

        $stats = [
            'total_berita' => Berita::count(),
            'total_admin' => User::count(),
        ];

        return view('admin.dashboard', compact('stats', 'beritaTerbaru', 'infografis'));
    }
}

