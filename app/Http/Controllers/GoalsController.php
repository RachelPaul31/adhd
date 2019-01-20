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
    public function new(){
        return view('goals.create');
    }
    public function create(Request $request){
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
            'complete_by' => 'required',
        ]);

        $user = auth()->user();
        $goal = new Goal();
            
            $goal->user_id = $user->id;
            $goal->name = $request['title'];
            $goal->body = $request['body'];
            $goal->complete_by = $request['complete_by'];
        
        if($goal->save()){
            return redirect ('/goals');
        } else{
            return redirect ('/goals/new')->with(["error" => "Goal not created please try again"]);
        };
    }

    public function complete(Request $request)
    {
        $id = $request->goal;
        if($request->complete){
            $complete = Goal::where('id', $id)->update(['complete' => 0]);
        }else{
            $complete = Goal::where('id', $id)->update(['complete' => 1]);
        }

        if($complete){
            return back()->with(["status" => "Successfully marked as complete."]);
        } else{
            return back()->withErrors("An error occurred please try again");
        };
    }

    public function delete(Request $request)
    {
        $id = $request->goal;
        $delete = Goal::where('id', $id)->update(['active' => 0]);

        if($delete){
            return back()->with(["status" => "Successfully removed goal."]);
        } else{
            return back()->withErrors("An error occurred please try again");
        };
    }

}
