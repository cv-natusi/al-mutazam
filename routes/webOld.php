<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPage\Home\HomeController;
use App\Http\Controllers\LandingPage\Profil\ProfilController;
use App\Http\Controllers\LandingPage\AMTV\AmtvController as AMTV;
use App\Http\Controllers\LandingPage\Sim\SimController as SIM;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Auth\AuthController as Auth;
use App\Http\Controllers\Guru\DataPrimerController as DataPrimer;
use App\Http\Controllers\Guru\DataSekunderController as DataSekunder;
use App\Http\Controllers\Guru\PengaturanGuruController as PengaturanGuru;
use App\Http\Controllers\Guru\UploadFileController as UploadPrimerGuru;
use App\Http\Controllers\Guru\ProfilController as Profil;
use App\Http\Controllers\Petugas\DataPrimerPetugasController as DataPetugasPrimer;
use App\Http\Controllers\Petugas\DataSekunderPetugasController as DataPetugasSekunder;
use App\Http\Controllers\Petugas\PengaturanPetugasController as PengaturanPetugas;
use App\Http\Controllers\Petugas\DataGuruController as DataGuru;
use App\Http\Controllers\Petugas\DataTugasPegawaiController as DataTugasPegawai;
use App\Http\Controllers\Petugas\DataKelasController as DataKelas;
use App\Http\Controllers\Petugas\DataPelajaranController as DataPelajaran;
use App\Http\Controllers\Petugas\UbahPasswordController as UbahPassword;
use App\Http\Controllers\Petugas\ResetPasswordController as ResetPassword;
use App\Http\Controllers\mstWilayah\mstWilayahController as mstWilayah;
use GuzzleHttp\Psr7\UploadedFile;

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
Route::get('/clear', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('config:cache');
    return 'Has been cleared!';
});
# Landing page start
Route::controller(HomeController::class)->group(function () {
	Route::group(['prefix'=>'home','as'=>'home.'],function(){ # Home menu
		Route::get('/', 'main')->name('main');
		Route::get('berita', 'berita')->name('berita');
		Route::post('search-berita', 'berita')->name('searchBerita');
		Route::get('event', 'event')->name('event');
		Route::post('search-event', 'event')->name('searchEvent');
		Route::get('pengumuman', 'pengumuman')->name('pengumuman');
	});
	Route::group(['prefix'=>'program','as'=>'program.'],function(){ # Program menu
		Route::get('unggulan', 'programUnggulan')->name('unggulan');
		Route::get('galeri', 'galeri')->name('galeri');
		Route::get('prestasi-siswa', 'prestasiSiswa')->name('prestasi-siswa');
		Route::get('uks', 'uks')->name('uks');
		Route::get('ekskul', 'ekskul')->name('ekskul');
	});
	Route::group(['prefix'=>'galeri','as'=>'galeri.'],function(){ # Galeri Menu
		Route::get('galeri', 'galeri')->name('galeri');
	});
});
Route::controller(AMTV::class)->group(function () {# AMTV Menu
	Route::group(['prefix'=>'amtv','as'=>'amtv.'],function(){
		Route::get('/', 'main')->name('main');
	});
});
Route::controller(ProfilController::class)->group(function () {# Profil Menu
	Route::group(['prefix'=>'profil','as'=>'profil.'],function(){
		Route::get('/sejarah', 'sejarah')->name('sejarah');
		Route::get('/visi-misi', 'visimisi')->name('visimisi');
		Route::get('/sambutan-kepsek', 'sambutan')->name('sambutan');
		Route::get('/struktur-organisasi', 'struktur')->name('struktur');
		Route::get('/profil-struktural', 'struktural')->name('struktural');
		Route::get('/fasilitas-sekolah', 'fasilitas')->name('fasilitas');
	});
});
Route::controller(SIM::class)->group(function () {# SIM Menu
	Route::group(['prefix'=>'sim','as'=>'sim.'],function(){
		Route::get('/', 'main')->name('main');
	});
});
# Landing page end

