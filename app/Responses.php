<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responses extends Model
{
    protected $fillable = ['user_id', 'topic_id', 'answer'];

}
