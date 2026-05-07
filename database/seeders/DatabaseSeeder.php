<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama_lengkap' => 'Bos Konveksi',
            'username' => 'admin_konveksi', // Kita pakai username, bukan email
            'password' => Hash::make('rahasia123'),
        ]);
    }
}
