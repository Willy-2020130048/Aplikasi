@extends('layouts.home')

@section('title', 'HomePage')

@section('main')
    <main class = "w-full p-4 flex flex-col items-center">
        <div class="w-full px-4 sm:px-6 lg:px-8 bg-red-600 shadow-lg shadow-red dark:bg-red-900 rounded-xl">
            <div class="flex flex-row p-4">
                <p class="text-xl text-white tracking-wider font-bold inline-flex items-center">
                    Instansi
                </p>
                <div class="px-8 w-full flex items-center justify-end gap-2">
                    <a href="{{ route(auth()->user()->role . '_instansi.create') }}">
                        <button type="button"
                            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-2 text-white hover:bg-red-900 disabled:opacity-50 disabled:pointer-events-none">
                            Tambah Instansi
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <!-- Table Section -->
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
                                <form method="GET" action="{{ route(auth()->user()->role . '_instansi.index')}}" class="flex flex-row p-4">
                                    <div class="px-2">
                                        <label for="nama_unit" class="block text-sm mb-2 dark:text-white">Nama Unit</label>
                                        <input type="search" name="nama_unit" id="nama_unit" value=" "
                                            class="bg-white-600 block w-full p-4 ps-10 text-sm text-gray-400 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Search Nama" required />
                                    </div>
                                    <div class="px-2">
                                        <label for="name" class="block text-sm mb-2 dark:text-white">Provinsi</label>
                                        <input type="search" name="name" id="name" value=" "
                                            class="bg-white-600 block w-full p-4 ps-10 text-sm text-gray-400 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Search Provinsi" required />
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
                                            Kode Unit
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Nama Unit
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Nama Propinsi
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Alamat
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Nomor Telp
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Email
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-start">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                    @php
                                        $row = 0;
                                    @endphp
                                    @foreach ($dataInstansi as $instansi)
                                        @php
                                            $row += 1;
                                        @endphp
                                        <tr
                                            class="hover:bg-gray-200 dark:bg-gray-900 dark:hover:bg-neutral-800 {{ $row % 2 == 0 ? 'bg-white' : 'bg-gray-100' }}">
                                            <td class="h-px w-40 min-w-40 align-top">
                                                <div class="flex items-center gap-x-4 p-4">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{ $instansi->kode_unit }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="h-px w-40 min-w-40 align-top">
                                                <div class="flex items-center gap-x-4 p-4">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{ $instansi->nama_unit }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="h-px w-40 min-w-80 align-top">
                                                <div class="flex items-center gap-x-4 p-4">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{ $instansi->name }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="h-px w-40 min-w-40 align-top">
                                                <div class="flex items-center gap-x-4 p-4">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{ $instansi->alamat }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="h-px w-40 min-w-40 align-top">
                                                <div class="flex items-center gap-x-4 p-4">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{ $instansi->no_telp }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="h-px w-40 min-w-40 align-top">
                                                <div class="flex items-center gap-x-4 p-4">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{ $instansi->email }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="h-px w-40 min-w-40 align-top">
                                                <div class="flex items-center gap-x-4 p-4">
                                                    <a
                                                        href="{{ route(auth()->user()->role . '_instansi.edit', $instansi->id) }}">
                                                        <button class="text-green-600">Edit</button>
                                                    </a>
                                                    <form
                                                        action="{{ route(auth()->user()->role . '_instansi.destroy', $instansi->id) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="text-red-600">Delete</button>
                                                    </form>
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

                                <div>
                                    <div class="inline-flex gap-x-2">
                                        <a href="{{ $dataInstansi->previousPageUrl() }}">
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

                                        <a href="{{ $dataInstansi->nextPageUrl() }}">
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
                            </div>
                            <!-- End Footer -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Table Section -->
    </main>
@endsection
