<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record_Quiz extends Model
{
    protected $fillable = ['id_quiz', 'id_user'];
}
