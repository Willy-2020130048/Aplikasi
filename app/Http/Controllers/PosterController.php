<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosterController
{
    public function index(Request $request)
    {
        $acaras = DB::table('acaras')->when($request->input('name'), function ($query, $name) {
            return $query->where('nama_acara', 'like', '%' . $name . '%');
        })->orderBy('id', 'desc')->paginate(10);
        return view('pages.poster.index', compact('acaras'));
    }

    public function detail($id)
    {

    }
}
