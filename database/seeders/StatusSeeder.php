<?php

namespace Database\Seeders;

use App\Models\Statuses;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Statuses::truncate();
        Schema::enableForeignKeyConstraints();
        
        $data = [
            'Open',
            'In Progress',
            'Closed',
            'Rejected',
            'Canceled',
        ];

        foreach ($data as $value) {
            Statuses::create([
                'name' => $value
            ]);
        }
    }
}
