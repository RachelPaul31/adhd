@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row">            
        <form>
            <div class="form-group col-md-12">
                <label for="title">Hours:</label>
                <input type="text" class="form-control" id="hours" name="hours" >
            </div>
            <div class="form-group col-md-12">
                <label for="title">Minutes:</label>
                <input type="text" class="form-control" id="minutes" name="minutes" >
            </div>
            <div class="form-group col-md-12">
                <label for="title">Seconds:</label>
                <input type="text" class="form-control" id="seconds" name="seconds" >
            </div>
            <button type="submit" class="btn btn-primary">Start</button>                
        </form>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="/timer">
                <button type="submit" class="btn btn-primary">Stop</button>                
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p id="demo"></p>
        </div>
    </div>
    <audio id="alarm" src="alarm.wav" autostart="0"></audio>
</div>
@endsection


@section('script')
<script type="text/javascript">

if({{$seconds}} != 0 || {{$minutes}} !=0 || {{$hours}} !=0){
    var countDownDate = new Date();
    countDownDate.setSeconds(countDownDate.getSeconds() + {{$seconds}});
    countDownDate.setMinutes(countDownDate.getMinutes() + {{$minutes}});
    countDownDate.setHours(countDownDate.getHours() + {{$hours}});
    countDownDate= countDownDate.getTime();


// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();
  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML =  hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);  
    document.getElementById("demo").innerHTML =  "Timer finished";
    var sound = document.getElementById("alarm");
    sound.play();
  }
}, 1000);

}
</script>
@endsection