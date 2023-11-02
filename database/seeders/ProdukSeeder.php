<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produk = [
            [
                'id' => 1,
                'kategori_id' => 1,
                'gambar_produk' => 'default2.png',
                'nama_produk' => 'Pizza',
                'deskripsi_produk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, debitis illum. Impedit nemo provident culpa ipsum veritatis quaerat nisi quibusdam ex, earum hic deserunt, labore illum perspiciatis architecto consectetur quam?',
                'stok_produk' => 100,
                'harga_produk' => 50000,
            ],
            [
                'id' => 2,
                'kategori_id' => 1,
                'gambar_produk' => 'default2.png',
                'nama_produk' => 'Roti Tawar',
                'deskripsi_produk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, debitis illum. Impedit nemo provident culpa ipsum veritatis quaerat nisi quibusdam ex, earum hic deserunt, labore illum perspiciatis architecto consectetur quam?',
                'stok_produk' => 100,
                'harga_produk' => 10000,
            ],
            [
                'id' => 3,
                'kategori_id' => 1,
                'gambar_produk' => 'default.png',
                'nama_produk' => 'Mie Ayam',
                'deskripsi_produk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, debitis illum. Impedit nemo provident culpa ipsum veritatis quaerat nisi quibusdam ex, earum hic deserunt, labore illum perspiciatis architecto consectetur quam?',
                'stok_produk' => 100,
                'harga_produk' => 20000,
            ],
            [
                'id' => 4,
                'kategori_id' => 1,
                'gambar_produk' => 'default.png',
                'nama_produk' => 'Burger',
                'deskripsi_produk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, debitis illum. Impedit nemo provident culpa ipsum veritatis quaerat nisi quibusdam ex, earum hic deserunt, labore illum perspiciatis architecto consectetur quam?',
                'stok_produk' => 100,
                'harga_produk' => 50000,
            ],
            [
                'id' => 5,
                'kategori_id' => 1,
                'gambar_produk' => 'default.png',
                'nama_produk' => 'Mie Goreng',
                'deskripsi_produk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, debitis illum. Impedit nemo provident culpa ipsum veritatis quaerat nisi quibusdam ex, earum hic deserunt, labore illum perspiciatis architecto consectetur quam?',
                'stok_produk' => 100,
                'harga_produk' => 40000,
            ],
            [
                'id' => 6,
                'kategori_id' => 1,
                'gambar_produk' => 'default.png',
                'nama_produk' => 'Bakso',
                'deskripsi_produk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, debitis illum. Impedit nemo provident culpa ipsum veritatis quaerat nisi quibusdam ex, earum hic deserunt, labore illum perspiciatis architecto consectetur quam?',
                'stok_produk' => 100,
                'harga_produk' => 35000,
            ],
            [
                'id' => 7,
                'kategori_id' => 1,
                'gambar_produk' => 'default.png',
                'nama_produk' => 'Mie Rebus',
                'deskripsi_produk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, debitis illum. Impedit nemo provident culpa ipsum veritatis quaerat nisi quibusdam ex, earum hic deserunt, labore illum perspiciatis architecto consectetur quam?',
                'stok_produk' => 100,
                'harga_produk' => 35000,
            ],
            [
                'id' => 8,
                'kategori_id' => 1,
                'gambar_produk' => 'default.png',
                'nama_produk' => 'Nasi Goreng',
                'deskripsi_produk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, debitis illum. Impedit nemo provident culpa ipsum veritatis quaerat nisi quibusdam ex, earum hic deserunt, labore illum perspiciatis architecto consectetur quam?',
                'stok_produk' => 100,
                'harga_produk' => 40000,
            ],
            [
                'id' => 9,
                'kategori_id' => 1,
                'gambar_produk' => 'default.png',
                'nama_produk' => 'Nasi Uduk',
                'deskripsi_produk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, debitis illum. Impedit nemo provident culpa ipsum veritatis quaerat nisi quibusdam ex, earum hic deserunt, labore illum perspiciatis architecto consectetur quam?',
                'stok_produk' => 100,
                'harga_produk' => 35000,
            ],
            [
                'id' => 10,
                'kategori_id' => 1,
                'gambar_produk' => 'default2.png',
                'nama_produk' => 'Nasi Padang',
                'deskripsi_produk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, debitis illum. Impedit nemo provident culpa ipsum veritatis quaerat nisi quibusdam ex, earum hic deserunt, labore illum perspiciatis architecto consectetur quam?',
                'stok_produk' => 100,
                'harga_produk' => 35000,
            ],
            [
                'id' => 11,
                'kategori_id' => 2,
                'gambar_produk' => 'default2.png',
                'nama_produk' => 'Jus Alpukat',
                'deskripsi_produk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, debitis illum. Impedit nemo provident culpa ipsum veritatis quaerat nisi quibusdam ex, earum hic deserunt, labore illum perspiciatis architecto consectetur quam?',
                'stok_produk' => 100,
                'harga_produk' => 50000,
            ],
            [
                'id' => 12,
                'kategori_id' => 2,
                'gambar_produk' => 'default2.png',
                'nama_produk' => 'Jus Jeruk',
                'deskripsi_produk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, debitis illum. Impedit nemo provident culpa ipsum veritatis quaerat nisi quibusdam ex, earum hic deserunt, labore illum perspiciatis architecto consectetur quam?',
                'stok_produk' => 100,
                'harga_produk' => 40000,
            ],
            [
                'id' => 13,
                'kategori_id' => 2,
                'gambar_produk' => 'default2.png',
                'nama_produk' => 'Jus Strawberry',
                'deskripsi_produk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, debitis illum. Impedit nemo provident culpa ipsum veritatis quaerat nisi quibusdam ex, earum hic deserunt, labore illum perspiciatis architecto consectetur quam?',
                'stok_produk' => 100,
                'harga_produk' => 35000,
            ],
            [
                'id' => 14,
                'kategori_id' => 3,
                'gambar_produk' => 'default2.png',
                'nama_produk' => 'Jam Tangan',
                'deskripsi_produk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, debitis illum. Impedit nemo provident culpa ipsum veritatis quaerat nisi quibusdam ex, earum hic deserunt, labore illum perspiciatis architecto consectetur quam?',
                'stok_produk' => 100,
                'harga_produk' => 150000,
            ],
            [
                'id' => 15,
                'kategori_id' => 3,
                'gambar_produk' => 'default2.png',
                'nama_produk' => 'Gelang',
                'deskripsi_produk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, debitis illum. Impedit nemo provident culpa ipsum veritatis quaerat nisi quibusdam ex, earum hic deserunt, labore illum perspiciatis architecto consectetur quam?',
                'stok_produk' => 100,
                'harga_produk' => 200000,
            ],
            [
                'id' => 16,
                'kategori_id' => 3,
                'gambar_produk' => 'default2.png',
                'nama_produk' => 'Topi',
                'deskripsi_produk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, debitis illum. Impedit nemo provident culpa ipsum veritatis quaerat nisi quibusdam ex, earum hic deserunt, labore illum perspiciatis architecto consectetur quam?',
                'stok_produk' => 100,
                'harga_produk' => 90000,
            ],
            [
                'id' => 17,
                'kategori_id' => 4,
                'gambar_produk' => 'default2.png',
                'nama_produk' => 'Baju Casual',
                'deskripsi_produk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, debitis illum. Impedit nemo provident culpa ipsum veritatis quaerat nisi quibusdam ex, earum hic deserunt, labore illum perspiciatis architecto consectetur quam?',
                'stok_produk' => 100,
                'harga_produk' => 90000,
            ],
            [
                'id' => 18,
                'kategori_id' => 4,
                'gambar_produk' => 'default2.png',
                'nama_produk' => 'Baju Formal',
                'deskripsi_produk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, debitis illum. Impedit nemo provident culpa ipsum veritatis quaerat nisi quibusdam ex, earum hic deserunt, labore illum perspiciatis architecto consectetur quam?',
                'stok_produk' => 100,
                'harga_produk' => 80000,
            ],
            [
                'id' => 19,
                'kategori_id' => 4,
                'gambar_produk' => 'default2.png',
                'nama_produk' => 'Kaos Polos',
                'deskripsi_produk' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, debitis illum. Impedit nemo provident culpa ipsum veritatis quaerat nisi quibusdam ex, earum hic deserunt, labore illum perspiciatis architecto consectetur quam?',
                'stok_produk' => 100,
                'harga_produk' => 80000,
            ],
        ];
        produk::query()->insert($produk);
    }
}
