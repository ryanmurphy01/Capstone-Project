<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Account status
        DB::table('account_status')->insert([
            'status' => 'Active'
        ]);

        DB::table('account_status')->insert([
            'status' => 'Deactivated'
        ]);

        //User Types
        DB::table('user_types')->insert([
            'account_type' => 'Admin'
        ]);

        DB::table('user_types')->insert([
            'account_type' => 'Instructor'
        ]);

        //Days
        DB::table('days')->insert([
            'name' => 'Monday'
        ]);
        DB::table('days')->insert([
            'name' => 'Tuesday'
        ]);
        DB::table('days')->insert([
            'name' => 'Wednesday'
        ]);
        DB::table('days')->insert([
            'name' => 'Thursday'
        ]);
        DB::table('days')->insert([
            'name' => 'Friday'
        ]);
        DB::table('days')->insert([
            'name' => 'Saturday'
        ]);

        //Course_Status
        DB::table('course_status')->insert([
            'status' => 'Pending'
        ]);
        DB::table('course_status')->insert([
            'status' => 'Approved'
        ]);
        DB::table('course_status')->insert([
            'status' => 'Denied'
        ]);

        //Fake semester to start
        DB::table('semesters')->insert([
            'code' => '10000',
            'name' => 'Default 2022',
            'current_semester' => '1'
        ]);

        DB::table('accounts')->insert([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'password' => Hash::make('admin'),
            'personal_email' => 'admin@admin.com',
            'num_of_courses' => 0,
            'last_updated_availability'=> now(),
            'status_id' => 1,
        ]);

        DB::table('account_types')->insert([
            'account_id' => 1,
            'type_id' => 1,
        ]);

    }
}
