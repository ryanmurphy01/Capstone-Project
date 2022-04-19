<?php

namespace App\Imports;

use App\Models\program;
use Maatwebsite\Excel\Concerns\ToModel;

class ProgramsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new program([
            //
        ]);
    }
}
