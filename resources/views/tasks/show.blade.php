@extends('layouts.app')

@section('content')

    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if (count($errors))
            <div class="form-group">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif 

        {{--  Displaying the Task --}}
        <div class="row" id="taskTitle">
            <div class="col-md-12 text-center">
                <h1>{{ $task->name}} </h1>
                <p>Due Date: {{ $task->due_date }}</p>
                <p>Importance: {{ $task->importance }}</p>
                <p>Estimated Time Needed to Complete: {{ $task->time }}</p>
                <p>Percent Complete: {{ $task->percent_complete }}</p>
                
            </div>
            <div class="col-md-12">
                <p>{{ $task->body }}</p>
            </div>
        </div>

        <div class="row">

            @if ($task->user_id ==  $user )
                <!-- Edit Button -->
                <div class="col-md-3">        
                    <!-- Button -->
                    <button class="btn btn-primary" data-target="#exampleModal" data-toggle="modal">Edit</button>

                    <!-- Start of Modal(popup) -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!-- Modal header (title and X) -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Your Task</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <!-- Modal body- edit form -->
                                <div class="modal-body">
                                    <form method="POST" action="/tasks/edit">
                                        {{ csrf_field() }}
                                        <!-- Title -->
                                        <div class="form-group">
                                            <label for="title">Title:</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{$task->name}}">
                                        </div>
                                        <!-- body -->
                                        <div class="form-group col-md-12">
                                            <label for="exampleInputPassword1">Body</label>
                                            <textarea id="body" name="body" class="form-control" >{{ $task->body }} </textarea>
                                        </div>    
                                        <!-- time -->
                                        <div class="form-group col-md-12">
                                            <label for="title">Time Needed (please input in format 00:00:00):</label>
                                            <input type="text" class="form-control" id="time" name="time" value="{{$task->time}}">
                                        </div>
                                        <!-- Importance -->
                                        <div class="form-group col-md-12">
                                            <label >Importance</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="importance" id="inlineRadio1" value="1">
                                                <label class="form-check-label" for="inlineRadio1">1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="importance" id="inlineRadio2" value="2">
                                                <label class="form-check-label" for="inlineRadio2">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="importance" id="inlineRadio3" value="3">
                                                <label class="form-check-label" for="inlineRadio3">3</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="importance" id="inlineRadio4" value="4">
                                                <label class="form-check-label" for="inlineRadio4">4</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="importance" id="inlineRadio5" value="5">
                                                <label class="form-check-label" for="inlineRadio5">5</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="importance" id="inlineRadio5" value="6">
                                                <label class="form-check-label" for="inlineRadio5">6</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="importance" id="inlineRadio5" value="7">
                                                <label class="form-check-label" for="inlineRadio5">7</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="importance" id="inlineRadio5" value="8">
                                                <label class="form-check-label" for="inlineRadio5">8</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="importance" id="inlineRadio5" value="9">
                                                <label class="form-check-label" for="inlineRadio5">9</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="importance" id="inlineRadio5" value="10">
                                                <label class="form-check-label" for="inlineRadio5">10</label>
                                            </div>
                                        </div>
                                        <!-- Percent -->
                                        <div class="form-group col-md-12">
                                            <label for="exampleInputPassword1">Percent Complete</label>
                                            <textarea id="percent" name="percent" class="form-control" >{{ $task->percent_complete}} </textarea>
                                        </div>
                                        <!-- Date -->
                                        <div class="form-group col-md-12">
                                            <label for="due_date">Due Date:</label>
                                            <input class="form-control" type="date" name="due_date" id="due_date">
                                        </div>
                                        <input type="hidden" name="task" value="{{$task->id}}">
                                        <!-- Submit Button -->
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    

                <!-- Mark as complete button -->
                <div class="col-md-3">
                    <form method="post" action="/tasks/complete">
                        {{ csrf_field() }}
                        <input type="hidden" name="task" value="{{$task->id}}"> 
                        <button type="submit" class="btn btn-primary">Mark Task as Complete</button>
                    </form>
                </div>
                
                <!-- Delete Button  -->
                <div class="col-md-3">
                    <form method="post" action="/tasks/delete">
                        {{ csrf_field() }}
                        <input type="hidden" name="task" value="{{$task->id}}"> 
                        <button type="submit" class="btn btn-primary">Remove from Task List</button>
                    </form>
                </div>

            @endif
        </div>


    </div>
@endsection