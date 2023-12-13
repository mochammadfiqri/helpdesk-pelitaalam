<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\DatasetTickets;
use App\Models\Department;
use App\Models\Priorities;
use App\Models\Type;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DatasetTicketImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $department = Department::where('name', $row['department'])->first();
            $priority = Priorities::where('name', $row['priority'])->first();
            $type = Type::where('name', $row['type'])->first();
            $category = Category::where('name', $row['category'])->first();
 
            if ($department != null && $priority != null && $type != null && $category != null) {
                DatasetTickets::create([
                    'subject' => $row['subject'],
                    'details' => $row['details'],
                    'department_id' => $department['id'],
                    'priority_id' => $priority['id'],
                    'type_id' => $type['id'],
                    'category_id' => $category['id'],
                ]);
            }
        }
    }
}