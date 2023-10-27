<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            [
                'id' => 1,
                'nama_kategori' => 'Makanan',
                'gambar_kategori' => 'default.png'
            ],
            [
                'id' => 2,
                'nama_kategori' => 'Minuman',
                'gambar_kategori' => 'default.png'
            ],
            [
                'id' => 3,
                'nama_kategori' => 'Aksesoris',
                'gambar_kategori' => 'default.png'
            ],
            [
                'id' => 4,
                'nama_kategori' => 'Pakaian',
                'gambar_kategori' => 'default.png'
            ],
        ];
        kategori::query()->insert($kategori);
    }
}
