<?php

use App\Http\Controllers\AcaraController;
use App\Http\Controllers\PosterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DetailAcaraController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\MailController;
use App\Http\Middleware\AcaraVerifikatorAuth;
use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\UserAuth;
use App\Http\Middleware\UserVerifikatorAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/dataInstansi', function (Request $request) {
//     $dataInstansi = DB::table('ipdi_unit')->select('id','kode_unit','nama_unit')->when($request->input('currentProv') == null ? 11 : $request->input('currentProv'), function ($query, $provinsi) {
//         return $query->where('id_propinsi', $provinsi)->when($request->input('currentSearch'), function ($query2, $currentSearch){
//             return $query2->where('nama_unit', "like", $currentSearch);
//         });
//     })->orderBy('nama_unit','asc')->get();
//     return $dataInstansi;
// });

Route::get('/dataInstansi', function (Request $request) {
    $dataInstansi = DB::table('ipdi_unit')
        ->select('id', 'kode_unit', 'nama_unit')
        ->when($request->input('currentProv') == null ? 11 : $request->input('currentProv'), function ($query, $provinsi) use ($request) {
            return $query->where('id_propinsi', $provinsi)
                         ->when($request->input('currentSearch'), function ($query2, $currentSearch) {
                             return $query2->where('nama_unit', 'like', '%' . $currentSearch . '%');
                         });
        })
        ->orderBy('nama_unit', 'asc')
        ->get();

    return $dataInstansi;
});

