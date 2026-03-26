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
    Schema::table('pendaftar', function (Blueprint $table) {
        $table->string('email', 100)->unique()->after('nama');
    });
}

public function down()
{
    Schema::table('pendaftar', function (Blueprint $table) {
        $table->dropColumn('email');
    });
}
};
