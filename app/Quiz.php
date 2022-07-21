<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable =
    [
        'judul', 'deskripsi', 'status'
    ];

    public function quizzes(){
        return $this -> hasMany('App\Soal');
    }
}
