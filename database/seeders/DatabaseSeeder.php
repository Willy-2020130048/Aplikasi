<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'no_str' => '001',
            'nama_lengkap' => 'Willy',
            'jenis_kelamin' => 'pria',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '22-07-2002',
            'agama' => 'Buddha',
            'alamat' => 'Jln Pagarsih No 7',
            'kode_pos' => '5402',
            'email' => 'dermawanwilly9@gmail.com',
            'no_hp' => '085968114617',
            'pendidikan' => 'SMA',
            'instansi' => 'Instansi',
            'hd' => '2022',
            'dialisis' => '2022',
            'capd' => '2022',
            'foto' => '',
            'username' => 'ItsCleavers',
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        \App\Models\User::factory()->create([
            'no_str' => '001',
            'nama_lengkap' => 'Willy',
            'jenis_kelamin' => 'pria',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '22-07-2002',
            'agama' => 'Buddha',
            'alamat' => 'Jln Pagarsih No 7',
            'kode_pos' => '5402',
            'email' => 'admin@gmail.com',
            'no_hp' => '085968114617',
            'pendidikan' => 'SMA',
            'instansi' => 'Instansi',
            'hd' => '2022',
            'dialisis' => '2022',
            'capd' => '2022',
            'foto' => '',
            'username' => 'Admin',
            'role' => 'admin',
            'password' => Hash::make('admin213'),
        ]);

        \App\Models\Acara::factory()->create([
            'nama_acara' => 'Bakti Sosial',
            'jenis_acara' => 'Umum',
            'deskripsi_acara' => 'Pelaksanaan bakti sosial di daerah bandung, untuk mengurangi polusi udara yang ada. Diwajibkan kepada seluruh anggota untuk berpartisipasi pada acara ini.',
            'tgl_mulai' => date('Y-m-d', strtotime('2024/4/4')),
            'tgl_selesai' => date('Y-m-d', strtotime('2024/4/5')),
            'id_detail' => '',
            'harga_acara' => 100000,
            'jumlah_partisipan' => 100,
            'pengelola' => 'Pengelola Acara',
        ]);

        \App\Models\Acara::factory()->create([
            'nama_acara' => 'Bakti Sosial',
            'jenis_acara' => 'Umum',
            'deskripsi_acara' => 'Pelaksanaan bakti sosial di daerah bandung, untuk mengurangi polusi udara yang ada. Diwajibkan kepada seluruh anggota untuk berpartisipasi pada acara ini.',
            'tgl_mulai' => date('Y-m-d', strtotime('2024/4/4')),
            'tgl_selesai' => date('Y-m-d', strtotime('2024/4/4')),
            'id_detail' => '',
            'harga_acara' => 100000,
            'jumlah_partisipan' => 100,
            'pengelola' => 'Pengelola Acara',
        ]);
    }
}
