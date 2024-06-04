<?php

namespace App\Http\Controllers;

use App\Models\DetailAcara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailAcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pembayarans = DB::table('detail_acaras')->select('detail_acaras.*','users.nira', 'users.no_hp', 'reg_provinces.name', 'ipdi_unit.nama_unit', 'acaras.id_detail', 'acaras.nama_acara')
            ->join('users', 'users.id', "=", "detail_acaras.id_peserta")
            ->join('acaras', 'acaras.id', "=", "detail_acaras.id_acara")
            ->join('ipdi_unit', 'ipdi_unit.id', "=", "users.instansi")
            ->join('reg_provinces', 'reg_provinces.id', "=", "users.provinsi")
            ->when($request->input('nama_akun'), function ($query, $name) {
                return $query->where('nama_akun', 'like', '%' . $name . '%');
            })->orderBy('id', 'desc')->paginate(10);
        return view('pages.pembayaran.index', compact('pembayarans'));
    }

    public function verify($id)
    {
        $pembayaran = DetailAcara::find($id);
        $pembayaran->status = 'terverifikasi';
        $pembayaran->verifikasi = auth()->user()->nama_lengkap;
        $pembayaran->save();
        return redirect('/admin/pembayaran')->with('success', 'pembayaran berhasil diverifikasi.');
    }

    public function unverify($id)
    {
        $pembayaran = DetailAcara::find($id);
        $pembayaran->status = 'Belum Verifikasi';
        $pembayaran->unverifikasi = auth()->user()->nama_lengkap;
        $pembayaran->save();
        return redirect('/admin/pembayaran')->with('success', 'pembayaran batal diverifikasi.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailAcara $detailAcara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailAcara $detailAcara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailAcara $detailAcara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailAcara $detailAcara)
    {
        //
    }
}
