@extends('layouts.home')

@section('title', 'Edit Profile')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
@section('main')

    <div
        class="lg:w-1/3 md:w-3/5 w-9/10 mt-7 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-900 dark:border-gray-700">
        <div class="pt-4 sm:pt-7">
            <div class="flex text-center justify-center">
                @if (auth()->user()->foto)
                    <img src="../storage/foto{{ asset(auth()->user()->foto) }}" class="object-cover h-48 w-96" >
                @else
                    <img src='../storage/foto/download.png' class="object-cover h-48 w-96">
                @endif
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('users.update', auth()->user()) }}" class="mt-2"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mx-auto max-w-lg ">
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600">Nomor STR</span>
                        <div class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500
        dark:bg-gray-800 dark:text-white dark:border-gray-800">
                            <p>{{auth()->user()->no_str}}</p>
                        </div>
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600">Username</span>
                        <input placeholder="" type="text" name="username" value="{{ auth()->user()->username }}"
                               class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800">
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600">Nama Lengkap</span>
                        <input placeholder="" type="text" name="nama_lengkap" value="{{ auth()->user()->nama_lengkap }}"
                               class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800">
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600">Jenis kelamin</span>
                        <input placeholder="" type="text" name="jenis_kelamin"
                               value="{{ auth()->user()->jenis_kelamin }}"
                               class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800">
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600">Tempat Lahir</span>
                        <input placeholder="" type="text" name="tempat_lahir" value="{{ auth()->user()->tempat_lahir }}"
                               class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800">
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600">Tanggal Lahir</span>
                        <input placeholder="" type="date" name="tanggal_lahir"
                               value="{{ auth()->user()->tanggal_lahir }}"
                               class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800">
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600">Agama</span>
                        <input placeholder="" type="text" name="agama" value="{{ auth()->user()->agama }}"
                               class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800">
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600">Alamat</span>
                        <input placeholder="" type="text" name="alamat" value="{{ auth()->user()->alamat }}"
                               class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800">
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600">Kode Pos</span>
                        <input placeholder="" type="text" name="kode_pos" value="{{ auth()->user()->kode_pos }}"
                               class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800">
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600">Email</span>
                        <input placeholder="" type="email" name="email" value="{{ auth()->user()->email }}"
                               class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800">
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600">Nomor Handphone</span>
                        <input placeholder="" type="text" name="no_hp" value="{{ auth()->user()->no_hp }}"
                               class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800">
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600">Pendidikan</span>
                        <input placeholder="" type="text" name="pendidikan" value="{{ auth()->user()->pendidikan }}"
                               class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800">
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600">Provinsi</span>
                        <input placeholder="" type="text" name="provinsi" value="{{ auth()->user()->provinsi }}"
                               class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800">
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600">Instansi</span>
                        <input placeholder="" type="text" name="instansi" value="{{ auth()->user()->instansi }}"
                               class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800">
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600">Mulai Kerja di HD</span>
                        <input placeholder="" type="text" name="hd" value="{{ auth()->user()->hd }}"
                               class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800">
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600">Pelatihan Dialisis</span>
                        <input placeholder="" type="text" name="dialisis" value="{{ auth()->user()->dialisis }}"
                               class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800">
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600">Pelatihan CAPD</span>
                        <input placeholder="" type="text" name="capd" value="{{ auth()->user()->capd }}"
                               class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800">
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600">Foto</span>
                        <input type="file" name="foto" id="foto" value="{{ auth()->user()->foto }}"
                               class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800">
                    </div>
                    <div>
                        @if ($errors->any())
                            <div class="alert alert-danger text-red-600">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <button type="submit"
                            class="mt-3 text-lg font-semibold bg-green-800 w-full text-white rounded-lg px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
                        Update
                    </button>
                    <a href="/"
                       class="mt-3 text-lg text-center font-semibold bg-red-600 w-full text-white rounded-lg px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
                        Batal
                    </a>
                </div>
            </form>
            <!-- End Form -->
        </div>
    </div>
    </div>

@endsection
