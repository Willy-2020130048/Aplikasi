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
        $dataInstansi = DB::table('ipdi_unit')->select('id', 'nama_unit')->when($request->input('currentProv') == null ? 11 : $request->input('currentProv'), function ($query, $provinsi) {
            return $query->where('id_propinsi', $provinsi);
        })->get();
        return $dataInstansi;
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
    public function show(Instansi $instansi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instansi $instansi)
    {
        //
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
