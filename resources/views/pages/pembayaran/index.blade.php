@extends('layouts.home')

@section('title', 'HomePage')

@section('main')
    <main class = "w-full flex flex-col items-center">
        <div id="imageModal" class="fixed hidden max-w-4xl border-2">
            <span class="absolute top-px right-px text-red-600 text-4xl cursor-pointer" onclick="closeModal()">&times;</span>
            <img id="modalImage" src="" alt="Modal Image" class="max-w-full max-h-full">
        </div>

        <div class="w-full px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <!-- Card -->
            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div
                            class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-gray-900 dark:border-neutral-700">
                            <!-- Header -->
                            <div
                                class="px-6 pt-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-neutral-700">
                                <div class="flex flex-col md:flex-row gap-4">
                                    <div class="p-4 flex-1">
                                        <p>Jumlah pembayaran yang telah diverifikasi: {{$data['verified']}}</p>
                                        <p>Jumlah pembayaran yang belum diverifikasi: {{$data['unverified']}}</p>
                                    </div>
                                    @if(auth()->user()->role == 'admin' || (auth()->user()->role == 'acaraverifikator' && auth()->user()->id_admin == '200'))
                                    <div class="p-4 flex items-center gap-x-4">
                                        <a href="{{ route(auth()->user()->role . '.pembayaran.export') }}">
                                            <button
                                                class="text-sm font-semibold bg-blue-600 text-white rounded-lg px-4 py-3 block shadow-xl hover:text-white hover:bg-black">
                                                Export Data Excel
                                            </button>
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div
                                class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                                <!-- Input -->
                                <form method="GET" action="{{ route(auth()->user()->role . '_pembayaran.index') }}" class="flex flex-row p-4">
                                    <div class="px-2">
                                        <label for="nomor" class="block text-sm mb-2 dark:text-white">Nomor Pendaftaran</label>
                                        <input type="search" name="nomor" id="nomor" value=" "
                                            class="border-2 border-blue-900 bg-white-600 block w-full p-4 ps-10 text-sm text-gray-400 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Search Nama Acara" required />
                                    </div>
                                    <div class="px-2">
                                        <label for="nama_acara" class="block text-sm mb-2 dark:text-white">Nama Acara</label>
                                        <input type="search" name="nama_acara" id="nama_acara" value=" "
                                            class="border-2 border-blue-900 bg-white-600 block w-full p-4 ps-10 text-sm text-gray-400 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Search Nama Acara" required />
                                    </div>
                                    <div class="px-2">
                                        <label for="instansi" class="block text-sm mb-2 dark:text-white">Instansi</label>
                                        <input type="search" name="instansi" id="instansi" value=" "
                                            class="border-2 border-blue-900 bg-white-600 block w-full p-4 ps-10 text-sm text-gray-400 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Search Nama Instansi" required />
                                    </div>
                                    <div class="px-2">
                                        <label for="kota" class="block text-sm mb-2 dark:text-white">Kabupaten/Kota</label>
                                        <input type="search" name="kota" id="kota" value=" "
                                            class="border-2 border-blue-900 bg-white-600 block w-full p-4 ps-10 text-sm text-gray-400 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Search Nama Kota" required />
                                    </div>
                                    <div class="px-2">
                                        <label for="nama_lengkap" class="block text-sm mb-2 dark:text-white">Nama Lengkap</label>
                                        <input type="search" name="nama_lengkap" id="nama_lengkap" value=" "
                                            class="border-2 border-blue-900 bg-white-600 block w-full p-4 ps-10 text-sm text-gray-400 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Search Nama" required />
                                    </div>
                                    <div class="px-2">
                                        <label for="nira" class="block text-sm mb-2 dark:text-white">Nira</label>
                                        <input type="search" name="nira" id="nira" value=" "
                                            class="border-2 border-blue-900 bg-white-600 block w-full p-4 ps-10 text-sm text-gray-400 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Search Nira" required />
                                    </div>
                                    <button type="submit" class="text-sm font-semibold border-2 text-black rounded-lg mx-6 px-6 py-3 hover:text-white hover:bg-black">
                                            Search
                                    </button>
                                </form>

                                <!-- End Input -->

                                <div class="sm:col-span-2 md:grow">
                                    <div class="flex justify-end gap-x-2">
                                        <div class="hs-dropdown [--placement:bottom-right] relative inline-block"
                                            data-hs-dropdown-auto-close="inside">
                                            <button id="hs-as-table-table-filter-dropdown" type="button"
                                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">
                                                <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M3 6h18" />
                                                    <path d="M7 12h10" />
                                                    <path d="M10 18h4" />
                                                </svg>
                                                Filter
                                                <span
                                                    class="ps-2 text-xs font-semibold text-blue-600 border-s border-gray-200 dark:border-neutral-700 dark:text-blue-500">
                                                    1
                                                </span>
                                            </button>
                                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-10 bg-white shadow-md rounded-lg mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                                                aria-labelledby="hs-as-table-table-filter-dropdown">
                                                <div class="divide-y divide-gray-200 dark:divide-neutral-700">
                                                    <label for="hs-as-filters-dropdown-all" class="flex py-2.5 px-3">
                                                        <input type="checkbox"
                                                            class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                            id="hs-as-filters-dropdown-all" checked>
                                                        <span
                                                            class="ms-3 text-sm text-gray-800 dark:text-neutral-200">All</span>
                                                    </label>
                                                    <label for="hs-as-filters-dropdown-published" class="flex py-2.5 px-3">
                                                        <input type="checkbox"
                                                            class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                            id="hs-as-filters-dropdown-published">
                                                        <span
                                                            class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Published</span>
                                                    </label>
                                                    <label for="hs-as-filters-dropdown-pending" class="flex py-2.5 px-3">
                                                        <input type="checkbox"
                                                            class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                            id="hs-as-filters-dropdown-pending">
                                                        <span
                                                            class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Pending</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Header -->
                            <!-- Table -->
                            <table
                                class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700 text-gray-800 dark:text-gray-300">
                                <thead class="bg-gray-50 dark:bg-neutral-800">
                                    <tr class="bg-white hover:bg-gray-50 dark:bg-gray-900 dark:hover:bg-neutral-800">
                                        <th scope="col" class="px-4 py-3 text-start">
                                            NIRA IPDI
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Kode Pendaftaran
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Nama Lengkap
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Nomor HP
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Asal Instansi
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Asal PW
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Kabupaten/Kota
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Nama Acara
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Bukti Pembayaran
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Status Verifikasi
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Status Kehadiran
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Send Email
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Edit Data
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Delete
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Nama Akun Plataran
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            NIK
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Nama Sponsor User
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Verifikasi By
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Catatan Verifikasi
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Unverifikasi By
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                    @php
                                        $row = 0;
                                    @endphp
                                    @foreach ($pembayarans as $pembayaran)
                                        @php
                                            $row += 1;
                                        @endphp
                                        <tr
                                            class="hover:bg-gray-200 dark:bg-gray-900 dark:hover:bg-neutral-800 {{ $row % 2 == 0 ? 'bg-white' : 'bg-gray-100' }}">
                                            <td class="h-px w-30 min-w-30 align-top">
                                                <div class="flex items-center gap-x-4 p-2">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{ $pembayaran->nira }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="h-px w-30 min-w-30 align-top">
                                                <div class="flex items-center gap-x-4 p-2">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{$pembayaran->jenis_acara == "Workshop" ? "WS" : "Sim"}}{{$pembayaran->workshop == "Audit Klinis Dialisis" ? "1AKD" : ""}}{{$pembayaran->workshop == "Health Technology Dialisis" ? "2HTD" : ""}}{{$pembayaran->workshop == "CAPD" ? "3CAPD" : ""}}{{ $pembayaran->id}}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="h-px w-30 min-w-30 align-top">
                                                <div class="flex items-center gap-x-4 p-2">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{ $pembayaran->nama_lengkap }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="h-px w-30 min-w-30 align-top">
                                                <div class="flex items-center gap-x-4 p-2">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{ $pembayaran->no_hp }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="h-px w-30 min-w-30 align-top">
                                                <div class="flex items-center gap-x-4 p-2">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{ $pembayaran->nama_unit }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="h-px w-30 min-w-30 align-top">
                                                <div class="flex items-center gap-x-4 p-2">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{ $pembayaran->name }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="h-px w-30 min-w-30 align-top">
                                                <div class="flex items-center gap-x-4 p-2">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{ $pembayaran->kota }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="h-px w-60 min-w-60 align-top">
                                                <div class="flex items-center gap-x-4 p-2">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{ $pembayaran->nama_acara }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap h-px w-30 min-w-30 align-top">
                                                <div class="flex items-center gap-x-4 p-2">
                                                    @if ($pembayaran->bukti_pembayaran)
                                                        <a href="../storage/{{$pembayaran->bukti_pembayaran}}" target="_blank">
                                                            <button class="text-sm font-semibold bg-blue-600 text-white rounded-lg px-4 py-3 block shadow-xl hover:text-white hover:bg-black">
                                                            @if (Str::endsWith($pembayaran->bukti_pembayaran, '.pdf'))
                                                                View Pdf
                                                                @else
                                                                View Images
                                                                @endif
                                                            </button>
                                                        </a>
                                                    {{-- <img src="../storage{{ asset($pembayaran->bukti_pembayaran) }}"
                                                            class="object-cover"
                                                            onclick="openModal('../storage{{ asset($pembayaran->bukti_pembayaran) }}')"> --}}
                                                    @else
                                                        <label>Belum ada bukti pembayaran</label>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="size-px whitespace-nowrap align-top">
                                                @if ($pembayaran->status == 'Telah Dikonfirmasi')
                                                    <a class="block py-6 pr-6"
                                                        href="{{ route(auth()->user()->role . '.pembayaran.unverify', $pembayaran->id) }}">
                                                        <span
                                                            class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                                            <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                                width="16" height="16" fill="currentColor"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                            </svg>
                                                            {{ $pembayaran->status }}
                                                        </span>
                                                    </a>
                                                @else
                                                <button class="block py-6 pr-6" onclick="openModalVerify('modelConfirm', '{{$pembayaran->id}}')">
                                                        <span
                                                            class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full dark:bg-red-500/10 dark:text-red-500">
                                                            <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                                width="16" height="16" fill="currentColor"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                            </svg>
                                                            {{ $pembayaran->status }}
                                                        </span>
                                                </button>
                                                @endif
                                            </td>
                                            <td class="size-px whitespace-nowrap align-top">
                                                @if ($pembayaran->status_kehadiran == 'Telah Dikonfirmasi')
                                                    <a class="block py-6 pr-6"
                                                        href="{{ route(auth()->user()->role . '.kehadiran.unverify', $pembayaran->id) }}">
                                                        <span
                                                            class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                                            <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                                width="16" height="16" fill="currentColor"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                            </svg>
                                                            {{ $pembayaran->status_kehadiran }}
                                                        </span>
                                                    </a>
                                                @else
                                                    <a class="block py-6 pr-6"
                                                        href="{{ route(auth()->user()->role . '.kehadiran.verify', $pembayaran->id) }}">
                                                        <span
                                                            class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full dark:bg-red-500/10 dark:text-red-500">
                                                            <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                                width="16" height="16" fill="currentColor"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                            </svg>
                                                            {{ $pembayaran->status_kehadiran }}
                                                        </span>
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="whitespace-nowrap align-top w-30 min-w-30">
                                                <div class="flex items-center gap-x-4 p-2">
                                                    <a href="{{ route(auth()->user()->role . '.kehadiran.sendEmail', $pembayaran->id) }}">
                                                        <button
                                                            class="text-sm font-semibold bg-blue-600 text-white rounded-lg px-4 py-3 block shadow-xl hover:text-white hover:bg-black">
                                                            Send Email
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap h-px w-30 min-w-30 align-top">
                                                <div class="flex items-center gap-x-4 p-2">
                                                    <a href="{{ route(auth()->user()->role . '_pembayaran.edit', $pembayaran->id) }}">
                                                        <button
                                                            class="text-sm font-semibold bg-blue-600 text-white rounded-lg px-4 py-3 block shadow-xl hover:text-white hover:bg-black">
                                                            Edit Data
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="size-px whitespace-nowrap align-top">
                                                <div class="flex items-center gap-x-4 p-2">
                                                    <form
                                                        action="{{ route(auth()->user()->role . '_pembayaran.destroy', $pembayaran->id) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="text-sm font-semibold bg-red-600 text-white rounded-lg px-4 py-3 block shadow-xl hover:text-white hover:bg-black">
                                                            Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="h-px w-30 min-w-30 align-top">
                                                <div class="flex items-center gap-x-4 p-2">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{ $pembayaran->nama_akun }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="h-px w-30 min-w-30 align-top">
                                                <div class="flex items-center gap-x-4 p-2">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{ $pembayaran->no_ktp }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="h-px w-30 min-w-30 align-top">
                                                <div class="flex items-center gap-x-4 p-2">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{ $pembayaran->sponsor }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="h-px w-30 min-w-30 align-top">
                                                <div class="flex items-center gap-x-4 p-2">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{ $pembayaran->verifikasi }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="h-px w-80 min-w-80 align-top">
                                                <div class="flex items-center gap-x-4 p-2">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{ $pembayaran->catatan }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="h-px w-30 min-w-30 align-top">
                                                <div class="flex items-center gap-x-4 p-2">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{ $pembayaran->unverifikasi }}
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table -->
                            <!-- End Footer -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->
            <div class="inline-flex gap-x-2 fixed left-8 bottom-8 z-50 bg-red-500 p-4 rounded-xl">
                <a href="{{ $pembayarans->previousPageUrl() }}">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="m15 18-6-6 6-6" />
                        </svg>
                        Prev
                    </button>
                </a>

                <a href="{{ $pembayarans->nextPageUrl() }}">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">
                        Next
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </button>
                </a>
            </div>
        </div>
        <div id="modelConfirm" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
            <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">
                <div class="flex justify-end p-2">
                    <button onclick="closeModalVerify('modelConfirm')" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <div class="p-6 pt-0 text-center">
                   <form method="POST" id="verifyForm" name="verifyForm" action="#" class="mt-8">
                       @method('PUT')
                       @csrf
                    <h3 class="text-xl font-normal text-black-500 mt-5 mb-6">Verifikasi Partisipasi Acara</h3>
                    <div class="text-left">
                       <span class="px-1 text-md text-gray-600 dark:text-gray-200">Catatan</span>
                       <textarea placeholder="Catatan" name="catatan"
                           class="min-h-40 text-md block px-3 rounded-lg w-full
               bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
               dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700"></textarea>
                   </div>
                   @error('no_hp')
                       <div class="text-red-600">
                           {{ $message }}
                       </div>
                   @enderror
                    <a href="" onclick="closeModalVerify('modelConfirm')"
                        class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base m-8 px-4 py-2.5 text-center"
                        data-modal-toggle="delete-user-modal">
                        Batal
                    </a>
                    <button type="submit" onclick="closeModalVerify('modelConfirm')"
                       class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-base inline-flex items-center m-8 px-4 py-2.5 text-center mr-2">
                       Verifikasi
                    </button>
                   </form>
                </div>
            </div>
        </div>

        <script type="text/javascript">
         window.openModalVerify = function(modalId,idPembayaran) {
            document.getElementById(modalId).style.display = 'block'
            document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
            const form = document.getElementById('verifyForm');
            form.action = "{{ route(auth()->user()->role . '.pembayaran.verify', ':idPembayaran') }}".replace(':idPembayaran', idPembayaran);
         }

         window.closeModalVerify = function(modalId) {
             document.getElementById(modalId).style.display = 'none'
             document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
         }
     </script>

    <script>
        function openModal(imageUrl) {
            document.getElementById('modalImage').src = imageUrl;
            document.getElementById('imageModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('imageModal').classList.add('hidden');
        }
    </script>
@endsection
