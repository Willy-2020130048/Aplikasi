@extends('layouts.auth')

@section('title', 'recovery')

@section('main')

    <div
        class="lg:w-1/3 md:w-3/5 w-9/10 mt-7 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <div class="p-4 sm:p-7">
            <div class="text-center">
                <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Lupa Password?</h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Sudah bisa login?
                    <a class="text-blue-600 decoration-2 hover:underline font-medium" href="/">
                        Masuk di sini
                    </a>
                </p>
            </div>

            <div class="mt-5">
                <!-- Form -->
                <form method="POST" action="{{ route('user.sendpassword')}}">
                    @method("POST")
                    @csrf
                    <div class="grid gap-y-4">
                        <!-- Form Group -->
                        <div>
                            <label for="email" class="block text-sm mb-2 dark:text-white">Email address</label>
                            <div class="relative">
                                <input type="email" id="email" name="email"
                                    class="py-3 px-4 w-full rounded-lg text-sm border-2">
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <button type="submit"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Reset
                            Password</button>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>

@endsection
