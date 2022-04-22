<?php

namespace App\Imports;

use App\Models\account;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class UserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new account([
            'last_name' => $row[0],
            'first_name' => $row[1],
            'personal_email' => $row[3],
            'password' => Hash::make( Str::random(10)),
            'num_of_courses' => 0,
            'last_updated_availability'=> now(),
            'status_id' => 1,
        ]);

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'personal_email'=>$row[3],
            'token'=>$token,
            'created_at'=>Carbon::now(),
        ]);

        $action_link = route('reset.password.form', ['token'=>$token, 'personal_email'=>$row[3]]);
        $body = "Welcome! You have been registered for the Zekelman School of Business & Information Technology Part Time Availability Portal
        With the account email: ".$row[3]."
        Please click the link below to reset password and login for the first time.";

        $personalemail = $row[3];

        Mail::send('email-forgot', ['action_link'=>$action_link,'body'=>$body], function($message) use ($personalemail){
            $message->from('parttimeteststclair@gmail.com','St.Clair Collge Part Time Portal');
            $message->to($personalemail, 'name')
            ->subject('Welcome To Part Time Availability Portal');
        });
    }
}
