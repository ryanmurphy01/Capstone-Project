<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_courses', function (Blueprint $table) {

            $table->uuid('account_id')->constrained('accounts')->primary();
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->foreignId('status_id')->constrained('course_status');
            //new row to track semester in course selection records
            $table->foreignId('semester_id')->constrained('semesters');
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
        Schema::dropIfExists('teacher_course');
    }
}
