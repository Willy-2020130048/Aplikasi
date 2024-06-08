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
                                class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                                <!-- Input -->
                                <form method="GET" action="{{ route('pembayaran.index') }}">
                                    <label for="name"
                                           class="mb-2 text-sm font-medium text-primary-900 sr-only dark:text-white">Search</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                      stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                            </svg>
                                        </div>
                                        <input type="search" name="nama_akun" id="nama_akun"
                                               class="bg-white-600 block w-full p-4 ps-10 text-sm text-gray-400 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="Search Akun Plataran" required />
                                    </div>
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
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700 text-gray-800 dark:text-gray-300">
                                <thead class="bg-gray-50 dark:bg-neutral-800">
                                    <tr class="bg-white hover:bg-gray-50 dark:bg-gray-900 dark:hover:bg-neutral-800">
                                        <th scope="col" class="px-4 py-3 text-start">
                                            NIRA IPDI
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Nama Akun Plataran
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            NIK
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
                                            Nama Sponsor Acara
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Nama Sponsor User
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Bukti Pembayaran
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Verifikasi By
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
                                @foreach($pembayarans as $pembayaran)
                                    @php
                                        $row += 1;
                                    @endphp
                                    <tr class="hover:bg-gray-200 dark:bg-gray-900 dark:hover:bg-neutral-800 {{$row % 2 == 0 ? "bg-white": "bg-gray-100"}}">
                                        <td class="h-px w-40 min-w-20 align-top">
                                            <div class="flex items-center gap-x-4 p-4">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{$pembayaran->nira}}
                                                    </span>
                                            </div>
                                        </td>
                                        <td class="h-px w-40 min-w-40 align-top">
                                            <div class="flex items-center gap-x-4 p-4">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{$pembayaran->nama_akun}}
                                                    </span>
                                            </div>
                                        </td>
                                        <td class="h-px w-40 min-w-40 align-top">
                                            <div class="flex items-center gap-x-4 p-4">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{$pembayaran->no_ktp}}
                                                    </span>
                                            </div>
                                        </td>
                                        <td class="h-px w-40 min-w-40 align-top">
                                            <div class="flex items-center gap-x-4 p-4">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{$pembayaran->no_hp}}
                                                    </span>
                                            </div>
                                        </td>
                                        <td class="h-px w-40 min-w-40 align-top">
                                            <div class="flex items-center gap-x-4 p-4">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{$pembayaran->nama_unit}}
                                                    </span>
                                            </div>
                                        </td>
                                        <td class="h-px w-40 min-w-40 align-top">
                                            <div class="flex items-center gap-x-4 p-4">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{$pembayaran->name}}
                                                    </span>
                                            </div>
                                        </td>
                                        <td class="h-px w-40 min-w-40 align-top">
                                            <div class="flex items-center gap-x-4 p-4">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{$pembayaran->kota}}
                                                    </span>
                                            </div>
                                        </td>
                                        <td class="h-px w-40 min-w-40 align-top">
                                            <div class="flex items-center gap-x-4 p-4">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{$pembayaran->nama_acara}}
                                                    </span>
                                            </div>
                                        </td>
                                        <td class="h-px w-40 min-w-40 align-top">
                                            <div class="flex items-center gap-x-4 p-4">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{$pembayaran->id_detail}}
                                                    </span>
                                            </div>
                                        </td>
                                        <td class="h-px w-40 min-w-40 align-top">
                                            <div class="flex items-center gap-x-4 p-4">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{$pembayaran->sponsor}}
                                                    </span>
                                            </div>
                                        </td>
                                        <td class="h-px w-40 min-w-80 align-top">
                                            <div class="flex items-center gap-x-4 p-4">
                                                    @if ($pembayaran->bukti_pembayaran)
                                                        <img src="../storage/bukti_pembayaran{{ asset($pembayaran->bukti_pembayaran) }}" class="object-cover" onclick="openModal('../storage/bukti_pembayaran{{ asset($pembayaran->bukti_pembayaran) }}')">
                                                    @else
                                                        <label>Belum ada bukti pembayaran</label>
                                                    @endif
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap align-top">
                                            @if ($pembayaran->status == 'Telah Dikonfirmasi')
                                                <a class="block p-6" href="{{ route('pembayaran.unverify', $pembayaran->id) }}">
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
                                                <a class="block p-6" href="{{ route('pembayaran.verify', $pembayaran->id) }}">
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
                                                </a>
                                            @endif
                                        </td>
                                        <td class="h-px w-40 min-w-40 align-top">
                                            <div class="flex items-center gap-x-4 p-4">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{$pembayaran->verifikasi}}
                                                    </span>
                                            </div>
                                        </td>
                                        <td class="h-px w-40 min-w-40 align-top">
                                            <div class="flex items-center gap-x-4 p-4">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{$pembayaran->unverifikasi}}
                                                    </span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- End Table -->
                            <!-- Footer -->
                            <div
                                class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-neutral-700">
                                <div class="max-w-sm space-y-3">
                                    <select
                                        class="py-2 px-3 pe-9 block border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-neutral-700 dark:text-neutral-400">
                                        <option selected>5</option>
                                        <option>10</option>
                                        <option>20</option>
                                    </select>
                                </div>

                                <div>
                                    <div class="inline-flex gap-x-2">
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
                                    </div>
                                </div>
                            </div>
                            <!-- End Footer -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </div>
    </main>
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

