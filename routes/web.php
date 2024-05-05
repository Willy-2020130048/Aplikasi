<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
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

// Route::get('/', function (Request $request) {
//     $users = DB::table('users')->select('name', 'username')->when($request->input('name'), function ($query, $name) {
//         return $query->where('username', 'like', '%' . $name . '%');
//     })->paginate(5);

//     return view('pages.home', compact('questions', 'users'));
// })->name('home');

// Route::get('/profile/{username}', function ($username) {
//     $users = DB::table('users')->where('username', $username)->paginate(1);
//     $links = DB::table('links')->where('username', $username)->orderBy('id', 'desc')->paginate(10);
//     $questions = DB::table('questions')->where([['penjawab', '=', $username], ['jawaban', '<>', '']])->orderBy('id', 'desc')->paginate(10);
//     return view('pages.profile.index', compact('links', 'questions', 'users'));
// })->name('profile');

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
        Route::get('/profile', function () {
            return view('pages.user.edit');
        })->name('editprofile');
        Route::resource('users', UserController::class)->only('update');
    });

    Route::middleware([AdminAuth::class])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', function () {
                return view('pages.admin.index');
            })->name('admin');

            Route::resource('user', UserController::class);
        });
    });
});
