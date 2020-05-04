<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_listening_answer extends Model
{
    public function listening_question(){
        return $this->belongsTo(listening_question::class,'id');
    }
    public function User(){
        return $this->belongsTo('user','user_id');
    }
}
