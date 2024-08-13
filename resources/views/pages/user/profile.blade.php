@extends('layouts.home')

@section('title', 'Edit Profile')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
@section('main')

<div class="w-full max-w-2xl bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-900 dark:border-gray-700">
    <div class="p-8 sm:pt-7">
        <div class="flex flex-col items-center justify-center">
            <div>
                <h1 class="m-4 text-xl font-bold">Kartu Anggota</h1>
            </div>
            <div class="w-[428px] h-[270px] bg-red-600 rounded-lg shadow-lg text-white p-3 relative overflow-hidden">
                <!-- Background Image -->
                <img src="http://localhost:8000/storage/Kartu.jpg" alt="Background" class="absolute inset-0 w-full h-full rounded-lg object-cover z-0 opacity-100" />

                <div class="flex p-8 mt-16 mx-auto w-full max-w-3xl relative z-10">
                    <div class="w-1/3 pr-4">
                        <img src="http://localhost:8000/storage/fotoYeyen Nurhaeni.jpg" alt="User Photo" class="w-full object-cover rounded-md">
                    </div>
                    <div class="w-2/3 text-xs mt-2">
                        <div class="flex">
                            <span class="font-semibold w-full">Nomor Anggota</span>
                            <span class="w-full">: {{auth()->user()->nira}}</span>
                        </div>
                        <div class="flex">
                            <span class="font-semibold w-full">Nama</span>
                            <span class="w-full">: {{auth()->user()->nama_lengkap}}</span>
                        </div>
                        <div class="flex">
                            <span class="font-semibold w-full">Instansi</span>
                            <span class="w-full">: {{auth()->user()->instansi}}</span>
                        </div>
                        <div class="flex">
                            <span class="font-semibold w-full">Propinsi</span>
                            <span class="w-full">: {{auth()->user()->propinsi}}</span>
                        </div>
                        <div class="flex">
                            <span class="font-semibold w-full">Masa Berlaku</span>
                            <span class="w-full">: 2020 - 2025</span>
                        </div>
                        {{-- <div class="flex mt-2">
                            <span class="w-full"></span>
                            <img src="" class="w-full h-12">
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
