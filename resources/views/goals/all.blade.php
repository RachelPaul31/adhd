@extends('layouts.app')

@section('content')
<div class="container">
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
            <div class="col-md-3">
                @if($goal->complete)
                    <a href="/goals/{{$goal->id}}"><font color="black"><s><strong>{{ $goal->name }}</strong></s></font></a>
                @else
                    <a href="/goals/{{$goal->id}}" ><font color="black"><strong>{{ $goal->name }} </strong></font></a>
                @endif
            </div>
            <div class= "col-md-5">
                <p> {{ $goal->body }} </p>
            </div>
            <div class = "col-md-2 text-center">
                <p> {{ Carbon\Carbon::parse($goal->complete_by)->format('m/d/y') }} </p>
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