Route::middleware(['auth'])->group(function () {
    Route::middleware([UserAuth::class])->group(function () {

        Route::get('/', function () {
            return view('pages.home.user');
        })->name('user');
        Route::get('/password', function () {
            return view('pages.user.password');
        })->name('user.changepassword');

        Route::resource('user_user', UserController::class)->only('update');
        Route::get('/user/profile', [UserController::class, 'showProfile'])->name('user.profile');
        Route::put('/updatepassword', [UserController::class, 'changepassword'])->name('user.updatepassword');

        Route::get('/profile', function (Request $request) {
            $dataProv = DB::table('reg_provinces')->select('id', 'name')->get();
            $dataInstansi = DB::table('ipdi_unit')->select('id','kode_unit','nama_unit')->when($request->input('currentProv') == null ? auth()->user()->provinsi : $request->input('currentProv'), function ($query, $provinsi) {
                return $query->where('id_propinsi', $provinsi);
            })->orderBy('nama_unit','asc')->get();
            return view('pages.user.edit', compact('dataProv', 'dataInstansi'));
        })->name('user.editprofile');

        Route::get('/acara', [\App\Http\Controllers\PosterController::class, 'index'])->name('user.poster.index');
        Route::get('/acara/{id}', [PosterController::class, 'detail'])->name('user.poster.detail');
        Route::post('/acara/{id}', [PosterController::class, 'store'])->name('user.poster.store');
        Route::get('/partisipasi', function (Request $request) {
            $acaras = DB::select("SELECT *, detail_acaras.status as statusacara, detail_acaras.workshop as workshopuser FROM detail_acaras JOIN acaras on (acaras.id = detail_acaras.id_acara) WHERE detail_acaras.id_peserta = ?", [auth()->user()->id]);
            $users = DB::select("SELECT *, ipdi_unit.nama_unit FROM users JOIN ipdi_unit on (ipdi_unit.id = users.instansi) WHERE users.id = ?", [auth()->user()->id]);
            return view('pages.user.partisipasi', compact('acaras', 'users'));
        })->name('user.partisipasi');
    });

    //Admin
    Route::middleware([AdminAuth::class])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', function () {
                return view('pages.admin.index');
            })->name('admin');
            Route::get('/password', function () {
                return view('pages.user.password');
            })->name('admin.changepassword');

            Route::resource('admin_user', UserController::class);
            Route::put('/updatedata/{id}', [UserController::class, 'updatedata'])->name('admin.updatedata');
            Route::get('/user/verify/{id}', [UserController::class, 'verify'])->name('admin.user.verify');
            Route::get('/user/unverify/{id}', [UserController::class, 'unverify'])->name('admin.user.unverify');
            Route::get('/user/changepassword/{id}', [UserController::class, 'resetpassword'])->name('admin.resetpassword');
            Route::put('/updatepassword', [UserController::class, 'changepassword'])->name('admin.updatepassword');
            Route::get('/users/profile', [UserController::class, 'showProfile'])->name('admin.profile');

            Route::resource('admin_acara', AcaraController::class);
            Route::resource('admin_pembayaran', DetailAcaraController::class);
            Route::resource('admin_instansi', InstansiController::class);
            Route::put('/pembayaran/verify/{id}', [DetailAcaraController::class, 'verify'])->name('admin.pembayaran.verify');
            Route::get('/pembayaran/unverify/{id}', [DetailAcaraController::class, 'unverify'])->name('admin.pembayaran.unverify');
            Route::get('/pembayaran/verifyKehadiran/{id}', [DetailAcaraController::class, 'verifyKehadiran'])->name('admin.kehadiran.verify');
            Route::get('/pembayaran/unverifyKehadiran/{id}', [DetailAcaraController::class, 'unverifyKehadiran'])->name('admin.kehadiran.unverify');
            Route::get('/pembayaran/sendEmail/{id}', [DetailAcaraController::class, 'sendEmail'])->name('admin.kehadiran.sendEmail');

            Route::get('/detailacara', [\App\Http\Controllers\PosterController::class, 'index'])->name('admin.poster.index');
            Route::get('/detailacara/{id}', [PosterController::class, 'detail'])->name('admin.poster.detail');
            Route::post('/detailacara/{id}', [PosterController::class, 'store'])->name('admin.poster.store');

            Route::get('/profile', function (Request $request) {
                $dataProv = DB::table('reg_provinces')->select('id', 'name')->get();
                $dataInstansi = DB::table('ipdi_unit')->select('id','kode_unit','nama_unit')->when($request->input('currentProv') == null ? auth()->user()->provinsi : $request->input('currentProv'), function ($query, $provinsi) {
                    return $query->where('id_propinsi', $provinsi);
                })->orderBy('nama_unit','asc')->get();
                return view('pages.user.edit', compact('dataProv', 'dataInstansi'));
            })->name('admin.editprofile');

            Route::get('/partisipasi', function (Request $request) {
                $acaras = DB::select("SELECT *, detail_acaras.status as statusacara, detail_acaras.workshop as workshopuser FROM detail_acaras JOIN acaras on (acaras.id = detail_acaras.id_acara) WHERE detail_acaras.id_peserta = ?", [auth()->user()->id]);
                $users = DB::select("SELECT *, ipdi_unit.nama_unit FROM users JOIN ipdi_unit on (ipdi_unit.id = users.instansi) WHERE users.id = ?", [auth()->user()->id]);
                return view('pages.user.partisipasi', compact('acaras', 'users'));
            })->name('admin.partisipasi');
        });
    });


    Route::middleware([UserVerifikatorAuth::class])->group(function () {
        Route::prefix('userverifikator')->group(function () {
            Route::get('/', function () {
                return view('pages.home.userverifikator');
            })->name('userverifikator');

            Route::get('/password', function () {
                return view('pages.user.password');
            })->name('userverifikator.changepassword');

            Route::resource('userverifikator_user', UserController::class);
            Route::get('/users/profile', [UserController::class, 'showProfile'])->name('userverifikator.profile');
            Route::get('/user/verify/{id}', [UserController::class, 'verify'])->name('userverifikator.user.verify');
            Route::get('/user/unverify/{id}', [UserController::class, 'unverify'])->name('userverifikator.user.unverify');
            Route::get('/user/changepassword/{id}', [UserController::class, 'resetpassword'])->name('userverifikator.resetpassword');
            Route::put('/updatepassword', [UserController::class, 'changepassword'])->name('userverifikator.updatepassword');

            Route::get('/profile', function (Request $request) {
                $dataProv = DB::table('reg_provinces')->select('id', 'name')->get();
                $dataInstansi = DB::table('ipdi_unit')->select('id','kode_unit','nama_unit')->when($request->input('currentProv') == null ? auth()->user()->provinsi : $request->input('currentProv'), function ($query, $provinsi) {
                    return $query->where('id_propinsi', $provinsi);
                })->orderBy('nama_unit','asc')->get();
                return view('pages.user.edit', compact('dataProv', 'dataInstansi'));
            })->name('userverifikator.editprofile');


            Route::get('/acara', [\App\Http\Controllers\PosterController::class, 'index'])->name('userverifikator.poster.index');
            Route::get('/acara/{id}', [PosterController::class, 'detail'])->name('userverifikator.poster.detail');
            Route::post('/acara/{id}', [PosterController::class, 'store'])->name('userverifikator.poster.store');
            Route::get('/partisipasi', function (Request $request) {
                $acaras = DB::select("SELECT *, detail_acaras.status as statusacara, detail_acaras.workshop as workshopuser FROM detail_acaras JOIN acaras on (acaras.id = detail_acaras.id_acara) WHERE detail_acaras.id_peserta = ?", [auth()->user()->id]);
                $users = DB::select("SELECT *, ipdi_unit.nama_unit FROM users JOIN ipdi_unit on (ipdi_unit.id = users.instansi) WHERE users.id = ?", [auth()->user()->id]);
                return view('pages.user.partisipasi', compact('acaras', 'users'));
            })->name('userverifikator.partisipasi');
        });
    });

    Route::middleware([AcaraVerifikatorAuth::class])->group(function () {
        Route::prefix('acaraverifikator')->group(function () {
            Route::get('/', function () {
                return view('pages.home.acaraverifikator');
            })->name('acaraverifikator');
            Route::get('/password', function () {
                return view('pages.user.password');
            })->name('acaraverifikator.changepassword');

            Route::resource('acaraverifikator_user', UserController::class)->only('update');
            Route::put('/updatepassword', [UserController::class, 'changepassword'])->name('acaraverifikator.updatepassword');
            Route::get('/user/profile', [UserController::class, 'showProfile'])->name('acaraverifikator.profile');

            Route::resource('acaraverifikator_pembayaran', DetailAcaraController::class);
            Route::put('/pembayaran/verify/{id}', [DetailAcaraController::class, 'verify'])->name('acaraverifikator.pembayaran.verify');
            Route::get('/pembayaran/unverify/{id}', [DetailAcaraController::class, 'unverify'])->name('acaraverifikator.pembayaran.unverify');
            Route::get('/pembayaran/verifyKehadiran/{id}', [DetailAcaraController::class, 'verifyKehadiran'])->name('acaraverifikator.kehadiran.verify');
            Route::get('/pembayaran/unverifyKehadiran/{id}', [DetailAcaraController::class, 'unverifyKehadiran'])->name('acaraverifikator.kehadiran.unverify');

            Route::get('/profile', function (Request $request) {
                $dataProv = DB::table('reg_provinces')->select('id', 'name')->get();
                $dataInstansi = DB::table('ipdi_unit')->select('id','kode_unit','nama_unit')->when($request->input('currentProv') == null ? auth()->user()->provinsi : $request->input('currentProv'), function ($query, $provinsi) {
                    return $query->where('id_propinsi', $provinsi);
                })->orderBy('nama_unit','asc')->get();
                return view('pages.user.edit', compact('dataProv', 'dataInstansi'));
            })->name('acaraverifikator.editprofile');

            Route::get('/acara', [\App\Http\Controllers\PosterController::class, 'index'])->name('acaraverifikator.poster.index');
            Route::get('/acara/{id}', [PosterController::class, 'detail'])->name('acaraverifikator.poster.detail');
            Route::post('/acara/{id}', [PosterController::class, 'store'])->name('acaraverifikator.poster.store');
            Route::get('/partisipasi', function (Request $request) {
                $acaras = DB::select("SELECT *, detail_acaras.status as statusacara, detail_acaras.workshop as workshopuser FROM detail_acaras JOIN acaras on (acaras.id = detail_acaras.id_acara) WHERE detail_acaras.id_peserta = ?", [auth()->user()->id]);
                $users = DB::select("SELECT *, ipdi_unit.nama_unit FROM users JOIN ipdi_unit on (ipdi_unit.id = users.instansi) WHERE users.id = ?", [auth()->user()->id]);
                return view('pages.user.partisipasi', compact('acaras', 'users'));
            })->name('acaraverifikator.partisipasi');
        });
    });
});
