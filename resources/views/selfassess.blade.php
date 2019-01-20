@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Self-Assesment </h1>
            <p> Please input the behaviors that you will be assessing(by clicking the button below), some base ones that are recommended are on 
            task behavior, productivity, completion of tasks/progress, organization, and remembering things you need
             to. Periodically, (ideally every 15-30 minutes while you are working on anything), take a few seconds 
             to reflect and appraise your immediate past behavior and determine how well you are performing based 
             on each of the symptoms you input. 
            
            <!-- New Topic -->       
            <!-- Button -->
            <button class="btn btn-primary btn-sm" data-target="#exampleModal" data-toggle="modal">New Assessment Topic</button>

            <!-- Start of Modal(popup) -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- Modal header (title) -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create New Assessment Topic</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body- form -->
                        <div class="modal-body">
                            <form method="POST" action="/create/assesstopic">
                                {{ csrf_field() }}
                                <!-- Title -->
                                <div class="form-group col-md-12">
                                    <label for="title">Behavior you will be monitoring and self-assessing:</label>
                                    <input type="text" class="form-control" id="name" name="name" >
                                </div>
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
            </p>
        </div>
    </div>
    @foreach($usertopics as $topic)
        <div class="row">
            <div class="col-md-12">
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
            </div>
        </div>
    @endforeach
</div>


@endsection