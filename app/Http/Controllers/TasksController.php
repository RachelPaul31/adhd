<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Calendar;
use Carbon\Carbon;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function calendar(Request $request)
    {
        $events=[];
        $tasks = Task::where('user_id', "=", auth()->user()->id)->where("active", "=", 1)->get();
        $url = 'http://127.0.0.1:8000/tasks/';
        foreach($tasks as $key=>$value){
            if($value->importance == 1){
                
                    $color = '#33ff00';

            }
            else if($value->importance == 2){
                
                    $color = '#66ff00';

            }
            else if($value->importance == 3){
                
                    $color = '#33ff00';

            }
            else if($value->importance == 4){
                
                    $color = '#99ff00';

            }
            else if($value->importance == 2){
                
                    $color = '#ccff00';

            }
            else if($value->importance == 5){
                
                    $color = '#FFFF00';

            }
            else if($value->importance == 6){
                $color = '#FFCC00';
            }
            else if($value->importance == 7){
                
                    $color = '#ff9900';

            }
            else if($value->importance == 8){
                
                    $color = '#ff6600';

            }
            else if($value->importance == 9){
                
                    $color = '#FF3300';

            }
            else if($value->importance == 10){
                
                    $color = '#FF0000';
            }
            else{
                $color = '#000000';
            }

            $events[] = Calendar::event(
                $value->name,
                true,
                new \DateTime($value->due_date),
                new \DateTime($value->due_date),
                null,
                [
                    'color' => $color,
                    //needs to change when the website goes live!
                    'url' => $url.$value->id,
                ]
                
            );
        }
        $calendar = Calendar::addEvents($events);
        return view('tasks.calendar', compact('calendar'));
    }

    public function checklist(Request $request){
        if($request->sort == NULL){
            $sort = 'name';
        }else{
            $sort = $request->sort;
        }

        if($request->sort == 'importance'){
            $order = 'DESC';
        }else{
            $order = 'ASC';
        }
        $tasks = Task::where("user_id", "=", auth()->user()->id)->where("active", "=", 1)->orderBy($sort, $order)->get();

        return view('tasks.checklist', compact('tasks'));
    }

    public function create(Request $request){
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
            'due_date' => 'required',
            'importance' => 'required',
            'time' => 'required',
            'percent' => 'required',
        ]);

        $user = auth()->user();
        $task = new Task();
            
            $task->user_id = $user->id;
            $task->name = $request['title'];
            $task->body = $request['body'];
            $task->due_date = $request['due_date'];
            $task->importance = $request['importance'];
            $task->time = $request['time'];
            $task->percent_complete = $request['percent'];
            $task->parent = 0;
        
        if($task->save()){
            return redirect ('/tasks/checklist');
        } else{
            return redirect ('/tasks/create')->with(["error" => "Task not created please try again"]);
        };

    }
    public function show(Task $task)
    {
        $user = auth()->user()->id;
        if($task->user_id == auth()->user()->id){
            return view('show', compact('task', 'user'));
        }else{
            return back()->with(["error" => "You do not have permission to view this task"]);
        }

    }

    public function delete(Request $request)
    {
        $id = $request->task;
        $delete = Task::where('id', $id)->update(['active' => 0]);

        if($delete){
            return back()->with(["status" => "Successfully removed task."]);
        } else{
            return back()->withErrors("An error occurred please try again");
        };
    }

    public function update(Request $request)
    {
        $id = $request->task;
        if($request->due_date == NULL){
            $update = Task::where('id', $id)->update(['name' => $request->title, 'body' => $request->body, 'importance' => $request->importance, 'percent_complete' => $request->percent, 'time' => $request->time]);
        }else{
            $update = Task::where('id', $id)->update(['name' => $request->title, 'body' => $request->body, 'importance' => $request->importance, 'due_date' => $request->due_date, 'percent_complete' => $request->percent, 'time' => $request->time]);
        }

        if($update){
            return redirect('/'. $id)->with(["status" => "Edit successful"]);
        } else{
            return back()->withErrors("An error occurred please try again");
        }; 
    }
    public function complete(Request $request)
    {
        $id = $request->task;
        if($request->complete){
            $delete = Task::where('id', $id)->update(['complete' => 0]);
        }else{
            $delete = Task::where('id', $id)->update(['complete' => 1]);
        }

        if($delete){
            return back()->with(["status" => "Successfully marked as complete."]);
        } else{
            return back()->withErrors("An error occurred please try again");
        };
    }
    public function new(){
        return view('tasks.newtask');
    }

}
