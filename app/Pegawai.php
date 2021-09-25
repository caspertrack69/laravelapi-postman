<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    //
    protected $fillable=[
        'nama_tugas',
        'ket_tugas',
        'status_tugas',
    ];

}
