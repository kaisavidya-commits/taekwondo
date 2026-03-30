<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pendaftar', function (Blueprint $table) {
            $table->text('alasan_ditolak')->nullable()->after('status');
            $table->timestamp('diproses_pada')->nullable()->after('alasan_ditolak');
            $table->unsignedBigInteger('diproses_oleh')->nullable()->after('diproses_pada');
        });
    }

    public function down()
    {
        Schema::table('pendaftar', function (Blueprint $table) {
            $table->dropColumn(['alasan_ditolak', 'diproses_pada', 'diproses_oleh']);
        });
    }
};