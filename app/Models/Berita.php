<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // tambahkan ini

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';
    protected $fillable = ['judul', 'slug', 'konten', 'gambar', 'kategori', 'tanggal'];

    // Slug otomatis saat berita dibuat
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($berita) {
            $berita->slug = Str::slug($berita->judul);

            $count = Berita::where('slug', 'like', "{$berita->slug}%")->count();
            if ($count > 0) {
                $berita->slug .= '-' . ($count + 1);
            }
        });
    }
}
