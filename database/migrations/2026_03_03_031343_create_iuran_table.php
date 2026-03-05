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
        Schema::create('iuran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_murid')->nullable(); // langsung nullable
            $table->string('unit');
            $table->decimal('harga', 10, 2)->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();

            // foreign key di dalam closure
            $table->foreign('id_murid')
                  ->references('id')
                  ->on('murid')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iuran');
    }
};