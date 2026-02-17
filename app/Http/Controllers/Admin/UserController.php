<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Menampilkan daftar semua pengguna admin.
     */
    public function index()
    {
        // Mengambil data user terbaru, diurutkan dari yang paling baru
        $users = User::latest()->paginate(10); 
        return view('admin.users.index', compact('users'));
    }

    /**
     * Menampilkan form untuk membuat admin baru.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Menyimpan admin baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            // Pesan error kustom
            'name.required' => 'Nama wajib diisi.',
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username ini sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal harus 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // Buat user baru dengan password yang di-hash
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.index')
                         ->with('success', 'Pengguna admin baru berhasil ditambahkan.');
    }

    /**
     * Menghapus admin dari database.
     */
    public function destroy(User $user)
    {
        if ($user->id == 1) {
            return redirect()->route('admin.users.index')
                             ->with('error', 'Admin utama (Super Admin) tidak dapat dihapus.');
        }

        if ($user->id == Auth::id()) {
            return redirect()->route('admin.users.index')
                             ->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }
        
        if (User::count() <= 1) {
             return redirect()->route('admin.users.index')
                             ->with('error', 'Tidak dapat menghapus admin terakhir.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
                         ->with('success', 'Pengguna admin berhasil dihapus.');
    }
}