# Auth start
Route::get('login', [Auth::class, 'login'])->name('login');
Route::post('proses_login', [Auth::class, 'proses_login'])->name('proses_login');
Route::get('logout', [Auth::class, 'logout'])->name('logout');
# Auth end
# Start Wilayah
Route::post('getKabupaten',[mstWilayah::class, 'getKabupaten'])->name('get_kabupaten');
Route::post('getKecamatan',[mstWilayah::class, 'getKecamatan'])->name('get_kecamatan');
Route::post('getDesa',[mstWilayah::class, 'getDesa'])->name('get_desa');
# End Wilayah
Route::group(['middleware' => 'auth'], function () {
	Route::group(array('prefix'=>'admin'), function(){
		Route::get('/', [DashboardController::class, 'mainAdmin'])->name('dashboardAdmin');

		Route::get('/identitas', [AdminController::class, 'identitas'])->name('identitas');
		Route::post('/identitas/changeIdentity', [AdminController::class, 'changeIdentity'])->name('changeIdentity');
		Route::group(array('prefix'=>'web'), function(){
			Route::group(array('prefix'=>'logo'), function(){
				Route::get('/', [AdminController::class, 'logo'])->name('logo');
				Route::post('/update', [AdminController::class, 'formUpdateLogo'])->name('formUpdateLogo');
				Route::post('/doupdate', [AdminController::class, 'UpdateLogo'])->name('UpdateLogo');
			});
			Route::group(array('prefix'=>'menu'), function(){
				Route::get('/', [AdminController::class, 'menu'])->name('menu');
				Route::post('/add', [AdminController::class, 'formAddMenu'])->name('formAddMenu');
				Route::post('/doAdd', [AdminController::class, 'AddMenu'])->name('AddMenu');
				Route::post('/update', [AdminController::class, 'formUpdateMenu'])->name('formUpdateMenu');
				Route::post('/doUpdate', [AdminController::class, 'UpdateMenu'])->name('UpdateMenu');
			});
			Route::group(array('prefix'=>'sejarah'), function(){
				Route::get('/', [AdminController::class, 'sejarah'])->name('sejarah');
				Route::post('/update', [AdminController::class, 'updatesejarah'])->name('updateSejarah');
			});
			Route::group(array('prefix'=>'visimisi'), function(){
				Route::get('/', [AdminController::class, 'visimisi'])->name('visimisi');
				Route::post('/update', [AdminController::class, 'updateVisimisi'])->name('updateVisimisi');
			});
			Route::group(array('prefix'=>'kepsek'), function(){
				Route::get('/', [AdminController::class, 'kepsek'])->name('kepsek');
				Route::post('/update', [AdminController::class, 'updateKepsek'])->name('updateKepsek');
			});
			Route::group(array('prefix'=>'uks'), function(){
				Route::get('/', [AdminController::class, 'uks'])->name('uks');
				Route::post('/update', [AdminController::class, 'updateUks'])->name('updateUks');
			});
			Route::group(array('prefix'=>'organisasi'), function(){
				Route::get('/', [AdminController::class, 'organisasi'])->name('organisasi');
				Route::post('/update', [AdminController::class, 'updateOrganisasi'])->name('updateOrganisasi');
			});
			Route::group(array('prefix'=>'slider'), function(){
				Route::get('/', [AdminController::class, 'slider'])->name('slider');
				Route::post('/getSlider', [AdminController::class, 'tampilSlider'])->name('tampilSlider');
				Route::post('/formUpdate', [AdminController::class, 'formUpdateSlider'])->name('formUpdateSlider');
				Route::post('/update', [AdminController::class, 'updateSlider'])->name('updateSlider');
			});
			Route::group(array('prefix'=>'ekskul'), function(){
				Route::get('/', [AdminController::class, 'ekskul'])->name('ekskul');
				Route::post('/formAddEkskul', [AdminController::class, 'formAddEkskul'])->name('formAddEkskul');
				Route::post('/formUpdateEkskul', [AdminController::class, 'formUpdateEkskul'])->name('formUpdateEkskul');
				Route::post('/getEkskul', [AdminController::class, 'tampilEkskul'])->name('tampilEkskul');
				Route::post('/upload', [AdminController::class, 'uploadEkskul'])->name('uploadEkskul');
				Route::post('/update', [AdminController::class, 'updateEkskul'])->name('updateEkskul');
			});
			Route::group(array('prefix'=>'fasilitas'), function(){
				Route::get('/', [AdminController::class, 'fasilitas'])->name('fasilitas');
				Route::post('/formAddFasilitas', [AdminController::class, 'formAddFasilitas'])->name('formAddFasilitas');
				Route::post('/formUpdateFasilitas', [AdminController::class, 'formUpdateFasilitas'])->name('formUpdateFasilitas');
				Route::post('/getFasilitas', [AdminController::class, 'tampilFasilitas'])->name('tampilFasilitas');
				Route::post('/upload', [AdminController::class, 'uploadFasilitas'])->name('uploadFasilitas');
				Route::post('/update', [AdminController::class, 'updateFasilitas'])->name('updateFasilitas');
			});
		});

		Route::group(array('prefix'=>'media'), function(){
			Route::group(array('prefix'=>'amtv'), function(){
				Route::get('/', [AdminController::class, 'amtv'])->name('amtv');
				Route::post('/getAMtv', [AdminController::class, 'tampilAmtv'])->name('tampilAmtv');
				Route::post('/formAddAMtv', [AdminController::class, 'formAddAmtv'])->name('formAddAmtv');
				Route::post('/formUpdateAmtv', [AdminController::class, 'formUpdateAmtv'])->name('formUpdateAmtv');
				Route::post('/uploadAMtv', [AdminController::class, 'uploadAmtv'])->name('uploadAmtv');
				Route::post('/updateAMtv', [AdminController::class, 'updateAmtv'])->name('updateAmtv');
				Route::post('/deleteAMtv', [AdminController::class, 'deleteAmtv'])->name('deleteAmtv');
			});
			Route::group(array('prefix'=>'galeri'), function(){
				Route::get('/', [AdminController::class, 'galeri'])->name('galeri');
				Route::post('/getGaleri', [AdminController::class, 'tampilGaleri'])->name('tampilGaleri');
				Route::post('/formAddGaleri', [AdminController::class, 'formAddGaleri'])->name('formAddGaleri');
				Route::post('/formUpdateGaleri', [AdminController::class, 'formUpdateGaleri'])->name('formUpdateGaleri');
				Route::post('/uploadGaleri', [AdminController::class, 'uploadGaleri'])->name('uploadGaleri');
				Route::post('/updateGaleri', [AdminController::class, 'updateGaleri'])->name('updateGaleri');
				Route::post('/deleteGaleri', [AdminController::class, 'deleteGaleri'])->name('deleteGaleri');
			});
		});
		Route::group(array('prefix'=>'pengguna'), function(){
			Route::group(array('prefix'=>'editor'), function(){
				Route::get('/', [AdminController::class, 'editor'])->name('editor');
				Route::post('/datagrid', [AdminController::class, 'editorDatagrid'])->name('editorDatagrid');
				Route::post('/add', [AdminController::class, 'formAddEditor'])->name('formAddEditor');
				Route::post('/doAdd', [AdminController::class, 'AddEditor'])->name('AddEditor');
				Route::post('/update', [AdminController::class, 'formUpdateEditor'])->name('formUpdateEditor');
				Route::post('/doUpdate', [AdminController::class, 'UpdateEditor'])->name('UpdateEditor');
				Route::post('/resetSandi', [AdminController::class, 'resetSandiEditor'])->name('resetSandiEditor');
			});
		});
		Route::group(array('prefix'=>'iklan'), function(){
			Route::get('/atas', [AdminController::class, 'iklanAtas'])->name('iklanAtas');
			Route::get('/tengah', [AdminController::class, 'iklanTengah'])->name('iklanTengah');
			Route::get('/bawah', [AdminController::class, 'iklanBawah'])->name('iklanBawah');
			Route::get('/samping', [AdminController::class, 'iklanSamping'])->name('iklanSamping');
			Route::get('/profile', [AdminController::class, 'profileGambar'])->name('profile');
			Route::post('/form', [AdminController::class, 'formIklan'])->name('formIklan');
			Route::post('/update', [AdminController::class, 'UpdateIklan'])->name('UpdateIklan');
		});
		Route::group(array('prefix'=>'kata'), function(){
			Route::get('/', [AdminController::class, 'kataJorok'])->name('kataJorok');
			Route::post('/datagrid', [AdminController::class, 'kataJorokDatagrid'])->name('kataJorokDatagrid');
			Route::post('/add', [AdminController::class, 'formAddKataJorok'])->name('formAddKataJorok');
			Route::post('/doAdd', [AdminController::class, 'AddKataJorok'])->name('AddKataJorok');
			Route::post('/update', [AdminController::class, 'formUpdateKataJorok'])->name('formUpdateKataJorok');
			Route::post('/doUpdate', [AdminController::class, 'UpdateKataJorok'])->name('UpdateKataJorok');
			Route::post('/delete', [AdminController::class, 'deleteKataJorok'])->name('deleteKataJorok');
		});
		Route::group(array('prefix'=>'berita'),function(){
			Route::group(array('prefix'=>'beritaSekolah'), function(){
				Route::get('/{id}', [AdminController::class, 'beritaSekolah'])->name('beritaSekolah');
				Route::post('/formAddBeritaSekolah', [AdminController::class, 'formAddBeritaSekolah'])->name('formAddBeritaSekolah');
				Route::post('/formUpdateBeritaSekolah', [AdminController::class, 'formUpdateBeritaSekolah'])->name('formUpdateBeritaSekolah');
				Route::post('/getBeritaSekolah', [AdminController::class, 'tampilBeritaSekolah'])->name('tampilBeritaSekolah');
				Route::post('/upload', [AdminController::class, 'uploadBeritaSekolah'])->name('uploadBeritaSekolah');
				Route::post('/update', [AdminController::class, 'updateBeritaSekolah'])->name('updateBeritaSekolah');
				Route::post('/delete', [AdminController::class, 'deleteBeritaSekolah'])->name('deleteBeritaSekolah');
			});
		});
	});
	# Start setting Profile
	Route::get('profileAdmin', [AdminController::class, 'profile'])->name('profileAdmin');
	Route::post('formUbahPasswordAdmin', [AdminController::class, 'form_ubah_password'])->name('formUbahPasswordAdmin');
	Route::post('doUpdatePasswordAdmin', [AdminController::class, 'ubah_password'])->name('doUpdatePasswordAdmin');
	# End Setting Profile
	Route::group(array('prefix' => 'petugas-sekolah'), function () { #Web petugas sekolah
		Route::get('/', [DashboardController::class, 'mainPetugas'])->name('dashboardPetugas');
		Route::group(array('prefix'=>'data-guru'), function(){
			Route::get('/', [DataGuru::class, 'dataGuru'])->name('dataGuru');
			Route::post('/tambah', [DataGuru::class, 'tambahGuru'])->name('tambahGuru');
			Route::get('/update', [DataGuru::class, 'editGuru'])->name('editGuru');
			Route::get('/detail', [DataGuru::class, 'detailGuru'])->name('detailGuru');
			Route::post('/store', [DataGuru::class, 'save'])->name('saveGuru');
			Route::get('/data-primer', [DataGuru::class, 'primerGuru'])->name('primerGuru');
			Route::get('/data-sekunder', [DataGuru::class, 'sekunderGuru'])->name('sekunderGuru');
		});
		Route::group(array('prefix'=>'data-tugas-pegawai'), function(){
			Route::get('/', [DataTugasPegawai::class, 'dataTugasPegawai'])->name('dataTugasPegawai');
			Route::post('/tambah', [DataTugasPegawai::class, 'tambahTugasPegawai'])->name('tambahTugasPegawai');
			Route::post('/store', [DataTugasPegawai::class, 'save'])->name('saveTugasPegawai');
		});
		Route::group(array('prefix'=>'data-kelas'), function(){
			Route::get('/', [DataKelas::class, 'main'])->name('dataKelas');
			Route::post('/tambah', [DataKelas::class, 'tambahDataKelas'])->name('tambahKelas');
			Route::post('/store', [DataKelas::class, 'save'])->name('saveKelas');
		});
		Route::group(array('prefix'=>'data-pelajaran'), function(){
			Route::get('/', [DataPelajaran::class, 'main'])->name('dataPelajaran');
			Route::post('/form', [DataPelajaran::class, 'form'])->name('formDataPelajaran');
			Route::post('/store', [DataPelajaran::class, 'save'])->name('saveDataPelajaran');
		});
		Route::get('/data-Primer', [DataPrimer::class, 'dataPrimer'])->name('dataPrimer');
		Route::get('/data-Sekunder', [DataSekunder::class, 'dataSekunder'])->name('dataSekunder');
		Route::get('/Ubah-Password', [UbahPassword::class, 'ubahPassword'])->name('ubahPassword');
		Route::get('/Reset-Password', [ResetPassword::class, 'resetPassword'])->name('resetPassword');

		Route::get('/tambah-data-Pelajaran', [DataPelajaran::class, 'tambahdataPelajaran'])->name('tambahdataPelajaran');
		Route::post('/simpan-data-Pelajaran', [DataPelajaran::class, 'simpandataPelajaran'])->name('simpandataPelajaran');
		Route::get('/edit-data-Pelajaran/{id}', [DataPelajaran::class, 'editdataPelajaran'])->name('editdataPelajaran');
		Route::post('/update-data-Pelajaran/{id}', [DataPelajaran::class, 'updatedataPelajaran'])->name('updatedataPelajaran');
		Route::get('/hapus-data-Pelajaran/{id}', [DataPelajaran::class, 'hapusdataPelajaran'])->name('hapusdataPelajaran');
		Route::get('/datapetugas-primer', [DataPetugasPrimer::class, 'dataPetugasPrimer'])->name('dataprimerPetugas');
		Route::get('/bankdatapetugas-primer', [DataPetugasPrimer::class, 'bankdataPetugasPrimer'])->name('bankdataprimerPetugas');
		Route::get('/tambahdataprimer-petugas', [DataPetugasPrimer::class, 'create'])->name('createdataprimerPetugas');
		Route::post('/savedataprimer-petugas', [DataPetugasPrimer::class, 'store'])->name('savedataprimerPetugas');
		Route::get('/editdataprimer-petugas/{id}', [DataPetugasPrimer::class, 'edit'])->name('editdataprimerPetugas');
		Route::patch('/updatedataprimer-petugas/{id}', [DataPetugasPrimer::class, 'update'])->name('updatedataprimerPetugas');
		Route::get('/datapetugas-sekunder', [DataPetugasSekunder::class, 'dataPetugasSekunder'])->name('datasekunderPetugas');
		Route::get('/bankdatapetugas-sekunder', [DataPetugasSekunder::class, 'bankdataPetugasSekunder'])->name('bankdatasekunderPetugas');
		Route::get('/tambahdatasekunder-petugas', [DataPetugasSekunder::class, 'create'])->name('createdatasekunderPetugas');
		Route::get('/updatedatasekunder-petugas', [DataPetugasSekunder::class, 'update'])->name('updatedatasekunderPetugas');
		Route::get('/reset-petugas', [PengaturanPetugas::class, 'mainResetPetugas'])->name('resetPetugas');
		Route::get('/pengaturan-petugas', [PengaturanPetugas::class, 'mainPengaturanPetugas'])->name('pengaturanPetugas'); //ganti password
		Route::post('/pengaturan-petugas', [Auth::class, 'prosesChangePassword'])->name('pengaturanPetugas');
	});
	Route::group(array('prefix' => 'guru-pengajar'), function () { #Web petugas sekolah
		Route::get('/', [DashboardController::class, 'mainGuru'])->name('dashboardGuru');
		Route::get('/data-primer', [DataPrimer::class, 'index'])->name('dataprimerGuru');
		Route::get('/data-sekunder', [DataSekunder::class, 'index'])->name('datasekunderGuru');
		Route::get('/upprimerguru', [UploadPrimerGuru::class, 'upprimerGuru'])->name('uploadPrimerGuru');
		Route::post('/file-store', [UploadPrimerGuru::class, 'fileUpload'])->name('file.store');
		Route::get('/pengaturan-guru', [PengaturanGuru::class, 'mainPengaturanGuru'])->name('pengaturanGuru'); //ganti password
		Route::post('/pengaturan-guru', [Auth::class, 'prosesChangePassword'])->name('pengaturanGuru');
		Route::get('/profil', [Profil::class, 'mainProfil'])->name('profilGuru');
		Route::get('/edit-profilguru', [Profil::class, 'editProfil'])->name('editprofilGuru');
	});
});
