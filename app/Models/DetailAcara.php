<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class DetailAcara extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id_acara',
        'id_peserta',
        'nama_akun',
        'bukti_pembayaran',
        'status',
        'status_kehadiran',
        'no_ktp',
        'no_hp',
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
        'verfiikasi_kehadiran'
    ];
}
