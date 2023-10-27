<?php

namespace Database\Seeders;

use App\Models\DetailOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        $detail = [
            [
                'list_id' => NULL,
                'opsi_pengiriman' => 'COD',
                'pembayaran' => 'Cash',
                'foto_pembayaran' => 'default.png',
                'no_rekening' => '5367246278',
            ]
        ];
        DetailOrder::query()->insert($detail);
    }
}
