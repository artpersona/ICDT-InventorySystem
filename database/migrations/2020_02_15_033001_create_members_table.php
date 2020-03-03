<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigInteger('student_id');
            $table->string('student_position',30);
            $table->string('student_fname',30);
            $table->string('student_lname',30);
            $table->string('student_gender',6);
            $table->date('student_joinDate');
            $table->date('student_birthdate');
            $table->string('student_program',10);
            $table->string('student_course',30);
            $table->string('student_year',4);
            $table->string('student_address',50);
            $table->string('student_guardian',30);
            $table->string('student_guardianRelationship',15);
            $table->string('student_guardianContactNumber',13);
            $table->string('student_status',10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
