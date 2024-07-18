<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Instansi extends Model
{
    public $table = "ipdi_unit";

    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'kode_unit',
        'nama_unit',
        'id_propinsi',
        'id_pw',
        'alamat',
        'no_telp',
        'email',
    ];
}
