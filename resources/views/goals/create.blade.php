@extends('layouts.app')

@section ('content')

<form method="POST" action="/goals/create">

    {{ csrf_field() }}

    <div class="col-sm-8 offset-md-2 blog-main">
        <h1>Create a New Goal </h1>

        <hr>

    <div class="form-group col-md-12">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title" >
    </div>
    
    <div class="form-group col-md-12">
        <label for="exampleInputPassword1">Body:</label>
        <textarea id="body" name="body" class="form-control" > </textarea>
    </div>    
    <div class="form-group col-md-3">
        <label for="due_date">Date to Compelete By:</label>
        <input class="form-control" type="date" name="complete_by" id="complete_by">
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
