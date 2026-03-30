<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tagihan', function (Blueprint $table) {
            $table->id();

            // SESUAIKAN DENGAN DB KAMU (SIGNED INT)
            $table->integer('id_murid');

            // iuran pakai bigint
            $table->unsignedBigInteger('id_iuran');

            $table->string('bulan');
            $table->decimal('harga', 10, 2)->nullable();
            $table->enum('status', ['belum bayar', 'lunas'])->default('belum bayar');

            $table->timestamps();

            // RELASI
            $table->foreign('id_murid')
                  ->references('id_murid')
                  ->on('murid')
                  ->onDelete('cascade');

            $table->foreign('id_iuran')
                  ->references('id')
                  ->on('iuran_master')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tagihan');
    }
};