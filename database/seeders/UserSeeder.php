<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 8,
            'role' => 1,
            'nama' => 'Kemahasiswaan Polbeng',
            'username' => 'admin',
            'password' => Hash::make('admin123'), // Gantilah password sesuai kebutuhan
            'created_at' => Carbon::parse('2025-01-27 08:36:48'),
            'updated_at' => Carbon::parse('2025-02-02 17:40:05'),
            'email' => 'admin@polbeng.ac.id',
        ]);
    }
}
