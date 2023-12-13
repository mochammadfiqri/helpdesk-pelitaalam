<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Type::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'Hardware',
            'Software',
            'Jaringan Internet',
            'Masalah Aplikasi',
            'Masalah Akun',
            'Keamanan Informasi',
        ];

        foreach ($data as $value) {
            Type::create([
                'name' => $value
            ]);
        }
    }
}
