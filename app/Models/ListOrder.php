<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListOrder extends Model
{
    use HasFactory;
    protected $table = 'list_order';
    protected $fillable = [
        'user_id',
        'token',
        'user_order',
        'no_telepon',
        'jenis_kategori',
        'jenis_transaksi',
        'jumlah_order',
        'alamat_order',
        'harga_order',
        'status_order',
        'pesan_order'
    ];
}
