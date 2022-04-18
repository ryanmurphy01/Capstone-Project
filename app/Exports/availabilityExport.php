<?php

namespace App\Exports;

use App\Models\teacher_availabilities;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\DB;


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
            'First Name',
            'Last Name',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Semester',
        ];
    }

    //Get data
    public function collection()
    {
        $data2 = DB::table('semesters')->latest ('created_at')->first();

        $sortedData = collect();
        $data = DB::table ('accounts')
        ->join('account_types', 'accounts.id', '=', 'account_types.account_id')
        ->where("accounts.status_id", 1)
        ->where('account_types.type_id', 2)
        ->get();

        //DD($data);
        

        foreach($data as $teacher){
            $monday = DB::table('teacher_availabilities')
                ->join('accounts', 'teacher_availabilities.account_id', '=', 'accounts.id')
                ->join('semesters', 'teacher_availabilities.semester_id', '=', 'semesters.id')
                ->where('teacher_availabilities.day_id', 1)
                ->where('teacher_availabilities.semester_id', '=', $data2->id)
                ->where('accounts.id', $teacher->id)
                ->get(['teacher_availabilities.start_time', 'teacher_availabilities.end_time']);

                $tuesday = DB::table('teacher_availabilities')
                ->join('accounts', 'teacher_availabilities.account_id', '=', 'accounts.id')
                ->join('semesters', 'teacher_availabilities.semester_id', '=', 'semesters.id')
                ->where('teacher_availabilities.day_id', 2)
                ->where('teacher_availabilities.semester_id', '=', $data2->id)
                ->where('accounts.id', $teacher->id)
                ->get(['teacher_availabilities.start_time', 'teacher_availabilities.end_time']);

                $wednesday = DB::table('teacher_availabilities')
                ->join('accounts', 'teacher_availabilities.account_id', '=', 'accounts.id')
                ->join('semesters', 'teacher_availabilities.semester_id', '=', 'semesters.id')
                ->where('teacher_availabilities.day_id', 3)
                ->where('teacher_availabilities.semester_id', '=', $data2->id)
                ->where('accounts.id', $teacher->id)
                ->get(['teacher_availabilities.start_time', 'teacher_availabilities.end_time']);
    
                $teacher_courses = [$teacher, $monday, $tuesday, $wednesday];

            $sortedData->push($teacher_courses);


        }


        return $sortedData;

        


      

    }

    //Display the rows you want
    public function map($avails): array
    {

        return [
    
            $avails[0]->first_name,
            $avails[0]->last_name,
            $avails[1],
            $avails[2],
            $avails[3]
            
           
        
        ];
    }
}


