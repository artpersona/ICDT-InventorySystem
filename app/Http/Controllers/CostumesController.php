<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Costume;
use App\Type;
class CostumesController extends Controller
{
    public function index(){
      $costumes = Costume::all();
      $types = Type::all();
      return view('costumes.index',compact('types','costumes'));
    }

    public function addType(Request $request){
      $toProcess = explode("|",$request->type_category);
      $temp = array();
      for($i=0;$i<sizeof($toProcess)-1;$i++){
        $category = $toProcess[$i];
        $type = new Type;
        $type-> type_prefix =  $request->type_prefix.$category[0];
        $type-> type_name = $request->type_name;
        $type-> type_category =$category;
        array_push($temp,$type);
        $type->save();
      }

      return response()->json($temp);
    }

    public function addCostume(Request $request){

      $type = Type::where('type_name','=',$request->costume_name)->where('type_category','=',$request->costume_category)->get();
      $costumes = Costume::where('costume_name','=',$request->costume_name)->where('costume_category','=',$request->costume_category)->get();
      $iterator = sizeof($costumes)+1;
      $num = (int)$request->costume_quantity;
      $res = array();
      for($i=0; $i<$num;$i++){
          $costume = new Costume;
          $costume-> costume_id = $type[0]->type_prefix."".$iterator;
          $costume-> costume_prefix = $type[0]->type_prefix;
          $costume-> costume_name = $request->costume_name;
          $costume-> costume_category = $request->costume_category;
          $costume-> costume_status = "Available";
          $costume->save();
          array_push($res,$costume);
        $iterator++;
      }
      return response()->json($res);
    }

    public function deleteCostume(Request $request){
      $costume = Costume::find($request->costume_id);
      $costume->delete();
      return response()->json($costume);
    }

    public function getCount(Request $request){
      $costumes = Costume::where('costume_prefix','=',$request->type_prefix)->get();
      $size = sizeof($costumes);
      return response()->json($size);
    }

    public function deleteType(Request $request){
      $costumes = Costume::where('costume_prefix','=',$request->type_prefix)->get();
      $test = "";
      for($i=0;$i<sizeof($costumes);$i++){
        $code = $costumes[$i]->costume_id;
        $costume = Costume::find($code);
        $costume->delete();
      }
      $type = Type::find($request->type_id);
      $type->delete();
      return response()->json($costumes);
    }



    public function borrow(){
      $costumes = Costume::all();
      return view('costumes.borrow',compact('costumes'));
    }


}
