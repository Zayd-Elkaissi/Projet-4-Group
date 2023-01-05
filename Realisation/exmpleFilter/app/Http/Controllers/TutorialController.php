<?php

namespace App\Http\Controllers;

use App\Models\tache;
use App\Models\User;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query()->paginate(3);
        if($request->ajax()){
            $users = User::query()
                        ->when($request->seach_term, function($q)use($request){
                            $q->where('id', 'like', '%'.$request->seach_term.'%')
                            ->orWhere('name', 'like', '%'.$request->seach_term.'%')
                            ->orWhere('email', 'like', '%'.$request->seach_term.'%');
                        })
                        ->when($request->status, function($q)use($request){
                            $q->where('status',$request->status);
                        })
                        ->paginate(3);
            return view('pagination_child', compact('users'))->render();
        }
        return view('welcome',compact('users'));
    }
}
