<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();
        
        $user = User::create([
            'nama' => 'Mochammad Fiqri',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'no_hp' => '085237742424',
            // 'domisili' => 'Kota Bekasi',
            // 'alamat' => 'Jl. cempaka',
            // 'role_id' => '1',
        ]);
        $user->roles()->attach(1);
    }
}
