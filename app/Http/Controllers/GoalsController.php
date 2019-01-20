<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goal;
use Carbon\Carbon;

class GoalsController extends Controller
{
    public function all(Request $request){
        if($request->sort == NULL){
            $sort = 'name';
        }else{
            $sort = $request->sort;
        }


        $goals = Goal::where("user_id", "=", auth()->user()->id)->where("active", "=", 1)->orderBy($sort, 'ASC')->get();
        return view('goals.all', compact(['goals']));
    }

}
