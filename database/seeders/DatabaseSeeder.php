<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Seeders\IuranMasterSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Optional: buat user default
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // 🔥 INI WAJIB BIAR IURAN MASTER KEISI
        $this->call(IuranMasterSeeder::class);
    }
}