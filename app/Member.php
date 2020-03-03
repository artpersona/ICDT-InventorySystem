<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
  public $incrementing = false;
  protected $primaryKey = 'student_id';
  public $timestamps = false;
  protected $fillable = [
    'student_id','student_position','student_fname',
    'student_lname','student_gender','student_joinDate',
    'student_birthdate','student_program','student_course',
    'student_year','student_address','student_guardian',
    'student_guardianRelationship','student_guardianContactNumber','student_status'
  ];


}
