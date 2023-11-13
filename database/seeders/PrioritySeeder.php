<?php

namespace Database\Seeders;

use App\Models\Priorities;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Priorities::truncate();
        $data = [
            'Generally',
            'Less Urgent',
            'Urgent',
            'Very Urgent',
        ];

        foreach ($data as $value) {
            Priorities::insert([
                'name' => $value
            ]);
        }
    }
}
