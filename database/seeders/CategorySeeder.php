<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category::truncate();
        $data = [
            'Internet',
            'Website',
            'Technical',
            'E-Learning',
            'Data Hilang',
            'Printer',
            'Password',
            'Proyektor',
            'Virus/Malware'
        ];

        foreach ($data as $value) {
            Category::create([
                'name' => $value
            ]);
        }
    }
}
