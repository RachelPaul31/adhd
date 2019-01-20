@extends('layouts.app')

@section ('content')

<form method="POST" action="/create/task">

    {{ csrf_field() }}

    <div class="col-sm-8 offset-md-2 blog-main">
        <h1>Create a New Task </h1>

        <hr>

    <div class="form-group col-md-12">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title" >
    </div>
    
    <div class="form-group col-md-12">
        <label for="exampleInputPassword1">Body</label>
        <textarea id="body" name="body" class="form-control" > </textarea>
    </div>    
    <div class="form-group col-md-12">
        <label for="title">Time Needed (please input in format 00:00:00):</label>
        <input type="text" class="form-control" id="time" name="time" >
    </div>
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
    <div class="form-group col-md-12">
        <label for="exampleInputPassword1">Percent Complete</label>
        <textarea id="percent" name="percent" class="form-control" > </textarea>
    </div>
    <div class="form-group col-md-3">
        <label for="due_date">Due Date:</label>
        <input class="form-control" type="date" name="due_date" id="due_date">
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Publish</button>
    </div>

    

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

    </form>
</div>
@endsection
