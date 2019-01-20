@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Sort Buttons -->
    <div class="row">
        <div class="col-md-1">
            Sort By:
        </div>
        <div class="col-md-1">
            <form method="get" action="/tasks/checklist">
                {{ csrf_field() }}
                <input type="hidden" name="sort" value="importance"> 
                <button type="submit" class="btn btn-primary btn-sm">Priority</button>
            </form>
        </div>
        
        <div class="col-md-2">
            <form method="get" action="/tasks/checklist">
                {{ csrf_field() }}
                <input type="hidden" name="sort" value="time"> 
                <button type="submit" class="btn btn-primary btn-sm">Est. Time Needed</button>
            </form>
        </div>

        <div class="col-md-1">
            <form method="get" action="/tasks/checklist">
                {{ csrf_field() }}
                <input type="hidden" name="sort" value="due_date"> 
                <button type="submit" class="btn btn-primary btn-sm">Due Date</button>
            </form>
        </div>

        <div class="col-md-1">
            <form method="get" action="/tasks/checklist">
                {{ csrf_field() }}
                <input type="hidden" name="sort" value="name"> 
                <button type="submit" class="btn btn-primary btn-sm">A-Z</button>
            </form>
        </div>
        <div class="col-md-5">

        </div>
        <div class="col-md-1 align-right">
            <a class="btn btn-primary btn" href="/tasks/create" role="button">Add Task</a>
        </div>

    </div>
    <hr>
    <!-- Row Headers -->
    <div class="row">
        <div class="col-md-1">
            <!-- Check Box Space -->
        </div>
        <div class="col-md-3 text-center">
            <strong>Name </strong>
        </div>
        <div class = "col-md-1 text-center">
            <p> Importance </p>
        </div>
        <div class = "col-md-2 text-center">
            <p> Est. Time Needed </p>
        </div>
        <div class = "col-md-2 text-center">
            <p> % Complete </p>
        </div>
        <div class = "col-md-2 text-center">
            <p> Due </p>
        </div>
    </div>

    <!--Displaying tasks with columns -->
    @foreach ($tasks as $task)
            <div class="row">
                <div class="col-md-1">
                    <!-- Check Box Thing Here -->
                    <form method="post" action="/tasks/complete">
                        {{ csrf_field() }}
                        <input type="hidden" name="task" value="{{$task->id}}"> 
                        <input type="hidden" name="complete" value="{{$task->complete}}"> 
                        @if($task->complete)
                        <button type="submit" class="btn btn-success"> Done! </button>
                        @else
                        <button type="submit" class="btn btn-light"> To Do </button>
                        @endif
                    </form>
                </div>
                <div class="col-md-3">
                @if($task->complete)
                    <a href="/tasks/{{$task->id}}"><font color="black"><s><strong>{{ $task->name }}</strong></s></font></a>
                @else
                    <a href="/tasks/{{$task->id}}" ><font color="black"><strong>{{ $task->name }} </strong></font></a>
                @endif
                </div>
                <div class = "col-md-1 text-center">
                    <p> {{ $task->importance }} </p>
                </div>
                <div class = "col-md-2 text-center">
                    <p> {{\Carbon\Carbon::createFromFormat('H:i:s',$task->time)->format('H:i')}} </p>
                </div>
                <div class = "col-md-2 text-center">
                    <p> {{ $task->percent_complete }}% </p>
                </div>
                <div class = "col-md-2 text-center">
                    <p> {{ Carbon\Carbon::parse($task->due_date)->format('m/d/y') }} </p>
                </div>
                <div class= "col-md-1 text-center">
                    <form method="post" action="/tasks/delete">
                        {{ csrf_field() }}
                        <input type="hidden" name="task" value="{{$task->id}}"> 
                        <button type="submit" class="btn btn-primary">Remove</button>
                    </form>
                </div>
            </div>
    @endforeach

</div>

@endsection



