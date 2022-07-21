<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $fillable =
    [
        'soal', 'jenis_soal', 'jawaban', 'essay', 'option_a', 'option_b', 'option_c', 'option_d', 'id_quiz'
    ];

    public function soal(){
        return $this -> belongsTo('App\Quiz');
    }
}
