<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function index(Request $request)
    {
        $users = DB::table('users')->when($request->input('name'), function ($query, $name) {
            return $query->where('nama_lengkap', 'like', '%' . $name . '%');
        })->orderBy('id', 'desc')->paginate(10);
        return view('pages.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $dataProv = DB::table('reg_provinces')->select('id', 'name')->get();
        $dataInstansi = DB::table('ipdi_unit')->select('id', 'nama_unit')->when($request->input('currentProv') == null ? 11 : $request->input('currentProv'), function ($query, $provinsi) {
            return $query->where('id_propinsi', $provinsi);
        })->get();
        return view('pages.user.create', compact('dataProv', 'dataInstansi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    public function edit(AuthUser $user)
    {
        return view('pages.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function verify($id)
    {
        $user = User::find($id);
        $user->status = 'terverifikasi';
        $user->save();
        return redirect('/admin/user')->with('success', 'Pengguna berhasil diverifikasi.');
    }

    public function unverify($id)
    {
        $user = User::find($id);
        $user->status = 'menunggu';
        $user->save();
        return redirect('/admin/user')->with('success', 'Pengguna batal diverifikasi.');
    }

    public function showProfile(AuthUser $user)
    {
        return view('pages.user.profile');
    }

    public function update(Request $request, AuthUser $user)
    {
        if ($user->email != $request->email) {
            $request->validate(['email' => 'required|email|unique:users,email',]);
        }
        if ($user->username != $request->username) {
            $request->validate(['username' => 'required|unique:users,username',]);
        }

        $request->validate(
            [
                'no_str' => 'required',
                'nama_lengkap' => 'required',
                'username' => 'required',
                'jenis_kelamin' => 'required',
                'email' => 'required',
                'provinsi' => 'required',
                'instansi' => 'required',
            ]
        );
        if ($request->hasfile('foto')) {
            $photo = $request->file('foto');
            $photo->storeAs('public/foto', $user->username . '.' . $photo->getClientOriginalExtension());
            $user->foto = $user->username . '.' . $photo->getClientOriginalExtension();
        }

        $user->no_str = $request->no_str;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->tempat_lahir = $request->tempat_lahir;
        if($request->tanggal_lahir){
            $user->tanggal_lahir = $request->tanggal_lahir;
        }
        $user->agama = $request->agama;
        $user->alamat = $request->alamat;
        $user->kode_pos = $request->kode_pos;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->pendidikan = $request->pendidikan;
        $user->provinsi = $request->provinsi;
        $user->instansi = $request->instansi;
        $user->hd = $request->hd;
        $user->dialisis = $request->dialisis;
        $user->capd = $request->capd;
        $user->provinsi = $request->provinsi;
        $user->save();

        return redirect('/')->with('success', 'User updated succesfully.');
        //
    }

    public function destroy($id)
    {
        //
    }
}
