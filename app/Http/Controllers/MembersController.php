<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;



class MembersController extends Controller
{
    public function addMember(Request $request){

        $member = new Member;
        $member->student_id = $request->student_id;
        $member->student_position = $request->student_position;
        $member->student_fname = $request->student_fname;
        $member->student_lname = $request->student_lname;
        $member->student_birthdate = $request->student_birthdate;
        $member->student_joinDate = $request->student_birthdate;
        $member->student_gender = $request->student_gender;
        $member->student_program = $request->student_program;
        $member->student_course = $request->student_course;
        $member->student_year = $request->student_year;
        $member->student_address = $request->student_address;
        $member->student_guardian = $request->student_guardian;
        $member->student_guardianRelationship = $request->student_guardianRelationship;
        $member->student_guardianContactNumber = $request->student_guardianContactNumber;
        $member->student_status = "Active";
        $member->save();
        return response()->json($request);


    }

    public function editMember(Request $request){
      $member = Member::find($request->student_id);
      $member->student_position = $request->student_position;
      $member->student_fname = $request->student_fname;
      $member->student_lname = $request->student_lname;
      $member->student_gender = $request->student_gender;
      $member->student_age = $request->student_age;
      $member->student_religion = $request->student_religion;
      $member->student_program = $request->student_program;
      $member->student_course = $request->student_course;
      $member->student_year = $request->student_year;
      $member->student_address = $request->student_address;
      $member->student_guardian = $request->student_guardian;
      $member->student_guardianRelationship = $request->student_guardianRelationship;
      $member->student_guardianContactNumber = $request->student_guardianContactNumber;
      $member->save();
      return response()->json($request);

    }

    public function deactivate(Request $request){
      $member = Member::find($request->student_id);
      $member->student_status = "Inactive";
      $member->save();
      return response()->json($request);
    }

    public function activate(Request $request){
      $member = Member::find($request->student_id);
      $member->student_status = "Active";
      $member->save();
      return response()->json($request);
    }

    public function showProfile($student_id){
      $member = Member::where('student_id','=',$student_id)->first();
      return view('members.profile',compact('member'));
    }
}
