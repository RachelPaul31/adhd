<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;

class TimerController extends Controller
{
    public function timer(Request $request){
        if($request->hours == null){
            $hours = 0;
        }else{
            $hours = $request->hours;
        }
        if($request->minutes == null){
            $minutes = 0;
        }else{
            $minutes = $request->minutes;
        }        
        if($request->seconds == null){
            $seconds = 0;
        }else{
            $seconds = $request->seconds;
        }

        return view('timer', compact(['hours', 'minutes', 'seconds']));
    }
}
