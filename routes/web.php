<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPage\Home\HomeController;
use App\Http\Controllers\Admin\AdminController as Admin;
use App\Http\Controllers\Dashboard\DashboardController as Dashboard;
use App\Http\Controllers\Petugas\DataGuruController as DataGuru;
use App\Http\Controllers\Petugas\DataTugasPegawaiController as DataTugasPegawai;
use App\Http\Controllers\Petugas\DataKelasController as DataKelas;
use App\Http\Controllers\Petugas\DataPelajaranController as DataPelajaran;
use App\Http\Controllers\Petugas\DataPrimerController as DataPrimer;
use App\Http\Controllers\Petugas\DataSekunderController as DataSekunder;
use App\Http\Controllers\Petugas\UbahPasswordController as UbahPassword;
use App\Http\Controllers\Petugas\ResetPasswordController as ResetPassword;
use App\Http\Controllers\Guru\PengaturanGuruController as PengaturanGuru;
use App\Http\Controllers\Auth\AuthController as Auth;
use App\Http\Controllers\Petugas\dataGuruController;

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

Route::get('/', function () {
	return redirect('home');
});
Route::controller(HomeController::class)
	->prefix('home')
	->as('home.')
	->group(function () {
		Route::get('/', 'main')->name('main');
		Route::get('berita', 'berita')->name('berita');
		Route::get('event', 'event')->name('event');
		Route::get('pengumuman', 'pengumuman')->name('pengumuman');
	});
