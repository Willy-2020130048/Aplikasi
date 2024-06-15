@extends('layouts.home')

@section('title', 'Daftar Partisipasi Acara')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
@section('main')

    <div
        class="mt-8 w-full max-w-4xl relative z-10 bg-white border rounded-xl md:p-10 dark:bg-gray-950 dark:border-neutral-800">
        <div>
            <img src="../storage/acara.jpeg" class="object-cover w-full">
        </div>
        <h3 class="text-3xl font-bold text-gray-800 dark:text-neutral-200 text-center">{{ $acara->nama_acara }}</h3>
        <div class="text-md text-gray-800 dark:text-neutral-200 text-center">({{ $acara->jenis_acara }})</div>
        {{-- <div class="mt-8 text-md text-gray-800 dark:text-neutral-200">{{ $acara->deskripsi_acara }}</div>
        <div class="mt-8 text-md text-gray-800 dark:text-neutral-200">Workshop: {{ $acara->workshop }}</div> --}}
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
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route(auth()->user()->role . '.poster.store', $acara->id) }}"
        class="mt-8 w-full max-w-4xl" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="mx-auto max-w-lg ">
            <div class="py-1">
                <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Nomor KTP</span>
                <input placeholder="Nomor KTP" type="text" name="no_ktp"
                    class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
            </div>
            @error('no_ktp')
                <div class="text-red-600">
                    {{ $message }}
                </div>
            @enderror
            <div class="mx-auto max-w-lg ">
                <div class="py-1">
                    <span class="px-1 text-sm text-gray-600 dark:text-gray-200">NIP / NPR</span>
                    <input placeholder="NIP / NPR" type="text" name="nip"
                        class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
                </div>
                @error('nip')
                    <div class="text-red-600">
                        {{ $message }}
                    </div>
                @enderror

                <div class="py-1">
                    <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Nama Akun Plataran</span>
                    <input placeholder="Akun Plataran" type="text" name="nama_akun"
                        class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
                    <label>*Daftar akun plataran <a href="https://lms.kemkes.go.id/" class="text-red-600">di
                            sini</a></label>
                </div>
                @error('nama_akun')
                    <div class="text-red-600">
                        {{ $message }}
                    </div>
                @enderror

                <div class="py-1">
                    <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Kabupaten / Kota</span>
                    <input placeholder="Kabupaten / Kota " type="text" name="kota"
                        class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
                </div>
                @error('kota')
                    <div class="text-red-600">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mx-auto max-w-lg ">
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Sponsor</span>
                        <select
                            class="text-md block px-2 py-2 rounded-lg w-full
                            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none"
                            name="sponsor" id="sponsor">
                            <option value="PT. Sinar Roda Utama/SRU (Nipro)">PT. Sinar Roda Utama/SRU (Nipro)</option>
                            <option value="PT. Fresenius Medical Care/FMC (Fresenius, CAPD)">PT. Fresenius Medical Care/FMC
                                (Fresenius, CAPD)</option>
                            <option value="PT. Tawada Healthcare (Gambro)">PT. Tawada Healthcare (Gambro)</option>
                            <option value="PT. Renalmed Tirta Utama/RTU (Bellco/Nikisho)">PT. Renalmed Tirta Utama/RTU
                                (Bellco/Nikisho)</option>
                            <option value="PT. B.Braun Medical Indonesia/BMI (Bbraun)">PT. B.Braun Medical Indonesia/BMI
                                (Bbraun)</option>
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
                            <option value="PT. Transmedic (Renatron, Jafron, Citralock)">PT. Transmedic (Renatron, Jafron,
                                Citralock)</option>
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

                    <div class="mx-auto max-w-lg ">
                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Workshop</span>
                            <select @if ($acara->workshop == null) disabled @endif
                                class="text-md block px-2 py-2 rounded-lg w-full
                            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none"
                                name="workshop" id="workshop">
                                @php
                                    $list = explode('-', $acara->workshop);
                                @endphp
                                @foreach ($list as $workshop)
                                    <option value="{{ $workshop }}">
                                        {{ $workshop }}
                                    </option>
                                @endforeach
                                @if ($acara->workshop == null)
                                    {
                                    <option value="Tidak ada" selected>
                                        Tidak ada workshop
                                    </option>
                                    }
                                @endif
                            </select>
                        </div>
                        @error('sponsor')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror

                        {{--
            <div class="py-1">
                <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Tipe Pegawai</span>
                <input placeholder="Non ASN" type="text" name="tipe_pegawai"
                       class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
            </div>
            @error('tipe_pegawai')
            <div class="text-red-600">
                {{ $message }}
            </div>
            @enderror

            <div class="py-1">
                <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Gelar</span>
                <input placeholder="S.Kom" type="text" name="gelar"
                       class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
            </div>
            @error('gelar')
            <div class="text-red-600">
                {{ $message }}
            </div>
            @enderror

            <div class="py-1">
                <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Pangkat / Golongan</span>
                <input placeholder="" type="text" name="golongan"
                       class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
            </div>
            @error('golongan')
            <div class="text-red-600">
                {{ $message }}
            </div>
            @enderror

            <div class="py-1">
                <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Jenis Nakes</span>
                <input placeholder="" type="text" name="jenis_nakes"
                       class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
            </div>
            @error('jenis_nakes')
            <div class="text-red-600">
                {{ $message }}
            </div>
            @enderror

            <div class="py-1">
                <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Jabatan</span>
                <input placeholder="" type="text" name="jabatan"
                       class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
            </div>
            @error('jabatan')
            <div class="text-red-600">
                {{ $message }}
            </div>
            @enderror --}}

                        <div class="py-1">
                            <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Bukti Pembayaran</span>
                            <input type="file" name="bukti_pembayaran" id="bukti_pembayaran"
                                value="{{ auth()->user()->foto }}"
                                class="text-md block px-3 py-2 rounded-lg w-full
bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
                        </div>
                        @error('bukti_pembayaran')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror
                        <button type="submit"
                            class="mt-3 text-lg font-semibold bg-green-800 w-full text-white rounded-lg px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
                            Pendaftaran Acara
                        </button>
                        <a href="/acara"
                            class="mt-3 text-lg text-center font-semibold bg-red-600 w-full text-white rounded-lg px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
                            Batal
                        </a>
                    </div>
    </form>
@endsection
