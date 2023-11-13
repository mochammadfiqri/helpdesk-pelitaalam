<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Type::truncate();
        $data = [
            'Hardware',
            'Software',
        ];

        foreach ($data as $value) {
            Type::create([
                'name' => $value
            ]);
        }
    }
}
