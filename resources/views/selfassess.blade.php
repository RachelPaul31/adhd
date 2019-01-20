@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Self-Assesment </h1>
            
            @foreach($usertopics as $topic)
                <p>{{ $topic->name }}</p>
                <form action='/assess/submit'>
                    {{ csrf_field() }}
                    <input type="hidden" name="topic" value="{{$topic->id}}">
                    
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="option" id="option1" value="1">
                        <label class="form-check-label" for="1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="option" id="option2" value="2">
                        <label class="form-check-label" for="2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="option" id="option3" value="3">
                        <label class="form-check-label" for="3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="option" id="option4" value="4">
                        <label class="form-check-label" for="4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="option" id="option5" value="5">
                        <label class="form-check-label" for="5">5</label>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            @endforeach
                
        


        </div>
    </div>
</div>


@endsection