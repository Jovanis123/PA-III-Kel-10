<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table = 'tugas';

    protected $fillable = [
        'mata_pelajaran_id',
        'kelas_id',
        'judul_tugas',
        'file_tugas',
        'nilai_tugas'        
    ];

    public function toMapel() 
    {
      return $this->belongsTo('App\mataPelajaran', 'mata_pelajaran_id');
    }

    public function toKelas() 
    {
      return $this->belongsTo('App\Kelas', 'kelas_id');
    }
}
