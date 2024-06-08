@extends('layouts.home')

@section('title', 'Daftar Partisipasi Acara')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
@section('main')

    <div
        class="mt-8 w-full max-w-4xl relative z-10 bg-white border rounded-xl md:p-10 dark:bg-gray-950 dark:border-neutral-800">
        <h3 class="text-3xl font-bold text-gray-800 dark:text-neutral-200 text-center">{{ $acara->nama_acara }}</h3>
        <div class="text-md text-gray-800 dark:text-neutral-200 text-center">({{ $acara->jenis_acara }})</div>
        <div class="mt-8 text-md text-gray-800 dark:text-neutral-200">{{ $acara->deskripsi_acara }}</div>
        <div class="mt-4 text-md text-gray-800 dark:text-neutral-200">Tanggal:
            {{ $acara->tgl_mulai == $acara->tgl_selesai ? date('d/m/Y', strtotime($acara->tgl_mulai)) : date('d/m/Y', strtotime($acara->tgl_mulai)) . ' sampai ' . date('d/m/Y', strtotime($acara->tgl_selesai)) }}
        </div>
        <div class="mt-4 text-md text-gray-800 dark:text-neutral-200">Pengelola: {{ $acara->pengelola }}</div>
        <div class="mt-4 text-md text-gray-800 dark:text-neutral-200">Tempat: {{ $acara->tempat }}
            ({{ $acara->status }})
        </div>
        <div class="mt-5">
            <span class="text-xl font-bold text-gray-800 dark:text-neutral-200">Rp.
                {{ number_format($acara->harga_acara) }}</span>
        </div>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('poster.store', $acara->id) }}" class="mt-8 w-full max-w-4xl"
        enctype="multipart/form-data">
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
                <label>*Daftar akun plataran <a href="https://satusehat.kemkes.go.id" class="text-red-600">di sini</a></label>
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
                    <input placeholder="Sponsor" type="text" name="sponsor"
                           class="text-md block px-3 py-2 rounded-lg w-full
        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
        dark:bg-gray-800 dark:text-white dark:border-gray-800 focus:dark:bg-gray-700">
                </div>
                @error('sponsor')
                <div class="text-red-600">
                    {{ $message }}
                </div>
                @enderror

                <div class="mx-auto max-w-lg ">
                    <div class="py-1">
                        <span class="px-1 text-sm text-gray-600 dark:text-gray-200">Workshop</span>
                        <select
                            class="text-md block px-2 py-2 rounded-lg w-full
                            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none"
                            name="workshop" id="workshop">
                            @php
                                $list = explode("-" , $acara->workshop);
                            @endphp
                            @foreach ($list as $workshop)
                                    <option value="{{ $workshop }}">
                                        {{ $workshop }}
                                    </option>
                            @endforeach
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
                <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" value="{{ auth()->user()->foto }}"
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
    <!-- End Form -->
    </div>
    </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#getInstansi').on('submit', function(event) {
                event.preventDefault();
                jQuery('#currentProv')[0].value = document.getElementById('provinsi').value;

                jQuery.ajax({
                    url: '/dataInstansi',
                    data: jQuery('#getInstansi').serialize(),
                    type: "GET",
                    success: function(result) {
                        var select = jQuery('#instansi');
                        console.log(jQuery('#instansi'));
                        select.empty();
                        result.forEach(function(item) {
                            var option = jQuery('<option>', {
                                value: item.id,
                                text: item.nama_unit
                            });
                            select.append(option);
                        });
                    },

                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        // Handle error
                    }
                });

            })
        });

        function formSubmit() {
            $('#getInstansi').submit();
        }
    </script>
@endsection
