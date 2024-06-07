@extends('layouts.home')

@section('title', 'Edit Profile')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
@section('main')

    <div
        class="w-full max-w-2xl mt-7 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-900 dark:border-gray-700">
        <div class="p-4 sm:pt-7">
            <div class="flex text-center justify-center">
                @if (auth()->user()->foto)
                    <img src="../storage/bukti_pembayaran{{ asset(auth()->user()->foto) }}" class="object-cover h-48 w-96">
                @else
                    <img src='../storage/bukti_pembayaran/download.png' class="object-cover h-48 w-96">
                @endif
            </div>
                <div class="mx-auto max-w-lg ">
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-300">Nomor STR</span>
                        <input placeholder="" type="text" name="username" value="{{ auth()->user()->no_str }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800" disabled>
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-300">Username</span>
                        <input placeholder="" type="text" name="username" value="{{ auth()->user()->username }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800" disabled>
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-300">Nama Lengkap</span>
                        <input placeholder="" type="text" name="nama_lengkap" value="{{ auth()->user()->nama_lengkap }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800" disabled>
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-300">Jenis kelamin</span>
                        <input placeholder="" type="text" name="jenis_kelamin"
                            value="{{ auth()->user()->jenis_kelamin }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800" disabled>
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-300">Tempat Lahir</span>
                        <input placeholder="" type="text" name="tempat_lahir" value="{{ auth()->user()->tempat_lahir }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800" disabled>
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-300">Tanggal Lahir</span>
                        <input placeholder="" type="date" name="tanggal_lahir"
                            value="{{ auth()->user()->tanggal_lahir }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800" disabled>
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-300">Agama</span>
                        <input placeholder="" type="text" name="agama" value="{{ auth()->user()->agama }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800" disabled>
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-300">Alamat</span>
                        <input placeholder="" type="text" name="alamat" value="{{ auth()->user()->alamat }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800" disabled>
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-300">Kode Pos</span>
                        <input placeholder="" type="text" name="kode_pos" value="{{ auth()->user()->kode_pos }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800" disabled>
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-300">Email</span>
                        <input placeholder="" type="email" name="email" value="{{ auth()->user()->email }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800" disabled>
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-300">Nomor Handphone</span>
                        <input placeholder="" type="text" name="no_hp" value="{{ auth()->user()->no_hp }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800" disabled>
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-300">Pendidikan</span>
                        <input placeholder="" type="text" name="pendidikan" value="{{ auth()->user()->pendidikan }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800" disabled>
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-300">Provinsi</span>
                        <input placeholder="" type="text" name="provinsi" value="{{ auth()->user()->provinsi }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800" disabled>
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-300">Instansi</span>
                        <input placeholder="" type="text" name="instansi" value="{{ auth()->user()->instansi }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800" disabled>
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-300">Mulai Kerja di HD</span>
                        <input placeholder="" type="text" name="hd" value="{{ auth()->user()->hd }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800" disabled>
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-300">Pelatihan Dialisis</span>
                        <input placeholder="" type="text" name="dialisis" value="{{ auth()->user()->dialisis }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800" disabled>
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-300">Pelatihan CAPD</span>
                        <input placeholder="" type="text" name="capd" value="{{ auth()->user()->capd }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800" disabled>
                    </div>
                </div>
        </div>
    </div>

@endsection
