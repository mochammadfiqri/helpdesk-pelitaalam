<?php

namespace App\Imports;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {        
        foreach ($rows as $row) {
            $role_id = Role::where('name', $row['role'])->first();

            $user = User::create([
                'nama' => $row['nama'],
                'email' => $row['email'],
                'password' => Hash::make($row['password']),
                'no_hp' => $row['no_hp'],
            ]);
            $user->roles()->attach($role_id['id']);

        }
    }
}
