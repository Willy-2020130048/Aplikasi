<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\DetailAcara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosterController
{
    public function index(Request $request)
    {
        $acaras = DB::select("SELECT * FROM acaras WHERE id NOT IN (SELECT id_acara FROM detail_acaras WHERE id_peserta = ?) AND status != 'closed'", [auth()->user()->id]);
        return view('pages.poster.index', compact('acaras'));
    }

    public function detail($id)
    {
        if (auth()->user()->status == "tidak aktif") {
            return redirect('/');
        }
        $acara = Acara::find($id);
        return view('pages.poster.detail', compact('acara'));
    }

    public function store(Request $request, $id)
    {
        if (auth()->user()->status == "tidak aktif") {
            return redirect('/');
        }
        $request->validate(
            [
                'no_ktp' => 'required',
                'no_hp' => 'required',
                'nama_akun' => 'required',
                'bukti_pembayaran' => 'required',
                'kota' => 'required',
            ]
        );
        $check = DB::table('detail_acaras')->where("id_peserta", "=", auth()->user()->id)->where("id_acara", $id)->get();
        if (count($check) == 0) {
            $detail = new DetailAcara();
            $detail->id_acara = $id;
            $detail->no_ktp = $request->no_ktp;
            $detail->id_peserta = auth()->user()->id;
            $detail->nama_akun = $request->nama_akun;
            $detail->no_hp = $request->no_hp;
            if ($request->hasfile('bukti_pembayaran')) {
                $photo = $request->file('bukti_pembayaran');
                $photo->storeAs('public', $detail->id_peserta . '.' . $detail->id_acara . '.' . $photo->getClientOriginalExtension());
                $detail->bukti_pembayaran = $detail->id_peserta . '.' . $detail->id_acara . '.' . $photo->getClientOriginalExtension();
            }
            $detail->nip = $request->nip == null ? "-" : $request->nip;
            $detail->tipe_pegawai = $request->tipe_pegawai == null ? "-" : $request->tipe_pegawai;
            $detail->gelar = $request->gelar == null ? "-" : $request->gelar;
            $detail->golongan = $request->golongan == null ? "-" : $request->golongan;
            $detail->jabatan = $request->jabatan == null ? "-" : $request->jabatan;
            $detail->jenis_nakes = $request->jenis_nakes == null ? "-" : $request->jenis_nakes;
            $detail->kota = $request->kota;
            $detail->sponsor = $request->sponsor;
            $detail->catatan = " ";
            // $detail->save();
            return redirect()->route(auth()->user()->role . '.partisipasi')->with('success', 'Berhasil partisipasi acara.');
        } else {
            return redirect()->route(auth()->user()->role . '.partisipasi')->with('success', 'Anda sudah pernah mendaftar partisipasi acara.');
        }
    }
}
