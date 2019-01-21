@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Self-Assesment </h1>
            <p> Periodically, (ideally every 15-30 minutes while you are working), please take a few seconds 
             to reflect and appraise your immediate past behavior and determine how well you are performing based 
             on each of the behaviors. For on task behavior, think about what percentage of the past amount of time 
             you have been focused on the task you are trying to accomplish. 
            </p>
        </div>
    </div>


    
    <div class="row">
        <div class="col-md-12">
            <form action='/assess/submit'>                         
                {{ csrf_field() }}        
                @foreach($topics as $topic)
                   <p>{{ $topic }}</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{$topic}}" id="option1" value="1">
                        <label class="form-check-label" for="1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{$topic}}" id="option2" value="2">
                        <label class="form-check-label" for="2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{$topic}}" id="option3" value="3">
                        <label class="form-check-label" for="3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{$topic}}" id="option4" value="4">
                        <label class="form-check-label" for="4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{$topic}}" id="option5" value="5">
                        <label class="form-check-label" for="5">5</label>
                    </div>
                    <br>
                @endforeach
                <button type="submit" class="btn btn-primary">Submit</button>   
            </form>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div id="poll_div"></div>
            @linechart('Time', 'poll_div')
        </div>
    </div>

</div>


@endsection