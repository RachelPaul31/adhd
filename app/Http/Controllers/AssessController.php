<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssessTopics;
use App\Responses;
use Khill\Lavacharts\Lavacharts;
use Carbon\Carbon;
use DateTime;


class AssessController extends Controller
{
    public function assess(Request $request){
        $topics = ['on_task', 'productivity', 'progress', 'organization', 'prompt_completion'];
        $date = new DateTime;
        $date->modify('-1 day');
        $formatted_date = $date->format('Y-m-d H:m:s');

        $userAssessments = Responses::where('user_id','=', auth()->user()->id)->where('created_at','>=',$formatted_date)->orderBy('created_at', 'ASC')->get();


        $assess  = \Lava::DataTable();

            $assess->addDateTimeColumn('Time');
            $assess->addNumberColumn("On task behavior");
            $assess->addNumberColumn("Productivity");
            $assess->addNumberColumn("Progress/completion of tasks");
            $assess->addNumberColumn("Organization");
            $assess->addNumberColumn("Prompt completion of tasks");
            foreach($userAssessments as $assessment){
                $assess->addRow([$assessment->created_at, $assessment->on_task, $assessment->productivity, $assessment->progress, $assessment->organization, $assessment->prompt_completion]);
            }

        
        $chart = \Lava::LineChart('Time', $assess, [ "title" => "Assessments over past 24 hours"]);

        return view('selfassess', compact('topics', 'chart'));
    }

    public function new(Request $request){
        $user = auth()->user();
        
        $response = new Responses();
            
            $response->user_id = $user->id;
            $response->on_task = $request->on_task;
            $response->productivity = $request->productivity;
            $response->progress =  $request->progress;
            $response->organization = $request->organization;
            $response->prompt_completion = $request->prompt_completion;
        
        if($response->save()){
            return redirect ('/assess');
        } else{
            return redirect ('/assess')->with(["error" => "Response not saved, please try again"]);
        };
    }

}
