<?php

namespace App\Exports;

use App\Models\teacher_availabilities;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class availabilityExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $avails;

    //Headings for the columns
    public function headings(): array
    {
        return [
            'id',
            'Person',
            'Day',
            'StartTime',
            'EndTime',
            'Semester',
        ];
    }

    //Get data
    public function collection()
    {
        return teacher_availabilities::all();
    }

    //Display the rows you want
    public function map($avails): array
    {
        return [
        [
            $avails->day_id,
            $avails->start_time,
        ],
        [
            $avails->day_id,
            
        ],

        ];
    }
}


