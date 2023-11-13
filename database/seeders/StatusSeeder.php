<?php

namespace Database\Seeders;

use App\Models\Statuses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Statuses::truncate();
        $data = [
            'Closed',
            'Completed',
            'Delay Processing',
            'Pending',
            'Processing',
            'Waiting for Confirmation',
        ];

        foreach ($data as $value) {
            Statuses::create([
                'name' => $value
            ]);
        }
    }
}
