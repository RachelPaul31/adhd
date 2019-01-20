<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssessTopics;
use App\Responses;

class AssessController extends Controller
{
    public function assess(Request $request){
        $usertopics = Assesstopics::where("user_id", "=", auth()->user()->id)->get();

        return view('selfassess', compact('usertopics'));
    }

    public function store(Request $request){
        $user = auth()->user();
        
        $response = new Responses();
            
            $response->user_id = $user->id;
            $response->topic_id = $request->topic;
            $response->answer = $request->option;
        
        if($response->save()){
            return redirect ('/assess');
        } else{
            return redirect ('/assess')->with(["error" => "Response not saved, please try again"]);
        };
    }
    public function create(Request $request){
        $topic = new AssessTopics();

            $topic->user_id = auth()->user()->id;
            $topic->name = $request->name;
        
        if($topic->save()){
            return redirect('/assess');
        }else{
            return redirect('/assess')->with(["error" => "An error occured, please try again"]);
        }
    }
}
