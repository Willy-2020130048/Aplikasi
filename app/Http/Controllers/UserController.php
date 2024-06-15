<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $users = DB::table('users')->join('reg_provinces', 'reg_provinces.id', '=', 'users.provinsi')->join('ipdi_unit', 'ipdi_unit.id', '=', 'users.instansi')->where('role', '=', 'user')->when($request->input('name'), function ($query, $name) {
            return $query->whereAny([
                'nama_lengkap',
                'name',
                'nama_unit',
            ], 'LIKE', '%' . $name . '%');
        })->orderBy('users.id', 'desc')->paginate(10);


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

    public function changepassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = User::find(auth()->user()->id);
        $user->password = $request->password;
        $user->save();
        return redirect(auth()->user()->role == 'user' ? '/' : '/admin')->with('success', "berhasil mengganti password");
    }

    public function resetpassword($id)
    {
        $user = User::find($id);
        $text = fake()->text(8);
        $user->password = Hash::make('password');
        $user->save();
        return redirect('/admin/user')->with('success', "Password berhasil direset menjadi (password)");
    }

    public function verify($id)
    {
        $countId = DB::select("SELECT Max(RIGHT(nira,6)) as maxID FROM users WHERE nira != :nira", ['nira' => "belum terverifikasi"]);
        $currentID = (int)$countId[0]->maxID + 1;
        $user = User::find($id);
        $user->status = 'terverifikasi';
        $user->nira = $user->provinsi . "." . $user->instansi . "." . ($user->jenis_kelamin == 'Perempuan' ? '2' : '1') . "." . str_pad($currentID, 6, "0", STR_PAD_LEFT);;
        $user->save();
        return redirect('/admin/user')->with('success', 'Pengguna berhasil diverifikasi.');
    }

    public function unverify($id)
    {
        $user = User::find($id);
        $user->status = 'menunggu';
        $user->nira = 'Belum Terverifikasi';
        $user->save();
        return redirect('/admin/user')->with('success', 'Pengguna batal diverifikasi.');
    }

    public function showProfile(AuthUser $user)
    {
        $dataProv = DB::table('reg_provinces')->select('id', 'name')->where('id', auth()->user()->provinsi)->get();
        $dataInstansi = DB::table('ipdi_unit')->select('id', 'nama_unit')->where('id', auth()->user()->instansi)->get();
        return view('pages.user.profile', compact('dataProv', 'dataInstansi'));
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

        switch (auth()->user()->role) {
            case "user":
                return redirect('/')->with('success', 'User updated succesfully.');
                break;
            case "admin":
                return redirect('/admin')->with('success', 'User updated succesfully.');
                break;
            case "userverifikator":
                return redirect('/userverifikator')->with('success', 'User updated succesfully.');
                break;
            case "acaraverifikator":
                return redirect('/acaraverifikator')->with('success', 'User updated succesfully.');
                break;
            default:
        }
    }

    public function destroy($id)
    {
        //
    }
}
