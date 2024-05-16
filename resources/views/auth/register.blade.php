@extends('layouts.auth')

@section('title', 'register')
@section('main')

    <div
        class="lg:w-1/3 md:w-3/5 w-9/10 mt-7 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <div class="p-4 sm:p-7">
            <div class="text-center">
                <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Daftar Anggota</h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Sudah memiliki akun ?
                    <a class="text-blue-600 decoration-2 hover:underline font-medium" href="/login">
                        Login
                    </a>
                </p>
            </div>

            <div>
                <form id="getInstansi" class="mt-8" hidden>
                    <input id="currentProv" name="currentProv">
                </form>
            </div>
            <div class="mt-5">
                <!-- Form -->
                <form id="goRegister" method="POST" action="{{ route('register') }}" class="mt-8"
                    x-data="{ password: '', password_confirm: '' }">
                    @csrf
                    <div class="mx-auto max-w-lg ">
                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Nomor STR
                            </span>
                            <input placeholder="" type="text" name="no_str"
                                class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('no_str')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Nama Lengkap
                            </span>
                            <input placeholder="" type="text" name="nama_lengkap"
                                class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('nama_lengkap')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Jenis kelamin
                            </span>
                            <input placeholder="" type="text" name="jenis_kelamin"
                                class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('jenis_kelamin')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Email</span>
                            <input placeholder="" type="email" name="email"
                                class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('email')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- <div class="py-1">
                            <span class="px-1 text-sm text-gray-600">Nomor Handphone</span>
                            <input placeholder="" type="text" name="no_hp"
                                class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600">Pendidikan</span>
                            <input placeholder="" type="text" name="pendidikan"
                                class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div> --}}
                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Provinsi</span>
                            <select
                                class="text-md block px-2 py-2 rounded-lg w-full
                            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none"
                                name="provinsi" id="provinsi" onchange="formSubmit()">
                                @foreach ($dataProv as $prov)
                                    <option value="{{ $prov->id }}">
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
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Instansi</span>
                            <select
                                class="text-md block px-3 py-2 rounded-lg w-full
                            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none"
                                name="instansi" id ="instansi">
                                @foreach ($dataInstansi as $instansi)
                                    <option value="{{ $instansi->id }}">{{ $instansi->nama_unit }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('instansi')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- <div class="py-1">
                            <span class="px-1 text-sm text-gray-600">Mulai Kerja di HD</span>
                            <input placeholder="" type="text" name="hd"
                                class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600">Pelatihan Dialisis</span>
                            <input placeholder="" type="text" name="dialisis"
                                class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600">Pelatihan CAPD</span>
                            <input placeholder="" type="text" name="capd"
                                class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600">Foto</span>
                            <input placeholder="" type="file" name="foto"
                                class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div> --}}
                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Username</span>
                            <input placeholder="" type="text" name="username"
                                class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('username')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Password</span>
                            <input placeholder="" type="password" x-model="password" name="password"
                                class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('password')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Password Confirm</span>
                            <input placeholder="" type="password" x-model="password_confirm" name="password_confirmation"
                                class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('password_confirmation')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="flex justify-start mt-3 ml-4 p-1">
                            <ul>
                                <li class="flex items-center py-1">
                                    <div :class="{
                                        'bg-green-200 text-green-700': password == password_confirm && password
                                            .length >
                                            0,
                                        'bg-red-200 text-red-700': password != password_confirm || password
                                            .length == 0
                                    }"
                                        class=" rounded-full p-1 fill-current ">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path x-show="password == password_confirm && password.length > 0"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                            <path x-show="password != password_confirm || password.length == 0"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />

                                        </svg>
                                    </div>
                                    <span
                                        :class="{
                                            'text-green-700': password == password_confirm && password.length >
                                                0,
                                            'text-red-700': password != password_confirm || password.length == 0
                                        }"
                                        class="font-medium text-sm ml-3"
                                        x-text="password == password_confirm && password.length > 0 ? 'Passwords match' : 'Password tidak sama' "></span>
                                </li>
                                <li class="flex items-center py-1">
                                    <div :class="{
                                        'bg-green-200 text-green-700': password.length >
                                            7,
                                        'bg-red-200 text-red-700': password.length <= 7
                                    }"
                                        class=" rounded-full p-1 fill-current ">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path x-show="password.length > 7" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            <path x-show="password.length <= 7" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />

                                        </svg>
                                    </div>
                                    <span
                                        :class="{
                                            'text-green-700': password.length > 7,
                                            'text-red-700': password
                                                .length <= 7
                                        }"
                                        class="font-medium text-sm ml-3"
                                        x-text="password.length > 7 ? 'The minimum length is reached' : 'Membutuhkan 8 huruf/angka untuk password' "></span>
                                </li>
                            </ul>
                        </div>
                        <button type="submit"
                            class="mt-3 text-lg font-semibold bg-green-800 w-full text-white rounded-lg px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
                            Daftar Akun
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#getInstansi').on('submit', function(event) {
                event.preventDefault();
                jQuery('#currentProv')[0].value = document.getElementById('provinsi').value;

                jQuery.ajax({
                    url: '/dataInstansi',
                    data: jQuery('#getInstansi').serialize(),
                    type: "GET",
                    success: function(result) {
                        var select = jQuery('#instansi');
                        console.log(jQuery('#instansi'));
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
