<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'Administrator',
            'Kepala Sekolah',
            'Wakil Kepala Sekolah',
            'Kurikulum',
            'Kesiswaan',
            'Sarpras',
            'Humas',
            'Tata Usaha',
            'Wali Kelas',
            'Guru BK',
            'Pustakawan Sekolah',
            'Kepala Laboratorium',
            'Guru',
            'Siswa',
        ];

        foreach ($data as $value) {
            Role::insert([
                'name' => $value
            ]);
        }
    }
}
