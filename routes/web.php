<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPage\LandingPageController;
use App\Http\Controllers\Admin\AdminController as Admin;
use App\Http\Controllers\Dashboard\DashboardController as Dashboard;
use App\Http\Controllers\Auth\AuthController as Auth;

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
Route::controller(LandingPageController::class)
	// ->prefix('webhook')
	->group(function(){
	Route::get('/','index');
});
#Start Auth
Route::get('/login', [Auth::class, 'login'])->name('login');
Route::post('/proses_login', [Auth::class, 'proses_login'])->name('proses_login');
Route::get('/logout', [Auth::class, 'logout'])->name('logout');
#End Auth
Route::group(['middleware' => 'auth'], function() {
	Route::group(array('prefix'=>'admin'), function(){ #Web admin
		Route::get('/', [Dashboard::class, 'mainAdmin'])->name('dashboardAdmin');
	});
	Route::group(array('prefix'=>'petugas-sekolah'), function(){ #Web petugas sekolah
		Route::get('/', [Dashboard::class, 'mainPetugas'])->name('dashboardPetugas');
	});
	Route::group(array('prefix'=>'guru-pengajar'), function(){ #Web petugas sekolah
		Route::get('/', [Dashboard::class, 'mainGuru'])->name('dashboardGuru');
	});
});