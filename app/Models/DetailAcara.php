<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailAcara extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_acara',
        'id_peserta',
        'nama_akun',
        'bukti_pembayaran',
        'status',
        'no_ktp',
        "tipe_pegawai",
        "nip",
        "gelar",
        "golongan",
        'jenis_nakes',
        'jabatan',
        'kota',
        'sponsor',
        'workshop',
        'verifikasi',
        'unverifikasi',
    ];
}
