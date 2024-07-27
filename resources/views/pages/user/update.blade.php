@extends('layouts.home')

@section('title', 'Edit Profile')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
@section('main')

    <div>
        <form id="getInstansi" class="mt-8" hidden>
            <input id="currentProv" name="currentProv">
            <input id="currentSearch" name="currentSearch">
        </form>
    </div>

    <div
        class="lg:w-1/3 md:w-3/5 w-9/10 mt-7 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-900 dark:border-gray-700">
        <div class="p-4 sm:p-7">
            <div class="text-center">
                <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Profile</h1>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route(auth()->user()->role . '.updatedata', $user->id) }}" class="mt-8"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mx-auto max-w-lg ">
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Nomor STR</span>
                        <input placeholder="" type="text" name="no_str" value="{{ $user->no_str }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
                    </div>
                    @error('no_str')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="py-1" hidden>
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Username</span>
                        <input placeholder="" type="text" name="username" value="{{ $user->username }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
                    </div>
                    @error('username')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Nama Lengkap</span>
                        <input placeholder="" type="text" name="nama_lengkap" value="{{ $user->nama_lengkap }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
                    </div>
                    @error('nama_lengkap')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Jenis kelamin
                        </span>
                        <select
                            class="text-md block px-2 py-2 rounded-lg w-full
                            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none"
                            name="jenis_kelamin" id="jenis_kelamin">
                            <option value="Laki-Laki" {{ $user->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="Perempuan" {{ $user->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                    </div>
                    @error('jenis_kelamin')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Tempat Lahir</span>
                        <input placeholder="" type="text" name="tempat_lahir" value="{{ $user->tempat_lahir }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
                    </div>
                    @error('tempat_lahir')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Tanggal Lahir</span>
                        <input placeholder="" type="date" name="tanggal_lahir"
                            value="{{ $user->tanggal_lahir }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
                    </div>
                    @error('tanggal_lahir')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Agama</span>
                        <input placeholder="" type="text" name="agama" value="{{ $user->agama }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
                    </div>
                    @error('agama')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Alamat</span>
                        <input placeholder="" type="text" name="alamat" value="{{ $user->alamat }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
                    </div>
                    @error('alamat')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Kode Pos</span>
                        <input placeholder="" type="text" name="kode_pos" value="{{ $user->kode_pos }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
                    </div>
                    @error('kode_pos')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Email</span>
                        <input placeholder="" type="email" name="email" value="{{ $user->email }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
                    </div>
                    @error('email')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Nomor Handphone</span>
                        <input placeholder="" type="text" name="no_hp" value="{{ $user->no_hp }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
                    </div>
                    @error('no_hp')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Pendidikan</span>
                        <input placeholder="" type="text" name="pendidikan" value="{{ $user->pendidikan }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
                    </div>
                    @error('pendidikan')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Provinsi</span>
                        <select
                            class="text-md block px-2 py-2 rounded-lg w-full
                        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none"
                            name="provinsi" id="provinsi" onchange="formSubmit()">
                            @foreach ($dataProv as $prov)
                                <option value="{{ $prov->id }}"
                                    {{ $prov->id == $user->provinsi ? 'selected' : '' }}>
                                    {{ $prov->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('provinsi')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Filter Nama Instansi</span>
                            <input placeholder="" type="text" name="searchInstansi" id="searchInstansi" oninput="formSubmit()"
                                class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Instansi</span>
                        <select
                            class="text-md block px-3 py-2 rounded-lg w-full
                        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none"
                            name="instansi" id ="instansi">
                            @foreach ($dataInstansi as $instansi)
                                <option value="{{ $instansi->id }}"
                                    {{ $instansi->id == $user->instansi ? 'selected' : '' }}>
                                    {{ $instansi->nama_unit }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('instansi')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Mulai Kerja di HD</span>
                        <input placeholder="" type="text" name="hd" value="{{ $user->hd }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
                    </div>
                    @error('hd')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Pelatihan Dialisis</span>
                        <input placeholder="" type="text" name="dialisis" value="{{ $user->dialisis }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
                    </div>
                    @error('dialisis')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Pelatihan CAPD</span>
                        <input placeholder="" type="text" name="capd" value="{{ $user->capd }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
                    </div>
                    @error('capd')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Foto</span>
                        <input type="file" name="foto" id="foto" value="{{ $user->foto }}"
                            class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#getInstansi').on('submit', function(event) {
                event.preventDefault();
                jQuery('#currentProv')[0].value = document.getElementById('provinsi').value;
                jQuery('#currentSearch')[0].value = document.getElementById('searchInstansi').value;

                jQuery.ajax({
                    url: '/dataInstansi',
                    data: jQuery('#getInstansi').serialize(),
                    type: "GET",
                    success: function(result) {
                        var select = jQuery('#instansi');
                        select.empty();
                        result.forEach(function(item) {
                            var option = jQuery('<option>', {
                                value: item.id,
                                text: item.nama_unit
                            });
                            select.append(option);
                        });
                    },

                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        // Handle error
                    }
                });

            })
        });

        function formSubmit() {
            $('#getInstansi').submit();
        }
    </script>
@endsection
