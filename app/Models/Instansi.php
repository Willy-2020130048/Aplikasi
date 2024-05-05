<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_unit',
        'nama_unit',
        'id_provinsi',
        'alamat',
        'no_telp',
        'email',
    ];
}
