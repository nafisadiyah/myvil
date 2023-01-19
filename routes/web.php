<?php

use App\Http\Controllers\Desa\UlasanController;
use App\Http\Controllers\ProposalController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//auth user umum
Route::get('/', function () {
    return view('auth.login-user');
});
Route::post('/', 'App\Http\Controllers\Auth\UmumController@Login');
Route::get('/logout', 'App\Http\Controllers\Auth\UmumController@Logout');
Route::get('/register', function () {
    return view('auth.register-user');
});
Route::post('/register', 'App\Http\Controllers\Auth\UmumController@Register');

//auth super admin
Route::get('/super-admin', function () {
    return view('auth.super-admin');
});
Route::post('/admin', 'App\Http\Controllers\Auth\SuperAdminController@Login');
Route::get('/logout-admin', 'App\Http\Controllers\Auth\SuperAdminController@Logout');

//auth admin desa
Route::get('/admin-desa', function () {
    return view('auth.login-desa');
});
Route::post('/desa', 'App\Http\Controllers\Auth\DesaController@Login');
Route::get('/logout-desa', 'App\Http\Controllers\Auth\DesaController@Logout');


Route::group(['middleware' => ['cek_login:3']], function () {
    //user-umum
    Route::get('/user-umum/home', 'App\Http\Controllers\Umum\HomeController@Index')->name('user-umum.home');
    Route::get('/user-umum/desa', 'App\Http\Controllers\Umum\DesaController@Index')->name('user-umum.desa');
    Route::get('user-umum/{id}/detail-permasalahan', 'App\Http\Controllers\Umum\HomeController@Detail')->name('umum.detail-permasalahan');
    Route::post('/user-umum/input-proposal', 'App\Http\Controllers\Umum\HomeController@Input');
    Route::post('/user-umum/desa/{id}/post-ulasan', [UlasanController::class, 'store']);
    Route::get('/user-umum/desa/{id}', 'App\Http\Controllers\Umum\DesaController@get_desa');
    Route::get('/user-umum/profil', 'App\Http\Controllers\Umum\ProfilController@Profil')->name('user-umum.profil');
    Route::get('/user-umum/proposal', [ProposalController::class, 'index'])->name('user-umum.proposal');
});
Route::group(['middleware' => ['cek_login:2']], function () {
    //user-desa
    Route::get('/user-desa/form-problem', function () {
        return view('user-desa.form-problem');
    });
    Route::post('/user-desa/form-input', 'App\Http\Controllers\Desa\BuatProblemController@Input');
    Route::get('/user-desa/home', 'App\Http\Controllers\Desa\HomeController@Index')->name('user-desa.home');
    Route::get('/user-desa/ulasan', 'App\Http\Controllers\Desa\UlasanController@Index')->name('user-desa.ulasan');
    Route::get('user-desa/{id}/detail-problem', 'App\Http\Controllers\Desa\HomeController@Detail')->name('user-desa.detail-problem');
    Route::get('/user-desa/proposal-masuk/{id}', 'App\Http\Controllers\Desa\ProposalController@Index')->name('user-desa.proposal-masuk');
    Route::put('/user-desa/proposal-masuk-terima/{Proposal}', 'App\Http\Controllers\Desa\ProposalController@update')->name('user-desa.proposal-masuk-terima');
});
Route::group(['middleware' => ['cek_login:1']], function () {
    //super-admin
    Route::get('/super-admin/home', 'App\Http\Controllers\SuperAdmin\HomeController@Index')->name('super-admin.home');
    Route::get('/super-admin/permasalahan', 'App\Http\Controllers\SuperAdmin\ProblemController@Index')->name('super-admin.permasalahan');
    Route::get('super-admin/{id}/detail-permasalahan', 'App\Http\Controllers\SuperAdmin\ProblemController@Detail')->name('super-admin.detail-permasalahan');
    Route::get('/super-admin/permasalahan-diterima', 'App\Http\Controllers\SuperAdmin\ProblemController@Terima')->name('super-admin.permasalahan-diterima');
    Route::get('/super-admin/permasalahan-ditolak', 'App\Http\Controllers\SuperAdmin\ProblemController@Tolak')->name('super-admin.permasalahan-ditolak');
    Route::put('/super-admin/update-terima/{Problem}', 'App\Http\Controllers\SuperAdmin\ProblemController@updateTerima')->name('super-admin.update-terima');
    Route::put('/super-admin/update-tolak/{Problem}', 'App\Http\Controllers\SuperAdmin\ProblemController@updateTolak')->name('super-admin.update-tolak');
    Route::get('/super-admin/user-desa', 'App\Http\Controllers\SuperAdmin\UserDesaController@index')->name('super-admin.user-desa');
    Route::post('/super-admin/user-desa-register', 'App\Http\Controllers\SuperAdmin\UserDesaController@register');
    Route::put('/super-admin/update-desa/{User}', 'App\Http\Controllers\SuperAdmin\UserDesaController@update')->name('super-admin.update-desa');
    // Route::delete('/super-admin/update-desa{id}', 'App\Http\Controllers\SuperAdmin\UserDesaController@delete')->name('super-admin.delete-desa');
    Route::get('super-admin/delete/{id}', 'App\Http\Controllers\SuperAdmin\UserDesaController@destroy');
});
