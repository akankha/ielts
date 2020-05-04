<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class listening_question extends Model
{
    public function listening_answer()
    {
        return $this->hasone(listening_answer::class,'listening_questions_id');
    }
    public function user_listening_answer()
    {
        return $this->hasMany('user_listening_answer','listening_questions_id');
    }


}
