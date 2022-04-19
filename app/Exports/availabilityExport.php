<?php

namespace App\Exports;

use App\Models\account;
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
            'User Id',
            'First Name',
            'Last Name',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday'
        ];
    }

    //Get data
    public function collection()
    {
        $data2 = DB::table('semesters')
        ->where('semesters.current_semester', 1)
        ->get()->first();

        $sortedData = collect();
        $data = DB::table ('accounts')
        ->join('account_types', 'accounts.id', '=', 'account_types.account_id')
        ->where("accounts.status_id", 1)
        ->where('account_types.type_id', 2)
        ->get();

        //DD($data);



        foreach($data as $teacher){
            $sortedData->push($teacher);
        }


        return $sortedData;
        //return account::with('days')->get();

    }


    //Display the rows you want
    public function map($avails): array
    {
        $data2 = DB::table('semesters')
        ->where('semesters.current_semester', 1)
        ->get()->first();

        $monday = DB::table('teacher_availabilities')
        ->join('accounts', 'teacher_availabilities.account_id', '=', 'accounts.id')
        ->join('semesters', 'teacher_availabilities.semester_id', '=', 'semesters.id')
        ->where('teacher_availabilities.day_id', 1)
        ->where('teacher_availabilities.semester_id', '=', $data2->id)
        ->where('accounts.id', $avails->id)
        ->orderBy('teacher_availabilities.start_time', 'asc')
        ->get(['teacher_availabilities.start_time', 'teacher_availabilities.end_time']);
        /*$monday->each(function($item, $key) {
            //dd($item);
            return $item->start_time . " " . $item->end_time;
        });*/
        

        $MondayStr = "";
        foreach($monday->toArray() as $temp) {
            $MondayStr .= "$temp->start_time - $temp->end_time ";
        }
        //dd($str);

        

        $tuesday = DB::table('teacher_availabilities')
        ->join('accounts', 'teacher_availabilities.account_id', '=', 'accounts.id')
        ->join('semesters', 'teacher_availabilities.semester_id', '=', 'semesters.id')
        ->where('teacher_availabilities.day_id', 2)
        ->where('teacher_availabilities.semester_id', '=', $data2->id)
        ->where('accounts.id', $avails->id)
        ->orderBy('teacher_availabilities.start_time', 'asc')
        ->get(['teacher_availabilities.start_time', 'teacher_availabilities.end_time']);

        $wednesday = DB::table('teacher_availabilities')
        ->join('accounts', 'teacher_availabilities.account_id', '=', 'accounts.id')
        ->join('semesters', 'teacher_availabilities.semester_id', '=', 'semesters.id')
        ->where('teacher_availabilities.day_id', 3)
        ->where('teacher_availabilities.semester_id', '=', $data2->id)
        ->where('accounts.id', $avails->id)
        ->orderBy('teacher_availabilities.start_time', 'asc')
        ->get(['teacher_availabilities.start_time', 'teacher_availabilities.end_time']);

        $thursday = DB::table('teacher_availabilities')
        ->join('accounts', 'teacher_availabilities.account_id', '=', 'accounts.id')
        ->join('semesters', 'teacher_availabilities.semester_id', '=', 'semesters.id')
        ->where('teacher_availabilities.day_id', 4)
        ->where('teacher_availabilities.semester_id', '=', $data2->id)
        ->where('accounts.id', $avails->id)
        ->orderBy('teacher_availabilities.start_time', 'asc')
        ->get(['teacher_availabilities.start_time', 'teacher_availabilities.end_time']);

        $friday = DB::table('teacher_availabilities')
        ->join('accounts', 'teacher_availabilities.account_id', '=', 'accounts.id')
        ->join('semesters', 'teacher_availabilities.semester_id', '=', 'semesters.id')
        ->where('teacher_availabilities.day_id', 5)
        ->where('teacher_availabilities.semester_id', '=', $data2->id)
        ->where('accounts.id', $avails->id)
        ->orderBy('teacher_availabilities.start_time', 'asc')
        ->get(['teacher_availabilities.start_time', 'teacher_availabilities.end_time']);

        $saturday = DB::table('teacher_availabilities')
        ->join('accounts', 'teacher_availabilities.account_id', '=', 'accounts.id')
        ->join('semesters', 'teacher_availabilities.semester_id', '=', 'semesters.id')
        ->where('teacher_availabilities.day_id', 6)
        ->where('teacher_availabilities.semester_id', '=', $data2->id)
        ->where('accounts.id', $avails->id)
        ->orderBy('teacher_availabilities.start_time', 'asc')
        ->get(['teacher_availabilities.start_time', 'teacher_availabilities.end_time']);



        return [
            $avails->employee_id,
            $avails->first_name,
            $avails->last_name,
            $MondayStr,
            $tuesday,
            $wednesday,
            $thursday,
            $friday,
            $saturday


        ];


    }
}


