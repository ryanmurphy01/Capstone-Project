<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherAvailabilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_availability', function (Blueprint $table) {
            $table->foreignId('account_id')->constrained();
            $table->foreignId('day_id')->constrained("days");
            $table->time('start_time');
            $table->time("end_time");
            $table->foreignId('semester_id')->constrained("semester");;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_availability');
    }
}
