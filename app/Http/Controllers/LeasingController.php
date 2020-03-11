<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Costume;
use Carbon\Carbon;
class LeasingController extends Controller
{
    public function startSession(Request $request){
        $member = Member::find($request->student_id);
        return response()->json($member);
    }

    public function tempAdd(Request $request){
        $costume = Costume::find($request->costume_id);
        $value = "";
        if($costume->costume_status=="Borrowed" && $costume->costume_borowee == $request->student_id){
            $value = "1";
        }
        elseif($costume->costume_status=="Borrowed" && $costume->costume_borowee != $request->student_id){
            $value = "2";
        }
        else{
            $costume->costume_status = "Borrowed";
            $costume->costume_borowee = $request->student_id;
            $costume->save();
            return response()->json($costume);
        }
        return response()->json($value);
    }

    public function tempRemove(Request $request){
        $costume = Costume::find($request->costume_id);
        $costume->costume_status = "Available";
        $costume->save();
        return response()->json($request);
    }
}
