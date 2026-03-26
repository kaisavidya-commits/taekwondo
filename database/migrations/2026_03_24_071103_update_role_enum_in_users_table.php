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
    DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('admin', 'super_admin', 'pembina', 'murid') DEFAULT 'murid'");
}

public function down()
{
    DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('admin', 'super_admin', 'pembina', 'siswa') DEFAULT 'siswa'");
}
};
