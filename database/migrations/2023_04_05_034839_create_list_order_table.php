<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('list_order', function (Blueprint $table) {
            $table->id();
            $table->string('token')->nullable()->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('user_order')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('produk')->nullable();
            $table->string('jenis_transaksi')->default("pemasukan");
            $table->integer('jumlah_order')->nullable();
            $table->string('alamat_order')->nullable();
            $table->integer('harga_order')->nullable();
            $table->string('status_order');
            $table->text('pesan_order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_order');
    }
};
