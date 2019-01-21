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

        <!-- Sort Buttons -->
        <div class="row">
        <div class="col-md-1">
            Sort By:
        </div>
        <div class="col-md-1">
            <form method="get" action="/goals">
                {{ csrf_field() }}
                <input type="hidden" name="sort" value="name"> 
                <button type="submit" class="btn btn-primary btn-sm">A-Z</button>
            </form>
        </div>

        <div class="col-md-1">
            <form method="get" action="/goals">
                {{ csrf_field() }}
                <input type="hidden" name="sort" value="complete_by"> 
                <button type="submit" class="btn btn-primary btn-sm">Complete By</button>
            </form>
        </div>


        <div class="col-md-8">

        </div>
        <div class="col-md-1 align-right">
            <a class="btn btn-primary btn" href="/goals/new" role="button">Add goal</a>
        </div>

    </div>
    <hr>



    @foreach ($goals as $goal)
        <div class="row">
            <div class="col-md-1">
                <!-- Check Box Thing Here -->
                <form method="post" action="/goals/complete">
                    {{ csrf_field() }}
                    <input type="hidden" name="goal" value="{{$goal->id}}"> 
                    <input type="hidden" name="complete" value="{{$goal->complete}}"> 
                    @if($goal->complete)
                        <button type="submit" class="btn btn-success"> Done! </button>
                    @else
                        <button type="submit" class="btn btn-light"> To Do </button>
                    @endif
                </form>
            </div>
            <div class="col-md-2">
                @if($goal->complete)
                    <font color="black"><s><strong>{{ $goal->name }}</strong></s></font>
                @else
                    <font color="black"><strong>{{ $goal->name }} </strong></font>
                @endif
            </div>
            <div class= "col-md-5">
                <p> {{ $goal->body }} </p>
            </div>
            <div class = "col-md-2 text-center">
                <p> {{ Carbon\Carbon::parse($goal->complete_by)->format('m/d/y') }} </p>
            </div>
            <div class= "col-md-1 text-center">
                    <!-- Button -->
                    <button class="btn btn-primary" data-target="#exampleModal" data-toggle="modal">Edit</button>

                    <!-- Start of Modal(popup) -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!-- Modal header (title and X) -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Your Goal</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <!-- Modal body- edit form -->
                                <div class="modal-body">
                                    <form method="POST" action="/goals/edit">
                                        {{ csrf_field() }}
                                        <!-- Title -->
                                        <div class="form-group col-md-12">
                                            <label for="title">Title:</label>
                                            <input type="text" class="form-control" id="title" name="title" value="{{$goal->name}}">
                                        </div>
                                        <!-- body -->
                                        <div class="form-group col-md-12">
                                            <label for="exampleInputPassword1">Body</label>
                                            <textarea id="body" name="body" class="form-control" > {{$goal->body}}</textarea>
                                        </div>    
                                        <!-- Date -->
                                        <div class="form-group col-md-12">
                                            <label for="complete_by">Date to Complete By:</label>
                                            <input class="form-control" type="date" name="complete_by" id="complete_by">
                                        </div>
                                        <input type="hidden" name="goal" value="{{$goal->id}}">
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
            <div class= "col-md-1 text-center">
                <form method="post" action="/goals/delete">
                    {{ csrf_field() }}
                    <input type="hidden" name="goal" value="{{$goal->id}}"> 
                    <button type="submit" class="btn btn-primary">Remove</button>
                </form>
            </div>
        </div>
    @endforeach

</div>

@endsection