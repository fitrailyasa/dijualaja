<?php

namespace Database\Seeders;

use App\Models\ListOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [
            [
                'user_id' => 3,
                'token' => 'ord1736',
                'user_order' => 'Andi',
                'no_telepon' => '08482711123',
                'jenis_kategori' => 'Makanan',
                'jenis_transaksi' => 'Pemasukan',
                'jumlah_order' => 3,
                'alamat_order' => 'Lampung',
                'harga_order' => 30000,
                'status_order' => 'Menunggu Konfirmasi',
                'pesan_order' => 'Pesan yg warna hijau'
            ]
        ];
        ListOrder::query()->insert($list);
        
    }
}
