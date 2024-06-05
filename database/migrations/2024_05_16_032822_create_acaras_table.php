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
        Schema::create('acaras', function (Blueprint $table) {
            $table->id();
            $table->string('nama_acara');
            $table->string('jenis_acara')->default('Umum');
            $table->string('workshop')->default('none');
            $table->string('deskripsi_acara');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('id_detail')->nullable();
            $table->integer('harga_acara');
            $table->integer('jumlah_partisipan')->default(0);
            $table->string('pengelola');
            $table->string('status')->default('Online');
            $table->string('tempat')->default(' ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acaras');
    }
};
