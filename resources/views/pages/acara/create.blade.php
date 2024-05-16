@extends('layouts.home')

@section('title', 'Create Acara')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
@section('main')

    <div
        class="lg:w-1/3 md:w-3/5 w-9/10 mt-7 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-slate-900 dark:border-gray-700">
        <div class="p-4 sm:p-7">
            <div class="text-center">
                <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Daftar Acara</h1>
            </div>

            <div>
                <form id="getInstansi" class="mt-8" hidden>
                    <input id="currentProv" name="currentProv">
                </form>
            </div>
            <div class="mt-5">
                <!-- Form -->
                <form id="goRegister" method="POST" action="{{ route('acara.store') }}" class="mt-8" x-data="{ password: '', password_confirm: '' }">
                    @csrf
                    <div class="mx-auto max-w-lg ">
                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Nama Acara
                            </span>
                            <input placeholder="" type="text" name="nama_acara"
                                   class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('nama_acara')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Jenis Acara
                            </span>
                            <input placeholder="" type="text" name="jenis_acara"
                                   class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('jenis_acara')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Deskripsi Acara
                            </span>
                            <input placeholder="" type="text" name="deskripsi_acara"
                                   class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('deskripsi')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Harga
                            </span>
                            <input placeholder="" type="number" name="harga_acara"
                                   class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('harga')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Online / Offline
                            </span>
                            <input placeholder="" type="text" name="status"
                                   class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('status')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Lokasi Acara
                            </span>
                            <input placeholder="" type="text" name="tempat"
                                   class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('tempat')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Pengelola
                            </span>
                            <input placeholder="" type="text" name="pengelola"
                                   class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('pengelola')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                        @enderror
                        <button type="submit"
                                class="mt-3 text-lg font-semibold bg-green-800 w-full text-white rounded-lg px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
                            Daftar Acara
                        </button>
                        <a href="{{route('acara.index')}}"
                           class="mt-3 text-lg text-center font-semibold bg-red-600 w-full text-white rounded-lg px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
