@extends('layouts.home')

@section('title', 'Edit Profile')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
@section('main')

    <div
        class="lg:w-1/3 md:w-3/5 w-9/10 mt-7 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-900 dark:border-gray-700">
        <div class="p-4 sm:p-7">
            <div class="text-center">
                <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Ganti Password</h1>
            </div>
            <!-- Form -->
            <form method="POST" action="{{ route(auth()->user()->role == 'user' ? 'users.changepassword' : 'admin.changepassword', auth()->user()->id) }}" class="mt-8"
                x-data="{ password: '', password_confirm: '' }">
                @csrf
                @method('PUT')
                {{-- <div class ="py-1">
                    <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Password Sekarang</span>
                    <input placeholder="" type="password" name="current_password"
                        class="text-md block px-3 py-2 rounded-lg w-full
    bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                </div>
                @error('password')
                    <div class="text-red-600">
                        {{ $message }}
                    </div>
                @enderror --}}
                @if ($message = Session::get('notvalid'))
                <div class="text-red-600">
                    {{ $message }}
                </div>
                @endif
                <div class ="py-1">
                    <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Password Baru</span>
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
                    <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Ulangi Password Baru</span>
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
                                    <path x-show="password.length > 7" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                    <path x-show="password.length <= 7" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />

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
                    Ganti Password
                </button>
                <a href="/"
                    class="mt-3 text-lg text-center font-semibold bg-red-600 w-full text-white rounded-lg px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
                    Batal
                </a>
        </div>
        </form>
        <!-- End Form -->
    </div>
    </div>
@endsection
