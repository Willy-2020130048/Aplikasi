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
        //
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
    public function update(Request $request, Instansi $instansi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instansi $instansi)
    {
        //
    }
}
