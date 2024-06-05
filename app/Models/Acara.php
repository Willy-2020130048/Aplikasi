<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_acara',
        'jenis_acara',
        'workshop',
        'tgl_mulai',
        'tgl_selesai',
        'deskripsi_acara',
        'id_detail',
        'harga_acara',
        'jumlah_partisipan',
        'pengelola',
        'status',
        'tempat',
    ];
}
