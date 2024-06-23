@extends('layouts.home')

@section('title', 'HomePage')

@section('main')
    <main class = "w-full flex flex-col items-center">
        <div class="w-full bg-red-700">
            <div class="max-w-[85rem] px-4 py-4 sm:px-6 lg:px-8 mx-auto">
                <div class="text-center md:text-center">
                    <p class="text-xl font-bold text-white/80 uppercase tracking-wider">
                        Perhatian !!!
                    </p>
                    <p class="mt-1 text-white font-medium">
                        Pastikan profile dan email telah diubah menjadi yang terbaru untuk pengumuman lebih lanjut.
                    </p>
                    <p class="mt-1 text-white font-medium">
                        Profile dan email dapat diubah disebelah kanan atas.
                    </p>
                </div>
            </div>
        </div>
        <div class="w-full px-20 py-4 mx-auto">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($acaras as $acara)
                    <div
                        class="mt-8 w-full max-w-4xl relative bg-white border rounded-xl md:p-10 dark:bg-gray-950 dark:border-neutral-800 bg">
                        <div>
                            <img src="../storage/acara.jpg" class="object-cover w-full">
                        </div>
                        <h3 class="mt-8 text-2xl font-bold text-gray-800 dark:text-neutral-200 text-center">
                            {{ $acara->nama_acara }}
                        </h3>
                        <div class="text-md text-gray-800 dark:text-neutral-200 text-center">({{ $acara->jenis_acara }})
                        </div>
                        {{-- <div class="mt-8 text-md text-gray-800 dark:text-neutral-200">{{ $acara->deskripsi_acara }}</div> --}}
                        {{-- <div class="mt-8 text-md text-gray-800 dark:text-neutral-200">Workshop: {{ $acara->workshop }}</div> --}}
                        <div class="mt-4 text-md text-gray-800 dark:text-neutral-200">Tanggal:
                            {{ $acara->tgl_mulai == $acara->tgl_selesai ? date('d/m/Y', strtotime($acara->tgl_mulai)) : date('d/m/Y', strtotime($acara->tgl_mulai)) . ' sampai ' . date('d/m/Y', strtotime($acara->tgl_selesai)) }}
                        </div>
                        {{-- <div class="mt-4 text-md text-gray-800 dark:text-neutral-200">Pengelola: {{ $acara->pengelola }}</div>
                <div class="mt-4 text-md text-gray-800 dark:text-neutral-200">Tempat: {{ $acara->tempat }}
                    ({{ $acara->status }})
                </div> --}}
                        <div class="mt-5">
                            <span class="text-xl font-bold text-gray-800 dark:text-neutral-200">Rp.
                                {{ number_format($acara->harga_acara) }}</span>
                        </div>

                        <div class="mt-5 grid grid-cols-1 gap-x-4 py-4 first:pt-0 last:pb-0">
                            <div class="flex justify-end">
                                <a href="{{ route(auth()->user()->role . '.poster.detail', $acara->id) }}">
                                    <button type="button"
                                        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-neutral-800 dark:text-white dark:hover:bg-neutral-800">Daftar
                                        Partisipasi</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
