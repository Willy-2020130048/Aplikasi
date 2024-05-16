<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreacaraRequest;
use App\Http\Requests\UpdateacaraRequest;
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
    public function store(StoreacaraRequest $request)
    {
        //
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
    public function update(UpdateacaraRequest $request, acara $acara)
    {
        //
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
