<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use App\Models\Acara;
use App\Models\DetailAcara;
use App\Models\Instansi;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class DetailAcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = DB::table('detail_acaras')->select('detail_acaras.*', 'users.nama_lengkap', 'users.nira', 'reg_provinces.name', 'ipdi_unit.nama_unit', 'acaras.workshop', 'acaras.jenis_acara', 'acaras.id_detail', 'acaras.nama_acara')
            ->join('users', 'users.id', "=", "detail_acaras.id_peserta")
            ->join('acaras', 'acaras.id', "=", "detail_acaras.id_acara")
            ->join('ipdi_unit', 'ipdi_unit.id', "=", "users.instansi")
            ->join('reg_provinces', 'reg_provinces.id', "=", "users.provinsi")
            ->where('nama_lengkap', 'LIKE', '%' . $request->nama_lengkap . '%')
            ->where('nira', 'LIKE', '%' . $request->nira . '%')
            ->where('nama_acara', 'LIKE', '%' . $request->nama_acara . '%')
            ->where('kota', 'LIKE', '%' . $request->kota . '%')
            ->where('ipdi_unit.nama_unit', 'LIKE', '%' . $request->instansi . '%')
            ->orderBy('status', 'desc');

            $verified = clone $query;
            $verified->where('detail_acaras.status', '=', 'Telah Dikonfirmasi');

            $unverified = clone $query;
            $unverified->where('detail_acaras.status', '!=', 'Telah Dikonfirmasi');

            $data = [
                'verified' => $verified->count(),
                'unverified' => $unverified->count(),
            ];

        $pembayarans = $query->paginate(30);
        $pembayarans->appends($request->all());
        return view('pages.pembayaran.index', compact('pembayarans','data'));
    }

    public function verify(Request $request, $id)
    {
        $pembayaran = DetailAcara::find($id);
        $pembayaran->status = 'Telah Dikonfirmasi';
        $pembayaran->verifikasi = auth()->user()->nama_lengkap;
        $pembayaran->catatan = $request->catatan == null ? "-" : $request->catatan;
        $pembayaran->save();

        $partisipan = User::find($pembayaran->id_peserta);
        $acara = Acara::find($pembayaran->id_acara);
        $instansi = DB::table('ipdi_unit')->where('id', $partisipan->instansi)->get();
        $data = [
            'body' => 'Anda telah berhasil mendaftarkan diri dalam acara ' . $acara->nama_acara,
            'acara' => $acara,
            'partisipan' => $partisipan,
            'detail' => $pembayaran,
            'instansi' => $instansi,
        ];
        try {
            Mail::to($partisipan->email)->send(new MailNotify($data));
        } catch (Exception $th) {
            return redirect()->route(auth()->user()->role . '_pembayaran.index')->with('success', 'Gagal Mengirim Email.');
        }
        return redirect()->route(auth()->user()->role . '_pembayaran.index')->with('success', 'pembayaran berhasil diverifikasi dan email terkirim.');
    }

    public function unverify($id)
    {
        $pembayaran = DetailAcara::find($id);
        $pembayaran->status = 'Belum Dikonfirmasi';
        $pembayaran->unverifikasi = auth()->user()->nama_lengkap;
        $pembayaran->save();
        return redirect()->route(auth()->user()->role . '_pembayaran.index')->with('success', 'pembayaran batal diverifikasi.');
    }

    public function verifyKehadiran($id)
    {
        $pembayaran = DetailAcara::find($id);
        $pembayaran->status_kehadiran = 'Telah Dikonfirmasi';
        $pembayaran->verifikasi_kehadiran = auth()->user()->nama_lengkap;
        $pembayaran->save();
        return redirect()->route(auth()->user()->role . '_pembayaran.index')->with('success', 'kehadiran berhasil diverifikasi.');
    }

    public function unverifyKehadiran($id)
    {
        $pembayaran = DetailAcara::find($id);
        $pembayaran->status_kehadiran = 'Belum Dikonfirmasi';
        $pembayaran->save();
        return redirect()->route(auth()->user()->role . '_pembayaran.index')->with('success', 'kehadiran batal diverifikasi.');
    }

    public function sendEmail($id)
    {
        $pembayaran = DetailAcara::find($id);
        $partisipan = User::find($pembayaran->id_peserta);
        $acara = Acara::find($pembayaran->id_acara);
        $instansi = DB::table('ipdi_unit')->where('id', $partisipan->instansi)->get();
        $data = [
            'body' => 'Anda telah berhasil mendaftarkan diri dalam acara ' . $acara->nama_acara,
            'acara' => $acara,
            'partisipan' => $partisipan,
            'detail' => $pembayaran,
            'instansi' => $instansi,
        ];
        try {
            Mail::to($partisipan->email)->send(new MailNotify($data));
        } catch (Exception $th) {
            return redirect()->route(auth()->user()->role . '_pembayaran.index')->with('success', 'Gagal Mengirim Email.');
        }
        return redirect()->route(auth()->user()->role . '_pembayaran.index')->with('success', 'Email berhasil terkirim.');
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
    public function edit($id)
    {
        $pembayaran = DetailAcara::find($id);
        return view('pages.pembayaran.edit', compact('pembayaran'));
    }

    public function exportPembayaran(){
        if(auth()->user()->role == 'admin' || (auth()->user()->role == 'acaraverifikator' && auth()->user()->id_admin == '200')){
            $sheetsData = [
                [
                    'type' => 'Pembayaran',
                    'name' => 'Pembayaran Active', // Nama sheet pertama
                    'filter' => [], // Filter untuk sheet pertama
                ]
            ];

            return Excel::download(new UsersExport($sheetsData), 'Pembayaran.xlsx');
        } else {
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pembayaran = DetailAcara::find($id);
        $pembayaran->no_ktp = $request->no_ktp;
        $pembayaran->nama_akun = $request->nama_akun;
        $pembayaran->kota = $request->kota;
        $pembayaran->sponsor = $request->sponsor;
        $pembayaran->no_hp = $request->no_hp;
        $pembayaran->save();
        return redirect()->route(auth()->user()->role . '_pembayaran.index')->with('success', 'Pembayaran berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pembayaran = DetailAcara::find($id);

        DB::table('detail_acaras_copy')->insert([
            'id_acara' => $pembayaran->id_acara,
            'id_peserta' => $pembayaran->id,
            'nama_akun' => $pembayaran->nama_akun,
            'bukti_pembayaran' => $pembayaran->bukti_pembayaran,
            'no_ktp' => $pembayaran->no_ktp,
            'no_hp' => $pembayaran->no_hp,
            'catatan' => $pembayaran->catatan,
            'tipe_pegawai' => $pembayaran->tipe_pegawai,
            'nip' => $pembayaran->nip,
            'gelar' => $pembayaran->gelar,
            'golongan' => $pembayaran->golongan,
            'jenis_nakes' => $pembayaran->jenis_nakes,
            'jabatan' => $pembayaran->jabatan,
            'kota' => $pembayaran->kota,
            'sponsor' => $pembayaran->sponsor,
            'status' => $pembayaran->status,
            'status_kehadiran' => $pembayaran->status_kehadiran,
            'verifikasi' => $pembayaran->verifikasi,
            'unverifikasi' => $pembayaran->unverifikasi,
            'verifikasi_kehadiran' => $pembayaran->verifikasi_kehadiran,
            'created_at' => now(),
        ]);

        $pembayaran->delete();
        return redirect()->route(auth()->user()->role . '_pembayaran.index')->with('success', 'Pembayaran berhasil terhapus.');
    }
}
