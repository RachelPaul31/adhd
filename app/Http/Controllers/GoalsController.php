<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goal;
use Carbon\Carbon;

class GoalsController extends Controller
{
    public function all(){
        return view('goals');
    }

}
