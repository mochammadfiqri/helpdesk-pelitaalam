<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Department::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'Admin',
            'Keuangan',
            'Akademik',
            'Staff TU',
            'Operator',
            'Kesiswaan',
            'Kepala Sekolah',
            'Wakil Kepala Sekolah',
            'Wali Kelas',
            'Guru',
        ];

        foreach ($data as $value) {
            Department::create([
                'name' => $value
            ]);
        }
    }
}
