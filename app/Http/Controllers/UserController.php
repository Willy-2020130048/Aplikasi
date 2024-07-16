<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Instansi;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function index(Request $request)
    {
        $users = DB::table('users')->select('users.*', 'ipdi_unit.nama_unit', 'reg_provinces.name')->join('reg_provinces', 'reg_provinces.id', '=', 'users.provinsi')->join('ipdi_unit', 'ipdi_unit.id', '=', 'users.instansi')->
        where('nama_lengkap', 'LIKE', '%' . $request->nama_lengkap . '%')->
        where('name', 'LIKE', '%' . $request->name . '%')->
        where('nama_unit', 'LIKE', '%' . $request->nama_unit . '%')->
        orderBy('users.id', 'desc')->paginate(30);
        $users->appends($request->all());
        return view('pages.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $dataProv = DB::table('reg_provinces')->select('id', 'name')->get();
        $dataInstansi = DB::table('ipdi_unit')->select('id','kode_unit','nama_unit')->when($request->input('currentProv') == null ? 11 : $request->input('currentProv'), function ($query, $provinsi) {
            return $query->where('id_propinsi', $provinsi);
        })->orderBy('nama_unit','asc')->get();
        return view('pages.user.create', compact('dataProv', 'dataInstansi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_str' => 'required|string',
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|unique:users,username',
            'jenis_kelamin' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'provinsi' => 'required',
            'instansi' => 'required',
            'password' => 'required|string',
        ]);

        User::create([
            'no_str' => $request->no_str,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'username' => $request->username,
            'email' => $request->email,
            'provinsi' => $request->provinsi,
            'instansi' => $request->instansi,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route(auth()->user()->role . '_user.index');
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

    public function changepassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = User::find(auth()->user()->id);
        $user->password = $request->password;
        $user->save();
        return redirect()->route(auth()->user()->role)->with('success', "berhasil mengganti password");
    }

    public function resetpassword($id)
    {
        $user = User::find($id);
        $text = fake()->text(8);
        $user->password = Hash::make('p@ssw0rd');
        $user->save();
        return redirect()->route(auth()->user()->role . '_user.index')->with('success', "Password berhasil direset menjadi (p@ssw0rd)");
    }

    public function verify($id)
    {
        $countId = DB::select("SELECT Max(RIGHT(nira,6)) as maxID FROM users WHERE nira != :nira", ['nira' => "belum terverifikasi"]);
        $currentID = (int)$countId[0]->maxID + 1;
        $user = User::find($id);
        $instansi = DB::table('ipdi_unit')->where('id', $user->instansi)->get();
        $user->status = 'terverifikasi';
        $user->nira = $user->provinsi . "." . $instansi[0]->kode_unit . "." . ($user->jenis_kelamin == 'Perempuan' ? '2' : '1') . "." . str_pad($currentID, 6, "0", STR_PAD_LEFT);;
        $user->username = $user->nira;
        $user->save();
        return redirect()->route(auth()->user()->role . '_user.index')->with('success', 'Pengguna berhasil diverifikasi.');
    }

    public function unverify($id)
    {
        $user = User::find($id);
        $user->status = 'menunggu';
        $user->nira = 'Belum Terverifikasi';
        $user->save();
        return redirect()->route(auth()->user()->role . '_user.index')->with('success', 'Pengguna batal diverifikasi.');
    }

    public function showProfile(AuthUser $user)
    {
        $dataProv = DB::table('reg_provinces')->select('id', 'name')->where('id', auth()->user()->provinsi)->get();
        $dataInstansi = DB::table('ipdi_unit')->select('id','kode_unit','nama_unit')->where('id', auth()->user()->instansi)->get();
        return view('pages.user.profile', compact('dataProv', 'dataInstansi'));
    }

    public function update(Request $request)
    {
        $user = User::find(auth()->user()->id);
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
                'jenis_kelamin' => 'required',
                'email' => 'required',
                'provinsi' => 'required',
                'instansi' => 'required',
            ]
        );
        if ($request->hasfile('foto')) {
            $photo = $request->file('foto');
            $photo->storeAs('public', 'foto' . $user->username . '.' . $photo->getClientOriginalExtension());
            $user->foto = 'foto' . $user->username . '.' . $photo->getClientOriginalExtension();
        }
        $user->no_str = $request->no_str == null ? '' : $request->no_str;
        $user->nama_lengkap = $request->nama_lengkap == null ? '' : $request->nama_lengkap;
        $user->jenis_kelamin = $request->jenis_kelamin == null ? '' : $request->jenis_kelamin;
        $user->tempat_lahir = $request->tempat_lahir == null ? '' : $request->tempat_lahir;;
        if ($request->tanggal_lahir) {
            $user->tanggal_lahir = $request->tanggal_lahir == null ? '' : $request->tanggal_lahir;
        }

        $user->agama = $request->agama == null ? '' : $request->agama;
        $user->alamat = $request->alamat == null ? '' : $request->alamat;
        $user->kode_pos = $request->kode_pos == null ? '' : $request->kode_pos;
        $user->email = $request->email == null ? '' : $request->email;
        $user->no_hp = $request->no_hp == null ? '' : $request->no_hp;
        $user->pendidikan = $request->pendidikan == null ? '' : $request->pendidikan;
        $user->provinsi = $request->provinsi == null ? '' : $request->provinsi;
        $user->instansi = $request->instansi == null ? '' : $request->instansi;
        $user->hd = $request->hd == null ? '' : $request->hd;
        $user->dialisis = $request->dialisis == null ? '' : $request->dialisis;
        $user->capd = $request->capd == null ? '' : $request->capd;
        $user->username = $request->username;
        $user->provinsi = $request->provinsi == null ? '' : $request->provinsi;
        $user->save();
        return redirect()->route(auth()->user()->role)->with('success', 'User updated succesfully.');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route(auth()->user()->role . '_user.index')->with('success', 'User berhasil terhapus.');
    }

}
