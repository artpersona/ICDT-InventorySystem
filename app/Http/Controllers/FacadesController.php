<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Member;
use Redirect,Response,DB,Config;

class FacadesController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
      return view('facades.dashboard');
    }

    public function members(){
      $members = Member::all();
      return view('facades.members',compact('members'));
    }

    public function test(){
      $members = Member::all();
      return view('facades.test',compact('members'));
    }

    public function test2(){
      return view('facades.temp');
    }
}
