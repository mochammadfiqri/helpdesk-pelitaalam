<?php

namespace Database\Seeders;

use App\Models\KnowledgeBase;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class KnowledgeBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        KnowledgeBase::truncate();
        Schema::enableForeignKeyConstraints();

        KnowledgeBase::factory(50)->create();
    }

}
