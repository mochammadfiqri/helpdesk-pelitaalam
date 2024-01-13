<?php

namespace Database\Seeders;

use App\Models\Tickets;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TicketTruncateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Tickets::truncate();
        Schema::enableForeignKeyConstraints();
    }
}
