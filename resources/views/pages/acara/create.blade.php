@extends('layouts.home')

@section('title', 'Create Acara')
@section('main')

    <div
        class="lg:w-1/3 md:w-3/5 w-9/10 mt-7 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-slate-900 dark:border-gray-700">
        <div class="p-4 sm:p-7">
            <div class="text-center">
                <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Daftar Acara</h1>
            </div>
            <div class="mt-5">
                <!-- Form -->
                <form method="POST" action="{{ route(auth()->user()->role . '_acara.store') }}" class="mt-8">
                    @csrf
                    <div class="mx-auto max-w-lg ">
                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Nama Acara
                            </span>
                            <input placeholder="" type="text" name="nama_acara"
                                class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('nama_acara')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Tanggal Mulai
                            </span>
                            <input placeholder="" type="date" name="tgl_mulai"
                                class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('tgl_mulai')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Tanggal Selesai
                            </span>
                            <input placeholder="" type="date" name="tgl_selesai"
                                class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('tgl_selesai')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Jenis Acara
                            </span>
                            <input placeholder="" type="text" name="jenis_acara"
                                class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('jenis_acara')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror


                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Workshop Acara
                            </span>
                            <div class="flex items-center p-1">
                                <input name="Audit" type="checkbox" value="Audit Klinis Dialisis"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checked-checkbox"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Audit Klinis
                                    Dialisis</label>
                            </div>
                            <div class="flex items-center p-1">
                                <input name="Health" type="checkbox" value="Health Technology Dialisis"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checked-checkbox"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Health Technology
                                    Dialisis</label>
                            </div>
                            <div class="flex items-center p-1">
                                <input name="CAPD" type="checkbox" value="CAPD"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checked-checkbox"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">CAPD</label>
                            </div>
                        </div>
                        @error('workshop')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Deskripsi Acara
                            </span>
                            <input placeholder="" type="text" name="deskripsi_acara"
                                class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('deskripsi_acara')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Harga
                            </span>
                            <input placeholder="" type="number" name="harga_acara"
                                class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('harga_acara')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Online / Offline
                            </span>
                            <input placeholder="" type="text" name="status"
                                class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('status')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Lokasi Acara
                            </span>
                            <input placeholder="" type="text" name="tempat"
                                class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('tempat')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Pengelola
                            </span>
                            <input placeholder="" type="text" name="pengelola"
                                class="text-md block px-3 py-2 rounded-lg w-full
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                        </div>
                        @error('pengelola')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Sponsor
                            </span>
                            <select
                                class="text-md block px-2 py-2 rounded-lg w-full
                            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none"
                                name="sponsor" id="sponsor">
                                <option value="PT. Sinar Roda Utama/SRU (Nipro)">PT. Sinar Roda Utama/SRU (Nipro)</option>
                                <option value="PT. Fresenius Medical Care/FMC (Fresenius, CAPD)">PT. Fresenius Medical
                                    Care/FMC (Fresenius, CAPD)</option>
                                <option value="PT. Tawada Healthcare (Gambro)">PT. Tawada Healthcare (Gambro)</option>
                                <option value="PT. Renalmed Tirta Utama/RTU (Bellco/Nikisho)">PT. Renalmed Tirta Utama/RTU
                                    (Bellco/Nikisho)</option>
                                <option value="PT. B.Braun Medical Indonesia/BMI (Bbraun)">PT. B.Braun Medical
                                    Indonesia/BMI (Bbraun)</option>
                                <option value="PT. Mendjangan (JoyHealth/JiHua)">PT. Mendjangan (JoyHealth/JiHua)</option>
                                <option value="PT. Sifa Anugrah Sehati (SWS)">PT. Sifa Anugrah Sehati (SWS)</option>
                                <option value="PT. Interskala (MKCells)">PT. Interskala (MKCells)</option>
                                <option value="PT. Binsa (Renalpro)">PT. Binsa (Renalpro)</option>
                                <option value="PT. Kalbe Farma (Hemapo, Nephrisol-D, CAPD)">PT. Kalbe Farma (Hemapo,
                                    Nephrisol-D, CAPD)</option>
                                <option value="PT. Daewong Pharmaceutical (Epodion)">PT. Daewong Pharmaceutical (Epodion)
                                </option>
                                <option value="PT. Etana (Renogen)">PT. Etana (Renogen)</option>
                                <option value="PT. Wellesta (Recormon, Mircera)">PT. Wellesta (Recormon, Mircera)</option>
                                <option value="PT. Sanbe Farma (Neurosanbe)">PT. Sanbe Farma (Neurosanbe)</option>
                                <option value="PT. Aventis Farma (Lovenox)">PT. Aventis Farma (Lovenox)</option>
                                <option value="PT. Fahrenheit (Inviclot)">PT. Fahrenheit (Inviclot)</option>
                                <option value="PT. Transmedic (Renatron, Jafron, Citralock)">PT. Transmedic (Renatron,
                                    Jafron, Citralock)</option>
                                <option value="PT. Eisai Indonesia (Methycobal)">PT. Eisai Indonesia (Methycobal)</option>
                                <option value="PT. P&G (Neurobion)">PT. P&G (Neurobion)</option>
                                <option value="PT. ABN">PT. ABN</option>
                                <option value="Abrahamed">Abrahamed</option>
                                <option value="Lainnya">Lainnya </option>
                            </select>
                        </div>
                        @error('sponsor')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror

                        <button type="submit"
                            class="mt-3 text-lg font-semibold bg-green-800 w-full text-white rounded-lg px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
                            Daftar Acara
                        </button>
                        <a href="{{ route(auth()->user()->role . '_acara.index') }}"
                            class="mt-3 text-lg text-center font-semibold bg-red-600 w-full text-white rounded-lg px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
