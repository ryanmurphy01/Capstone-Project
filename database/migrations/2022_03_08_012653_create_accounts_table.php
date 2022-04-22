<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            //new employee ID row
            $table->string('employee_id');
            $table->string('contact_number');
            $table->string('password');
            $table->string('personal_email');
            $table->string('school_email');
            $table->integer('num_of_courses');
            $table->foreignId('status_id')->constrained("account_status");
            $table->string('last_updated_availability');
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
