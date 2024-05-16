<?php

use App\Http\Controllers\AcaraController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\UserAuth;
use Illuminate\Foundation\Auth\User;
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
    });

    Route::middleware([AdminAuth::class])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', function () {
                return view('pages.admin.index');
            })->name('admin');

            Route::resource('user', UserController::class);
            Route::resource('acara', AcaraController::class);
            Route::get('/user/verify/{id}', [UserController::class, 'verify'])->name('user.verify');
            Route::get('/user/unverify/{id}', [UserController::class, 'unverify'])->name('user.unverify');
        });
    });
});
