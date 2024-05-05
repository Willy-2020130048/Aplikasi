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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('username')->unique();
            $table->string('no_str')->default('');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir')->default('');
            $table->string('tanggal_lahir')->default('');
            $table->string('agama')->default('');
            $table->string('alamat')->default('');
            $table->string('kode_pos')->default('');
            $table->string('no_hp')->default('');
            $table->string('pendidikan')->default('');
            $table->string('provinsi')->default('');
            $table->string('instansi')->default('');
            $table->string('hd')->default('');
            $table->string('dialisis')->default('');
            $table->string('capd')->default('');
            $table->string('foto')->default('');
            $table->string('role')->default('user');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