#Start Auth
Route::get('/login', [Auth::class, 'login'])->name('login');
Route::post('/proses_login', [Auth::class, 'proses_login'])->name('proses_login');
Route::get('/logout', [Auth::class, 'logout'])->name('logout');
#End Auth
Route::group(['middleware' => 'auth'], function () {
	Route::group(array('prefix' => 'admin'), function () { #Web admin
		Route::get('/', [Dashboard::class, 'mainAdmin'])->name('dashboardAdmin'); #Dashboard admin

		Route::group(array('prefix' => 'identitas'), function () { #Modul identitas
			Route::get('/', 'AdminController@identitas')->name('identitas');
			Route::post('/identitas/changeIdentity', 'AdminController@changeIdentity')->name('changeIdentity');
		});
		Route::group(array('prefix' => 'modul-web'), function () { #Modul Web
			Route::group(array('prefix' => 'logo'), function () {
				Route::get('/', 'AdminController@logo')->name('logo');
				Route::post('/update', 'AdminController@formUpdateLogo')->name('formUpdateLogo');
				Route::post('/doupdate', 'AdminController@UpdateLogo')->name('UpdateLogo');
			});
			Route::group(array('prefix' => 'slider'), function () {
				Route::get('/', 'AdminController@slider')->name('slider');
				Route::post('/getSlider', 'AdminController@tampilSlider')->name('tampilSlider');
				Route::post('/formUpdate', 'AdminController@formUpdateSlider')->name('formUpdateSlider');
				Route::post('/update', 'AdminController@updateSlider')->name('updateSlider');
			});
		});
		Route::group(array('prefix' => 'modul-sekolah'), function () { #Modul Sekolah
			Route::group(array('prefix' => 'sejarah'), function () {
				Route::get('/', 'AdminController@sejarah')->name('sejarah');
				Route::post('/update', 'AdminController@updatesejarah')->name('updateSejarah');
			});
			Route::group(array('prefix' => 'visimisi'), function () {
				Route::get('/', 'AdminController@visimisi')->name('visimisi');
				Route::post('/update', 'AdminController@updateVisimisi')->name('updateVisimisi');
			});
			Route::group(array('prefix' => 'kepsek'), function () {
				Route::get('/', 'AdminController@kepsek')->name('kepsek');
				Route::post('/update', 'AdminController@updateKepsek')->name('updateKepsek');
			});
			Route::group(array('prefix' => 'uks'), function () {
				Route::get('/', 'AdminController@uks')->name('uks');
				Route::post('/update', 'AdminController@updateUks')->name('updateUks');
			});
			Route::group(array('prefix' => 'organisasi'), function () {
				Route::get('/', 'AdminController@organisasi')->name('organisasi');
				Route::post('/update', 'AdminController@updateOrganisasi')->name('updateOrganisasi');
			});
			Route::group(array('prefix' => 'ekskul'), function () {
				Route::get('/', 'AdminController@ekskul')->name('ekskul');
				Route::post('/formAddEkskul', 'AdminController@formAddEkskul')->name('formAddEkskul');
				Route::post('/formUpdateEkskul', 'AdminController@formUpdateEkskul')->name('formUpdateEkskul');
				Route::post('/getEkskul', 'AdminController@tampilEkskul')->name('tampilEkskul');
				Route::post('/upload', 'AdminController@uploadEkskul')->name('uploadEkskul');
				Route::post('/update', 'AdminController@updateEkskul')->name('updateEkskul');
			});
			Route::group(array('prefix' => 'fasilitas'), function () {
				Route::get('/', 'AdminController@fasilitas')->name('fasilitas');
				Route::post('/formAddFasilitas', 'AdminController@formAddFasilitas')->name('formAddFasilitas');
				Route::post('/formUpdateFasilitas', 'AdminController@formUpdateFasilitas')->name('formUpdateFasilitas');
				Route::post('/getFasilitas', 'AdminController@tampilFasilitas')->name('tampilFasilitas');
				Route::post('/upload', 'AdminController@uploadFasilitas')->name('uploadFasilitas');
				Route::post('/update', 'AdminController@updateFasilitas')->name('updateFasilitas');
			});
		});
		Route::group(array('prefix' => 'modul-media'), function () { #Modul media
			Route::group(array('prefix' => 'amtv'), function () {
				Route::get('/', 'AdminController@amtv')->name('amtv');
				Route::post('/getAMtv', 'AdminController@tampilAmtv')->name('tampilAmtv');
				Route::post('/formAddAMtv', 'AdminController@formAddAmtv')->name('formAddAmtv');
				Route::post('/formUpdateAmtv', 'AdminController@formUpdateAmtv')->name('formUpdateAmtv');
				Route::post('/uploadAMtv', 'AdminController@uploadAmtv')->name('uploadAmtv');
				Route::post('/updateAMtv', 'AdminController@updateAmtv')->name('updateAmtv');
				Route::post('/deleteAMtv', 'AdminController@deleteAmtv')->name('deleteAmtv');
			});
			Route::group(array('prefix' => 'galeri'), function () {
				Route::get('/', 'AdminController@galeri')->name('galeri');
				Route::post('/getGaleri', 'AdminController@tampilGaleri')->name('tampilGaleri');
				Route::post('/formAddGaleri', 'AdminController@formAddGaleri')->name('formAddGaleri');
				Route::post('/formUpdateGaleri', 'AdminController@formUpdateGaleri')->name('formUpdateGaleri');
				Route::post('/uploadGaleri', 'AdminController@uploadGaleri')->name('uploadGaleri');
				Route::post('/updateGaleri', 'AdminController@updateGaleri')->name('updateGaleri');
				Route::post('/deleteGaleri', 'AdminController@deleteGaleri')->name('deleteGaleri');
			});
		});
		Route::group(array('prefix' => 'berita'), function () { #modul Berita
			Route::group(array('prefix' => 'beritaSekolah'), function () {
				Route::get('/{id}', 'AdminController@beritaSekolah')->name('beritaSekolah');
				Route::post('/formAddBeritaSekolah', 'AdminController@formAddBeritaSekolah')->name('formAddBeritaSekolah');
				Route::post('/formUpdateBeritaSekolah', 'AdminController@formUpdateBeritaSekolah')->name('formUpdateBeritaSekolah');
				Route::post('/getBeritaSekolah', 'AdminController@tampilBeritaSekolah')->name('tampilBeritaSekolah');
				Route::post('/upload', 'AdminController@uploadBeritaSekolah')->name('uploadBeritaSekolah');
				Route::post('/update', 'AdminController@updateBeritaSekolah')->name('updateBeritaSekolah');
				Route::post('/delete', 'AdminController@deleteBeritaSekolah')->name('deleteBeritaSekolah');
			});
		});
	});
	Route::group(array('prefix' => 'petugas-sekolah'), function () { #Web petugas sekolah
		Route::get('/', [Dashboard::class, 'mainPetugas'])->name('dashboardPetugas');
		Route::group(array('prefix'=>'data-guru'), function(){
			Route::get('/', [DataGuru::class, 'dataGuru'])->name('dataGuru');
			Route::get('/tambah', [DataGuru::class, 'tambahGuru'])->name('tambahGuru');
			Route::get('/update', [DataGuru::class, 'editGuru'])->name('editGuru');
			Route::get('/detail', [DataGuru::class, 'detailGuru'])->name('detailGuru');
			Route::get('/data-primer', [DataGuru::class, 'primerGuru'])->name('primerGuru');
			Route::get('/data-sekunder', [DataGuru::class, 'sekunderGuru'])->name('sekunderGuru');
		});
		Route::group(array('prefix'=>'data-tugas-pegawai'), function(){
			Route::get('/', [DataTugasPegawai::class, 'dataTugasPegawai'])->name('dataTugasPegawai');
			Route::get('/tambah', [DataTugasPegawai::class, 'tambahTugasPegawai'])->name('tambahTugas');
			Route::get('/update', [DataTugasPegawai::class, 'editTugasPegawai'])->name('editTugas');
		});
		Route::group(array('prefix'=>'data-kelas'), function(){
			Route::get('/', [DataKelas::class, 'dataKelas'])->name('dataKelas');
			Route::get('/tambah', [DataKelas::class, 'tambahDataKelas'])->name('tambahKelas');
			Route::get('/update', [DataKelas::class, 'editDataKelas'])->name('editKelas');
		});
		Route::get('/data-Pelajaran', [DataPelajaran::class, 'dataPelajaran'])->name('dataPelajaran');
		Route::get('/data-Primer', [DataPrimer::class, 'dataPrimer'])->name('dataPrimer');
		Route::get('/data-Sekunder', [DataSekunder::class, 'dataSekunder'])->name('dataSekunder');
		Route::get('/Ubah-Password', [UbahPassword::class, 'ubahPassword'])->name('ubahPassword');
		Route::get('/Reset-Password', [ResetPassword::class, 'resetPassword'])->name('resetPassword');

	});
	Route::group(array('prefix' => 'guru-pengajar'), function () { #Web petugas sekolah
		Route::get('/', [Dashboard::class, 'mainGuru'])->name('dashboardGuru');
		Route::get('/data-primer', [DataPrimer::class, 'mainDataPrimer'])->name('dataprimerGuru');
		Route::get('/data-sekunder', [DataSekunder::class, 'mainDataSekunder'])->name('datasekunderGuru');
		Route::get('/pengaturan-guru', [PengaturanGuru::class, 'mainPengaturanGuru'])->name('pengaturanGuru');
	});
});
