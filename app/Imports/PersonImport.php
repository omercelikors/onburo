<?php

namespace App\Imports;

use App\Person;
use Maatwebsite\Excel\Concerns\ToModel;

class PersonImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row[14] == 'full_name') {
            return null;
        }

        return new Person([
            'name' => $row[14],
            'surname' => '-',
            'status' => 'Aday Öğrenci',
            'registration_by' => 'sistem',
            'register_status' => 'ara',
            'e_mail'    => $row[13],
            'telephone' => $row[15],
            'demanded_education_status' => $row[12],
            'platform' => $row[11],

        ]);

    }

    public function startRow(): int
    {
        return 2;
    }
}
