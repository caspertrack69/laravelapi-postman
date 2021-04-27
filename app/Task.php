<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable=[
        'nama_tugas',
        'id_kategori',
        'ket_tugas',
        'status_tugas',
    ];
}
