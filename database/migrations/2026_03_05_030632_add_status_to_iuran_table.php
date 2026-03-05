<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('iuran', function (Blueprint $table) {
            $table->string('status')->default('Belum Bayar')->after('keterangan');
        });
    }
    
    public function down()
    {
        Schema::table('iuran', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
