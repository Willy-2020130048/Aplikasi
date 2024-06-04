<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_acaras', function (Blueprint $table) {
            $table->id();
            $table->string('id_acara');
            $table->string('id_peserta');
            $table->string('nama_akun');
            $table->string('bukti_pembayaran');
            $table->string('no_ktp');
            $table->string('tipe_pegawai')->nullable();
            $table->string('nip')->nullable();
            $table->string('gelar')->nullable();
            $table->string('golongan')->nullable();
            $table->string('jenis_nakes')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('kota')->nullable();
            $table->string('status')->default('Belum Dikonfirmasi');
            $table->string('verifikasi')->default('-')->nullable();
            $table->string('unverifikasi')->default('-')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_acaras');
    }
};
