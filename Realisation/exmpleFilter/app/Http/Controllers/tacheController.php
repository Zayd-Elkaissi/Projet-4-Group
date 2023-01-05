<?php

namespace App\Http\Controllers;

use App\Models\tache;
use Illuminate\Http\Request;

class tacheController extends Controller
{
   public function index(){
        $tache=tache::paginate(5);
        return view('pagination_parent',compact('tache'));
    }
    public function fetch(Request $request){
        if($request->ajax()){
          $tache=  tache::paginate(5);
          return view('pagination_child',compact('tache'))->render();
        }
    }
}
