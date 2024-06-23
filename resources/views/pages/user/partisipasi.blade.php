@extends('layouts.home')

@section('title', 'HomePage')

@section('main')
    <main class = "w-full flex flex-col items-center">

        <div
            class="mt-8 w-full max-w-4xl relative bg-white border rounded-xl md:p-10 dark:bg-gray-950 dark:border-neutral-800">
            <p class="text-center text-xl font-bold dark:text-gray-300">Daftar Acara Yang Telah Dipartisipasi</p>
        </div>

        @foreach ($acaras as $acara)
            <div
                class="mt-8 w-full max-w-4xl relative bg-white border rounded-xl md:p-10 dark:bg-gray-950 dark:border-neutral-800">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-neutral-200 text-center">{{ $acara->nama_acara }}</h3>
                <div class="text-md text-gray-800 dark:text-neutral-200 text-center">({{ $acara->jenis_acara }})</div>
                <div class="mt-8 text-md text-gray-800 dark:text-neutral-200">{{ $acara->deskripsi_acara }}</div>
                <div class="mt-8 text-md text-gray-800 dark:text-neutral-200">Workshop: {{ $acara->workshopuser }}</div>
                <div class="mt-4 text-md text-gray-800 dark:text-neutral-200">Tanggal:
                    {{ $acara->tgl_mulai == $acara->tgl_selesai ? date('d/m/Y', strtotime($acara->tgl_mulai)) : date('d/m/Y', strtotime($acara->tgl_mulai)) . ' sampai ' . date('d/m/Y', strtotime($acara->tgl_selesai)) }}
                </div>
                <div class="mt-4 text-md text-gray-800 dark:text-neutral-200">Tempat: {{ $acara->tempat }}
                    ({{ $acara->status }})
                </div>
                <div class="mt-5">
                    <span
                        class="text-xl font-bold {{ $acara->statusacara == 'Belum Dikonfirmasi' ? 'text-red-600' : 'text-green-600' }}">{{ $acara->statusacara }}</span>
                </div>
                <div class="mt-4 text-md text-gray-800 font-bold dark:text-neutral-200">Data Partisipan</div>
                <div class="mt-4 text-md text-gray-800 dark:text-neutral-200">Nomor KTP:
                    ({{ $acara->status }})
                </div>
                <div class="mt-4 text-md text-gray-800 dark:text-neutral-200">Akun Plataran:
                    ({{ $acara->status }})
                </div>
                <div class="mt-4 text-md text-gray-800 dark:text-neutral-200">Asal Kota:
                    ({{ $acara->status }})
                </div>
                <div class="mt-4 text-md text-gray-800 dark:text-neutral-200">Sponsor:
                    ({{ $acara->status }})
                </div>
                <div class="mt-5">
                    <span class="text-xl font-bold text-gray-800 dark:text-neutral-200">Rp.
                        {{ number_format($acara->harga_acara) }}</span>
                </div>
            </div>
            <!-- End Card -->
        @endforeach
    </main>
@endsection
