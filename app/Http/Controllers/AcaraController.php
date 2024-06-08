<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $acaras = DB::table('acaras')->when($request->input('name'), function ($query, $name) {
            return $query->where('nama_acara', 'like', '%' . $name . '%');
        })->orderBy('id', 'desc')->paginate(10);
        return view('pages.acara.index', compact('acaras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.acara.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_acara' => 'required',
                'tgl_mulai' => 'required',
                'tgl_selesai' => 'required',
                'jenis_acara' => 'required',
                'deskripsi_acara' => 'required',
                'harga_acara' => 'required|integer',
                'status' => 'required',
                'tempat' => 'required',
                'pengelola' => 'required',
            ]
        );
        $acara = new Acara();
        $acara->nama_acara = $request->nama_acara;
        $acara->tgl_mulai = $request->tgl_mulai;
        $acara->tgl_selesai = $request->tgl_selesai;
        $acara->jenis_acara = $request->jenis_acara;
        $acara->deskripsi_acara = $request->deskripsi_acara;
        $acara->harga_acara = $request->harga_acara;
        $acara->status = $request->status;
        $acara->tempat = $request->tempat;
        $acara->pengelola = $request->pengelola;
        $acara->id_detail = $request->sponsor;
        $acara->workshop = ($request->Audit == null ? "" : $request->Audit."-") . ($request->Health == null ? "" : $request->Health."-") . ($request->CAPD == null ? "" : $request->CAPD);
        if(substr($acara->workshop, -1) == "-"){
            $acara->workshop = substr_replace($acara->workshop, "", -1);
        }
        $acara->save();
        return redirect()->route('acara.index')->with('success', 'Acara berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(acara $acara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $acara = Acara::find($id);
        return view('pages.acara.edit', compact('acara'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama_acara' => 'required',
                'tgl_mulai' => 'required',
                'tgl_selesai' => 'required',
                'jenis_acara' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required|integer',
                'status' => 'required',
                'tempat' => 'required',
                'pengelola' => 'required',
            ]
        );

        $acara = Acara::find($id);
        $acara->nama_acara = $request->nama_acara;
        $acara->tgl_mulai = $request->tgl_mulai;
        $acara->tgl_selesai = $request->tgl_selesai;
        $acara->jenis_acara = $request->jenis_acara;
        $acara->deskripsi_acara = $request->deskripsi;
        $acara->harga_acara = $request->harga;
        $acara->status = $request->status;
        $acara->tempat = $request->tempat;
        $acara->pengelola = $request->pengelola;
        $acara->id_detail = $request->sponsor;
        $acara->workshop = $request->workshop;
        $acara->save();
        return redirect()->route('acara.index')->with('success', 'Acara berhasil dibuat.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $acara = Acara::find($id);
        $acara->delete();
        return redirect()->route('acara.index');
    }
}
