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

		Route::get('/identitas', 'AdminController@identitas')->name('identitas');
		Route::post('/identitas/changeIdentity', 'AdminController@changeIdentity')->name('changeIdentity');
		Route::group(array('prefix'=>'web'), function(){
			Route::group(array('prefix'=>'logo'), function(){
				Route::get('/', 'AdminController@logo')->name('logo');
				Route::post('/update', 'AdminController@formUpdateLogo')->name('formUpdateLogo');
				Route::post('/doupdate', 'AdminController@UpdateLogo')->name('UpdateLogo');
			});
			Route::group(array('prefix'=>'menu'), function(){
				Route::get('/', 'AdminController@menu')->name('menu');
				Route::post('/add', 'AdminController@formAddMenu')->name('formAddMenu');
				Route::post('/doAdd', 'AdminController@AddMenu')->name('AddMenu');
				Route::post('/update', 'AdminController@formUpdateMenu')->name('formUpdateMenu');
				Route::post('/doUpdate', 'AdminController@UpdateMenu')->name('UpdateMenu');
			});
			Route::group(array('prefix'=>'sejarah'), function(){
				Route::get('/', 'AdminController@sejarah')->name('sejarah');
				Route::post('/update', 'AdminController@updatesejarah')->name('updateSejarah');
			});
			Route::group(array('prefix'=>'visimisi'), function(){
				Route::get('/', 'AdminController@visimisi')->name('visimisi');
				Route::post('/update', 'AdminController@updateVisimisi')->name('updateVisimisi');
			});
			Route::group(array('prefix'=>'kepsek'), function(){
				Route::get('/', 'AdminController@kepsek')->name('kepsek');
				Route::post('/update', 'AdminController@updateKepsek')->name('updateKepsek');
			});
			Route::group(array('prefix'=>'uks'), function(){
				Route::get('/', 'AdminController@uks')->name('uks');
				Route::post('/update', 'AdminController@updateUks')->name('updateUks');
			});
			Route::group(array('prefix'=>'organisasi'), function(){
				Route::get('/', 'AdminController@organisasi')->name('organisasi');
				Route::post('/update', 'AdminController@updateOrganisasi')->name('updateOrganisasi');
			});
			Route::group(array('prefix'=>'slider'), function(){
				Route::get('/', 'AdminController@slider')->name('slider');
				Route::post('/getSlider', 'AdminController@tampilSlider')->name('tampilSlider');
				Route::post('/formUpdate', 'AdminController@formUpdateSlider')->name('formUpdateSlider');
				Route::post('/update', 'AdminController@updateSlider')->name('updateSlider');
			});
			Route::group(array('prefix'=>'ekskul'), function(){
				Route::get('/', 'AdminController@ekskul')->name('ekskul');
				Route::post('/formAddEkskul','AdminController@formAddEkskul')->name('formAddEkskul');
				Route::post('/formUpdateEkskul','AdminController@formUpdateEkskul')->name('formUpdateEkskul');
				Route::post('/getEkskul', 'AdminController@tampilEkskul')->name('tampilEkskul');
				Route::post('/upload', 'AdminController@uploadEkskul')->name('uploadEkskul');
				Route::post('/update', 'AdminController@updateEkskul')->name('updateEkskul');
			});
			Route::group(array('prefix'=>'fasilitas'), function(){
				Route::get('/', 'AdminController@fasilitas')->name('fasilitas');
				Route::post('/formAddFasilitas','AdminController@formAddFasilitas')->name('formAddFasilitas');
				Route::post('/formUpdateFasilitas','AdminController@formUpdateFasilitas')->name('formUpdateFasilitas');
				Route::post('/getFasilitas', 'AdminController@tampilFasilitas')->name('tampilFasilitas');
				Route::post('/upload', 'AdminController@uploadFasilitas')->name('uploadFasilitas');
				Route::post('/update', 'AdminController@updateFasilitas')->name('updateFasilitas');
			});
		});

		Route::group(array('prefix'=>'media'), function(){
			Route::group(array('prefix'=>'amtv'), function(){
				Route::get('/', 'AdminController@amtv')->name('amtv');
				Route::post('/getAMtv', 'AdminController@tampilAmtv')->name('tampilAmtv');
				Route::post('/formAddAMtv', 'AdminController@formAddAmtv')->name('formAddAmtv');
				Route::post('/formUpdateAmtv', 'AdminController@formUpdateAmtv')->name('formUpdateAmtv');
				Route::post('/uploadAMtv', 'AdminController@uploadAmtv')->name('uploadAmtv');
				Route::post('/updateAMtv', 'AdminController@updateAmtv')->name('updateAmtv');
				Route::post('/deleteAMtv', 'AdminController@deleteAmtv')->name('deleteAmtv');
			});
			Route::group(array('prefix'=>'galeri'), function(){
				Route::get('/', 'AdminController@galeri')->name('galeri');
				Route::post('/getGaleri', 'AdminController@tampilGaleri')->name('tampilGaleri');
				Route::post('/formAddGaleri', 'AdminController@formAddGaleri')->name('formAddGaleri');
				Route::post('/formUpdateGaleri', 'AdminController@formUpdateGaleri')->name('formUpdateGaleri');
				Route::post('/uploadGaleri', 'AdminController@uploadGaleri')->name('uploadGaleri');
				Route::post('/updateGaleri', 'AdminController@updateGaleri')->name('updateGaleri');
				Route::post('/deleteGaleri', 'AdminController@deleteGaleri')->name('deleteGaleri');
			});
		});
		Route::group(array('prefix'=>'pengguna'), function(){
			Route::group(array('prefix'=>'editor'), function(){
				Route::get('/', 'AdminController@editor')->name('editor');
				Route::post('/datagrid', 'AdminController@editorDatagrid')->name('editorDatagrid');
				Route::post('/add', 'AdminController@formAddEditor')->name('formAddEditor');
				Route::post('/doAdd', 'AdminController@AddEditor')->name('AddEditor');
				Route::post('/update', 'AdminController@formUpdateEditor')->name('formUpdateEditor');
				Route::post('/doUpdate', 'AdminController@UpdateEditor')->name('UpdateEditor');
				Route::post('/resetSandi', 'AdminController@resetSandiEditor')->name('resetSandiEditor');
			});
		});
		Route::group(array('prefix'=>'iklan'), function(){
			Route::get('/atas', 'AdminController@iklanAtas')->name('iklanAtas');
			Route::get('/tengah', 'AdminController@iklanTengah')->name('iklanTengah');
			Route::get('/bawah', 'AdminController@iklanBawah')->name('iklanBawah');
			Route::get('/samping', 'AdminController@iklanSamping')->name('iklanSamping');
			Route::get('/profile', 'AdminController@profileGambar')->name('profile');
			Route::post('/form', 'AdminController@formIklan')->name('formIklan');
			Route::post('/update', 'AdminController@UpdateIklan')->name('UpdateIklan');
		});
		Route::group(array('prefix'=>'kata'), function(){
			Route::get('/', 'AdminController@kataJorok')->name('kataJorok');
			Route::post('/datagrid', 'AdminController@kataJorokDatagrid')->name('kataJorokDatagrid');
			Route::post('/add', 'AdminController@formAddKataJorok')->name('formAddKataJorok');
			Route::post('/doAdd', 'AdminController@AddKataJorok')->name('AddKataJorok');
			Route::post('/update', 'AdminController@formUpdateKataJorok')->name('formUpdateKataJorok');
			Route::post('/doUpdate', 'AdminController@UpdateKataJorok')->name('UpdateKataJorok');
			Route::post('/delete', 'AdminController@deleteKataJorok')->name('deleteKataJorok');
		});
		Route::group(array('prefix'=>'berita'),function(){
			Route::group(array('prefix'=>'beritaSekolah'), function(){
				Route::get('/{id}', 'AdminController@beritaSekolah')->name('beritaSekolah');
				Route::post('/formAddBeritaSekolah','AdminController@formAddBeritaSekolah')->name('formAddBeritaSekolah');
				Route::post('/formUpdateBeritaSekolah','AdminController@formUpdateBeritaSekolah')->name('formUpdateBeritaSekolah');
				Route::post('/getBeritaSekolah', 'AdminController@tampilBeritaSekolah')->name('tampilBeritaSekolah');
				Route::post('/upload', 'AdminController@uploadBeritaSekolah')->name('uploadBeritaSekolah');
				Route::post('/update', 'AdminController@updateBeritaSekolah')->name('updateBeritaSekolah');
				Route::post('/delete', 'AdminController@deleteBeritaSekolah')->name('deleteBeritaSekolah');
			});
		});
	});
	Route::group(array('prefix'=>'petugas-sekolah'), function(){ #Web petugas sekolah
		Route::get('/', [Dashboard::class, 'mainPetugas'])->name('dashboardPetugas');
	});
	Route::group(array('prefix'=>'guru-pengajar'), function(){ #Web petugas sekolah
		Route::get('/', [Dashboard::class, 'mainGuru'])->name('dashboardGuru');
	});
	Route::get('profileAdmin', 'AdminController@profile')->name('profileAdmin');
	Route::post('formUbahPasswordAdmin', 'AdminController@form_ubah_password')->name('formUbahPasswordAdmin');
	Route::post('doUpdatePasswordAdmin', 'AdminController@ubah_password')->name('doUpdatePasswordAdmin');
});
// Route::get('/', function () {
// 	return view('welcome');
// });
