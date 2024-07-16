@extends('layouts.auth')

@section('title', 'Instansi')
@section('main')

    <div
        class="lg:w-1/3 md:w-3/5 w-9/10 mt-7 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <div class="p-4 sm:p-7">
            <div class="text-center">
                <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Tambah Instansi</h1>
            </div>
            <div class="mt-5">
                <!-- Form -->
                <form id="goRegister" method="POST" action="{{ route(auth()->user()->role . '_instansi.store') }}"
                    class="mt-8">
                    @csrf
                    <div class="mx-auto max-w-lg ">
                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Kode Unit
                            </span>
                            <input placeholder="" type="text" name="kode_unit"
                                class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('kode_unit')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Nama Unit
                            </span>
                            <input placeholder="" type="text" name="nama_unit"
                                class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('nama_unit')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">ID PW</span>
                            <select
                                class="text-md block px-2 py-2 rounded-lg w-full
                        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none"
                                name="id_pw" id="id_pw" onchange="formSubmit()">
                                @foreach ($dataProv as $prov)
                                    <option value="{{ $prov->id }}">
                                        {{ $prov->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('id_pw')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">ID Propinsi</span>
                            <select
                                class="text-md block px-2 py-2 rounded-lg w-full
                        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none"
                                name="id_propinsi" id="id_propinsi" onchange="formSubmit()">
                                @foreach ($dataProv as $prov)
                                    <option value="{{ $prov->id }}">
                                        {{ $prov->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('id_propinsi')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Alamat</span>
                            <input placeholder="" type="alamat" name="alamat"
                                class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('alamat')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Nomor Telp</span>
                            <input placeholder="" type="no_telp" name="no_telp"
                                class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('no_telp')
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
                        
                        <button type="submit"
                            class="mt-3 text-lg font-semibold bg-green-800 w-full text-white rounded-lg px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
                            Daftar Instansi
                        </button>
                        <a href="{{ route(auth()->user()->role . '_instansi.index') }}"
                            class="mt-3 text-lg text-center font-semibold bg-red-600 w-full text-white rounded-lg px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
