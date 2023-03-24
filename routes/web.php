<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaAdminController;
use App\Http\Controllers\BerandaKaryawanController;
use App\Http\Controllers\BerandaPimpinanController;
use App\Http\Controllers\DataKaryawanPimController;
use App\Http\Controllers\DatapermohonancutiController;
use App\Http\Controllers\DataPengajuanCutiController;
use App\Http\Controllers\DataLaporanCutiController;
use App\Http\Controllers\DataKaryawanAdminController;
use App\Http\Controllers\DataPermohonanCutiAdminController;
use App\Http\Controllers\DataLaporanCutiAdminController;
use App\Http\Controllers\DataSisaHakCutiAdminController;
use App\Http\Controllers\DataUserLoginController;
use App\Http\Controllers\GantiPasswordController;
use App\Http\Controllers\MacamMacamCutiController;
use App\Http\Controllers\DataPribadiKryController;
use App\Http\Controllers\DataFormPermohonanCutiKryController;
use App\Http\Controllers\StatusCutiKryController;
use App\Http\Controllers\DataSisaHakCutiKryController;
use App\Http\Controllers\GantiPasswordKryController;
use App\Http\Controllers\MacamMacamCutiKryController;
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
Route::resource('user', UserController::class);
Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->middleware(['auth','auth.admin'])->group(function(){
    //tempat :; route get 
    Route::get('beranda', [BerandaAdminController::class, 'index'])->name('admin.beranda');
    Route::get('datakaryawan', [DataKaryawanAdminController::class,'index'])->name('admin.karyawan');
    Route::get('datapermohonacuti', [DataPermohonanCutiAdminController::class,'index'])->name('admin.permohonancuti');
    Route::get('datalaporancuti', [DataLaporanCutiAdminController::class,'index'])->name('admin.laporan');
    Route::get('datasisahakcuti', [DataSisaHakCutiAdminController::class,'index'])->name('admin.sisahakcuti');
    Route::get('datauserlogin', [DataUserLoginController::class,'index'])->name('admin.userlogin');
    Route::get('gantipassword', [GantiPasswordController::class,'index'])->name('admin.password');
    Route::get('macammacamcuti', [MacamMacamCutiController::class,'index'])->name('admin.macammacamcuti');
});
Route::prefix('karyawan')->middleware(['auth','auth.karyawan'])->group(function(){
    //tempat :; route get
    Route::get('beranda', [BerandaKaryawanController::class, 'index'])->name('karyawan.beranda');
    Route::get('datapribadi', [DataPribadiKryController::class, 'index'])->name('karyawan.datapribadi');
    Route::get('dataformpermohonancuti', [DataFormPermohonanCutiKryController::class, 'index'])->name('karyawan.dataform');
    Route::get('statuscuti', [StatusCutiKryController::class, 'index'])->name('karyawan.statuscuti');
    Route::get('datasisahakcuti', [DataSisaHakCutiKryController::class, 'index'])->name('karyawan.sisahakcuti');
    Route::get('gantipassword', [GantiPasswordKryController::class,'index'])->name('karyawan.password');
    Route::get('macammacamcuti', [MacamMacamCutiKryController::class,'index'])->name('karyawan.macammacamcuti');
});
Route::prefix('pimpinan')->middleware(['auth','auth.pimpinan'])->group(function(){
    //tempat :; route get
    Route::get('beranda', [BerandaPimpinanController::class, 'index'])->name('pimpinan.beranda');
    Route::get('datakar', [DataKaryawanPimController::class,'index'])->name('pimpinan.karyawan');
    Route::get('datapermohonacuti', [DatapermohonancutiController::class,'index'])->name('pimpinan.cuti');
    Route::get('datapengajuancuti', [DataPengajuanCutiController::class,'index'])->name('pimpinan.pengajuan');
    Route::get('datalaporancuti', [DataLaporanCutiController::class,'index'])->name('pimpinan.laporan');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('logout', function () 
{
    Auth::logout();    
    return redirect("login");
})->name("logout");
