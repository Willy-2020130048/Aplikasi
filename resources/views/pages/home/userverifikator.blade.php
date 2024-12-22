@extends('layouts.home')

@section('title', 'HomePage')

@section('main')
    <main class="w-full">
        <!-- Announcement Banner -->
        <div class="w-full bg-red-500">
            <div class="max-w-[85rem] px-4 py-4 sm:px-6 lg:px-8 mx-auto">
                <!-- Grid -->
                <div class="grid justify-center md:grid-cols-2 md:justify-between md:items-center gap-2">
                    <div class="text-center md:text-start">
                        <p class="text-4xl text-white">Perwakilan PW (Infokom)</p>
                    </div>
                </div>
                <!-- End Grid -->
            </div>
        </div>
        @if (auth()->user()->status == "tidak aktif")
        <div class="w-full bg-red-700">
            <div class="max-w-[85rem] px-4 py-4 sm:px-6 lg:px-8 mx-auto">
                <div class="text-center md:text-center">
                    <p class="text-xl font-bold text-white/80 uppercase tracking-wider">
                        Perhatian !!!
                    </p>
                    <p class="mt-1 text-white font-medium">
                        Akun anda sudah tidak aktif, silahkan hubungi infokom untuk mengaktifkan kembali.
                    </p>
                </div>
            </div>
        </div>
        @endif
        <!-- End Announcement Banner -->
        <!-- Card Blog -->
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <!-- Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card -->
                <div
                    class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-slate-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                    <div class="h-60 flex flex-col justify-center items-center bg-rose-500 rounded-t-xl">
                        <svg class="size-28" width="56" height="56" viewBox="0 0 56 56" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect width="56" height="56" rx="10" fill="white" />
                            <g clip-path="url(#clip0_2204_541)">
                                <path
                                    d="M37.0409 28.8697C33.1968 28.8697 30.0811 31.9854 30.0811 35.8288C30.0811 39.6726 33.1968 42.789 37.0409 42.789C40.8843 42.789 44 39.6726 44 35.8288C44 31.9854 40.8843 28.8697 37.0409 28.8697ZM18.9594 28.8701C15.116 28.8704 12 31.9854 12 35.8292C12 39.6726 15.116 42.7886 18.9594 42.7886C22.8032 42.7886 25.9192 39.6726 25.9192 35.8292C25.9192 31.9854 22.8032 28.8701 18.9591 28.8701H18.9594ZM34.9595 20.1704C34.9595 24.0138 31.8438 27.1305 28.0004 27.1305C24.1563 27.1305 21.0406 24.0138 21.0406 20.1704C21.0406 16.3269 24.1563 13.2109 28.0003 13.2109C31.8438 13.2109 34.9591 16.3269 34.9591 20.1704H34.9595Z"
                                    fill="url(#paint0_radial_2204_541)" />
                            </g>
                            <defs>
                                <radialGradient id="paint0_radial_2204_541" cx="0" cy="0" r="1"
                                    gradientUnits="userSpaceOnUse"
                                    gradientTransform="translate(28.0043 29.3944) scale(21.216 19.6102)">
                                    <stop offset="0%" stop-color="#FFB900" />
                                    <stop offset="0.6" stop-color="#F95D8F" />
                                    <stop offset="0.999" stop-color="#F95353" />
                                </radialGradient>
                                <clipPath id="clip0_2204_541">
                                    <rect width="32" height="29.5808" fill="white"
                                        transform="translate(12 13.2096)" />
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div class="p-4 md:p-6">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-neutral-300 dark:hover:text-white">
                            Manajemen Pengguna Website
                        </h3>
                        <p class="mt-3 text-gray-500 dark:text-neutral-500">
                            Pengaturan pengguna website
                        </p>
                    </div>
                    <div
                        class="mt-auto flex border-t border-gray-200 divide-x divide-gray-200 dark:border-neutral-700 dark:divide-neutral-700">
                        <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-es-xl bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800"
                            href="{{ route(auth()->user()->role . '_user.index', '') }}">
                            Klik untuk mengatur pengguna
                        </a>
                    </div>
                </div>
                <!-- End Card -->
                <!-- Card -->
                <div
                    class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-gray-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                    <div class="h-80 flex flex-col justify-center items-center rounded-t-xl">
                        <img src="../storage/Logo2.png" class="object-cover h-60 rounded-t-xl">
                    </div>
                    <div class="p-4 md:p-6">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-neutral-200 dark:hover:text-white">
                            Identitas Pengguna
                        </h3>
                        <p class="mt-3 text-gray-500 dark:text-neutral-300">
                            Data diri pengguna
                        </p>
                    </div>
                    <div
                        class="mt-auto flex border-t border-gray-200 divide-x divide-gray-200 dark:border-neutral-700 dark:divide-neutral-700">
                        <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-es-xl bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800"
                            href="{{ route('userverifikator.profile') }}">
                            Lihat Profile
                        </a>
                    </div>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div
                    class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-gray-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                    <div class="h-full flex flex-col justify-center items-center rounded-t-xl">
                        <img src="../storage/Logo2.png" class="object-cover h-60 rounded-t-xl">
                    </div>
                    <div class="p-4 md:p-6">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-neutral-200 dark:hover:text-white">
                            Acara
                        </h3>
                        <p class="mt-3 text-gray-500 dark:text-neutral-300">
                            List acara yang sedang berlangsung
                        </p>
                    </div>
                    <div
                        class="mt-auto flex border-t border-gray-200 divide-x divide-gray-200 dark:border-neutral-700 dark:divide-neutral-700">
                        <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-es-xl bg-white shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800"
                            href="{{ route(auth()->user()->role . '.poster.index', '') }}">
                            Partisipasi Acara
                        </a>
                    </div>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div
                    class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-gray-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                    <div class="h-80 flex flex-col justify-center items-center rounded-t-xl">
                        <img src="../storage/Logo2.png" class="object-cover h-60 rounded-t-xl">
                    </div>
                    <div class="p-4 md:p-6">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-neutral-200 dark:hover:text-white">
                            Daftar acara yang telah diikuti
                        </h3>
                        <p class="mt-3 text-gray-500 dark:text-neutral-300">
                            List acara yang telah diikuti
                        </p>
                    </div>
                    <div
                        class="mt-auto flex border-t border-gray-200 divide-x divide-gray-200 dark:border-neutral-700 dark:divide-neutral-700">
                        <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-es-xl bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800"
                            href="{{ route(auth()->user()->role . '.partisipasi') }}">
                            Lihat acara
                        </a>
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Grid -->
        </div>
        <!-- End Card Blog -->
    </main>
@endsection
