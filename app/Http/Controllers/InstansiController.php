<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dataInstansi = DB::table('ipdi_unit')
        ->select('ipdi_unit.*','reg_provinces.name')
        ->join('reg_provinces', 'reg_provinces.id', "=", "ipdi_unit.id_propinsi")
        ->where('nama_unit', 'LIKE', '%' . $request->nama_unit . '%')
        ->where('name', 'LIKE', '%' . $request->name . '%')
        ->orderBy('kode_unit','asc')->paginate(30);
        return view('pages.instansi.index', compact('dataInstansi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataProv = DB::table('reg_provinces')->select('id', 'name')->get();
        return view('pages.instansi.create', compact('dataProv'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_unit',
                'id_propinsi',
                'id_pw',
            ]
        );
        $dataInstansi = DB::select("SELECT Max(RIGHT(kode_unit,3)) as maxID FROM ipdi_unit WHERE id_propinsi = :id_propinsi", ['id_propinsi' => $request->id_propinsi]);
        $currentID = (int)$dataInstansi[0]->maxID + 1;

            $newObject = new Instansi();
            $newObject->kode_unit = str_pad($currentID, 3, "0", STR_PAD_LEFT);
            $newObject->nama_unit = $request->nama_unit;
            $newObject->id_propinsi = $request->id_propinsi;
            $newObject->id_pw = $request->id_pw;
            $newObject->alamat = $request->alamat == null ? '' : $request->alamat;
            $newObject->no_telp = $request->no_telp == null ? '' : $request->no_telp;
            $newObject->email = $request->email == null ? '' : $request->email;
            $newObject->save();
            return redirect()->route(auth()->user()->role . '_instansi.index')->with('success', 'Berhasil menambahkan data instansi.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Instansi $instansi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $instansi = Instansi::find($id);
        $dataProv = DB::table('reg_provinces')->select('id', 'name')->get();
        return view('pages.instansi.edit', compact('instansi','dataProv'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama_unit',
                'id_propinsi',
                'id_pw',
            ]
        );
        $instansi = Instansi::find($id);
            $instansi->kode_unit = $request->kode_unit;
            $instansi->nama_unit = $request->nama_unit;
            $instansi->id_propinsi = $request->id_propinsi;
            $instansi->id_pw = $request->id_pw;
            $instansi->alamat = $request->alamat;
            $instansi->no_telp = $request->no_telp;
            $instansi->email = $request->email;
            $instansi->save();
        return redirect()->route(auth()->user()->role . '_instansi.index')->with('success', 'Berhasil mengubah data instansi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $instansi = Instansi::find($id);
        $instansi->delete();
        return redirect()->route(auth()->user()->role . '_instansi.index')->with('success', 'Berhasil menghapus instansi.');
    }
}
