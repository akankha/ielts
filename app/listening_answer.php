<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class listening_answer extends Model
{
    public function listening_question(){
        return $this->belongsTo(listening_question::class,'listening_questions_id');
    }
}
