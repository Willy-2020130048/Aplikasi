<?php

use App\Http\Controllers\AcaraController;
use App\Http\Controllers\PosterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DetailAcaraController;
use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\UserAuth;
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

Route::get('/dataInstansi', function (Request $request) {
    $dataInstansi = DB::table('ipdi_unit')->select('id', 'nama_unit')->when($request->input('currentProv') == null ? 11 : $request->input('currentProv'), function ($query, $provinsi) {
        return $query->where('id_propinsi', $provinsi);
    })->get();
    return $dataInstansi;
});

Route::middleware(['auth'])->group(function () {
    Route::middleware([UserAuth::class])->group(function () {

        Route::get('/', function () {
            return view('pages.home.user');
        });

        Route::get('/profile', function (Request $request) {
            $dataProv = DB::table('reg_provinces')->select('id', 'name')->get();
            $dataInstansi = DB::table('ipdi_unit')->select('id', 'nama_unit')->when($request->input('currentProv') == null ? auth()->user()->provinsi : $request->input('currentProv'), function ($query, $provinsi) {
                return $query->where('id_propinsi', $provinsi);
            })->get();
            return view('pages.user.edit', compact('dataProv', 'dataInstansi'));
        })->name('editprofile');

        Route::resource('users', UserController::class)->only('update');
        Route::get('/users/profile', [UserController::class, 'showProfile'])->name('users.profile');
        Route::get('/acara', [\App\Http\Controllers\PosterController::class, 'index'])->name('poster.index');
        Route::get('/password', function () {
            return view('pages.user.password');
        })->name('changepassword_user');
        Route::put('/updatepassword', [UserController::class, 'changepassword'])->name('users.changepassword');
        Route::get('/acara/{id}', [PosterController::class, 'detail'])->name('poster.detail');
        Route::post('/acara/{id}', [PosterController::class, 'store'])->name('poster.store');
        Route::get('/partisipasi', function (Request $request) {
        $acaras = DB::select("SELECT *, detail_acaras.status as statusacara, detail_acaras.workshop as workshopuser FROM detail_acaras JOIN acaras on (acaras.id = detail_acaras.id_acara) WHERE detail_acaras.id_peserta = ?", [auth()->user()->id]);
        return view('pages.user.partisipasi', compact('acaras'));
        })->name('partisipasi');
    });

    //Admin
    Route::middleware([AdminAuth::class])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', function () {
                return view('pages.admin.index');
            })->name('admin');
            Route::resource('user', UserController::class);
            Route::resource('acara', AcaraController::class);
            Route::get('/password', function () {
                return view('pages.user.password');
            })->name('changepassword_admin');
            Route::get('/user/verify/{id}', [UserController::class, 'verify'])->name('user.verify');
            Route::get('/user/unverify/{id}', [UserController::class, 'unverify'])->name('user.unverify');
            Route::get('/user/changepassword/{id}', [UserController::class, 'resetpassword'])->name('user.changepassword');
            Route::put('/updatepassword', [UserController::class, 'changepassword'])->name('admin.changepassword');
            Route::resource('pembayaran', DetailAcaraController::class);
            Route::get('/pembayaran/verify/{id}', [DetailAcaraController::class, 'verify'])->name('pembayaran.verify');
            Route::get('/pembayaran/unverify/{id}', [DetailAcaraController::class, 'unverify'])->name('pembayaran.unverify');
        });
    });
});
