<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Priorities;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Priorities::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name' => 'Low', 'resolve_time' => 4, 'response_time' => 8],
            ['name' => 'Normal', 'resolve_time' => 3, 'response_time' => 6],
            ['name' => 'High', 'resolve_time' => 2, 'response_time' => 4],
            ['name' => 'Critical', 'resolve_time' => 1, 'response_time' => 2],
        ];

        foreach ($data as $value) {
            // $resolveTime = Carbon::now()->addDays($value['resolve_time']);
            // $responseTime = Carbon::now()->addHours($value['response_time']);
            
            Priorities::create($value);
        }
    }
}
