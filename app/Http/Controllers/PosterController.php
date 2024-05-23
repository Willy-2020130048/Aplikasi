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

        $acaras = DB::select("SELECT * FROM acaras WHERE id NOT IN (SELECT id_acara FROM detail_acaras WHERE id_peserta = ?)", [auth()->user()->id]);
        return view('pages.poster.index', compact('acaras'));
    }

    public function detail($id)
    {
        $acara = Acara::find($id);
        return view('pages.poster.detail', compact('acara'));
    }

    public function store(Request $request, $id)
    {
        $request->validate(
            [
                'nama_akun' => 'required',
                'bukti_pembayaran' => 'required',
            ]
        );
        $detail = new DetailAcara();
        $detail->id_acara = $id;
        $detail->id_peserta = auth()->user()->id;
        $detail->nama_akun = $request->nama_akun;
        if ($request->hasfile('bukti_pembayaran')) {
            $photo = $request->file('bukti_pembayaran');
            $photo->storeAs('public/bukti_pembayaran', $detail->id_peserta . '.' . $detail->id_acara . '.' . $photo->getClientOriginalExtension());
            $detail->bukti_pembayaran = $detail->id_peserta . '.' . $detail->id_acara . '.' . $photo->getClientOriginalExtension();
        }
        $detail->save();
        return redirect()->route('poster.index')->with('success', 'Registrasi acara berhasil.');
    }
}
