<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPage\Home\HomeController;
use App\Http\Controllers\LandingPage\Profil\ProfilController;
use App\Http\Controllers\LandingPage\AMTV\AmtvController as AMTV;
use App\Http\Controllers\LandingPage\Sim\SimController as SIM;
use App\Http\Controllers\Admin\AdminController as Admin;
use App\Http\Controllers\Pengaturan\PengaturanController as Pengaturan;
use App\Http\Controllers\Dashboard\DashboardController as Dashboard;
use App\Http\Controllers\Pengguna\PenggunaController as Pengguna;
use App\Http\Controllers\Auth\AuthController as Auth;
use App\Http\Controllers\Guru\ProfilController as Profil;
use App\Http\Controllers\Petugas\DataGuruController as DataGuru;
use App\Http\Controllers\Petugas\DataTugasPegawaiController as DataTugasPegawai;
use App\Http\Controllers\Petugas\DataAdministrasiController as DataAdministrasi;
use App\Http\Controllers\Petugas\BerbagiDokumenController as BerbagiDokumen;
use App\Http\Controllers\Petugas\DataKelasController as DataKelas;
use App\Http\Controllers\Petugas\DataPelajaranController as DataPelajaran;
use App\Http\Controllers\Petugas\MasterSIMController;
use App\Http\Controllers\Petugas\PengembanganDiriController as PengembanganDiri;
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
Route::get('/clear', function () {
	$exitCode = Artisan::call('cache:clear');
	$exitCode = Artisan::call('view:clear');
	$exitCode = Artisan::call('config:clear');
	$exitCode = Artisan::call('route:clear');
	$exitCode = Artisan::call('config:cache');
	return 'Has been cleared!';
});
# Landing page start
Route::controller(HomeController::class)->group(function () {
	Route::group(['prefix' => 'home', 'as' => 'home.'], function () { # Home menu
		Route::get('/', 'main')->name('main');
		Route::post('search-agenda', 'main')->name('searchAgenda');
		Route::get('berita', 'berita')->name('berita');
		Route::post('search-berita', 'berita')->name('searchBerita');
		Route::get('event', 'event')->name('event');
		Route::post('search-event', 'event')->name('searchEvent');
		Route::get('pengumuman', 'pengumuman')->name('pengumuman');
		Route::post('search-pengumuman', 'pengumuman')->name('searchPengumuman');
		Route::get('dokumen', 'dokumen')->name('dokumen');
		// Route::post('search-dokumen', 'dokumen')->name('searchPengumuman');
		Route::get('download-pdf/{filename}', 'downloadPdf')->name('downloadPdf');
		Route::post('doLogin-download', 'doLogin')->name('doLoginDownload');
	});
	Route::group(['prefix' => 'program', 'as' => 'program.'], function () { # Program menu
		Route::get('unggulan', 'programUnggulan')->name('unggulan');
		Route::post('search-unggulan', 'programUnggulan')->name('searchUnggulan');
		Route::get('galeri', 'galeri')->name('galeri');
		Route::get('prestasi-siswa', 'prestasiSiswa')->name('prestasi-siswa');
		Route::get('uks', 'uks')->name('uks');
		Route::get('ekskul', 'ekskul')->name('ekskul');
		Route::post('search-ekskul', 'ekskul')->name('searchEkskul');
	});
	Route::group(['prefix' => 'galeri', 'as' => 'galeri.'], function () { # Galeri Menu
		Route::get('galeri', 'galeri')->name('galeri');
		Route::post('search-galeri', 'galeri')->name('searchGaleri');
	});
});
Route::controller(AMTV::class)->group(function () { # AMTV Menu
	Route::group(['prefix' => 'amtv', 'as' => 'amtv.'], function () {
		Route::get('/', 'main')->name('main');
	});
});
Route::controller(ProfilController::class)->group(function () { # Profil Menu
	Route::group(['prefix' => 'profil', 'as' => 'profil.'], function () {
		Route::get('/sejarah', 'sejarah')->name('sejarah');
		Route::get('/visi-misi', 'visimisi')->name('visimisi');
		Route::get('/sambutan-kepsek', 'sambutan')->name('sambutan');
		Route::get('/struktur-organisasi', 'struktur')->name('struktur');
		Route::get('/profil-struktural', 'struktural')->name('struktural');
		Route::post('/search-profil-struktural', 'struktural')->name('searchStruktural');
		Route::get('/fasilitas-sekolah', 'fasilitas')->name('fasilitas');
	});
});
Route::controller(SIM::class)->group(function () { # SIM Menu
	Route::group(['prefix' => 'sim', 'as' => 'sim.'], function () {
		Route::get('/', 'main')->name('main');
	});
});
# Landing page end

# Auth start
Route::get('login', [Auth::class, 'login'])->name('login');
Route::post('proses_login', [Auth::class, 'proses_login'])->name('proses_login');
Route::get('logout', [Auth::class, 'logout'])->name('logout');
# Auth end
Route::group(['middleware' => 'auth'], function () {
	Route::group(array('prefix' => 'admin'), function () { #Web admin
		Route::get('/', [Dashboard::class, 'mainAdmin'])->name('dashboardAdmin'); #Dashboard admin
		Route::get('/get-dashboard', [Dashboard::class, 'getDashboard'])->name('getDashboard');

		Route::group(array('prefix' => 'identitas'), function () { #Modul identitas
			Route::get('/', [Admin::class, 'identitas'])->name('identitas');
			Route::post('/identitas/changeIdentity', [Admin::class, 'changeIdentity'])->name('changeIdentity');
		});
		Route::group(array('prefix' => 'modul-web'), function () { #Modul Web
			Route::group(array('prefix' => 'logo'), function () {
				Route::get('/', [Admin::class, 'logo'])->name('logo');
				Route::post('/update', [Admin::class, 'formUpdateLogo'])->name('formUpdateLogo');
				Route::post('/save', [Admin::class, 'saveLogo'])->name('saveLogo');
			});
			Route::group(array('prefix' => 'slider'), function () {
				Route::get('/', [Admin::class, 'slider'])->name('slider');
				Route::post('/getSlider', [Admin::class, 'tampilSlider'])->name('tampilSlider');
				Route::post('/formUpdate', [Admin::class, 'formUpdateSlider'])->name('formUpdateSlider');
				Route::post('/save', [Admin::class, 'saveSlider'])->name('saveSlider');
			});
		});
		// Route::group(array('prefix' => 'modul-sekolah'), function () { #Modul Sekolah
		// 	Route::group(array('prefix' => 'sejarah'), function () {
		// 		Route::get('/', [Admin::class, 'sejarah'])->name('sejarah');
		// 		Route::post('/update', [Admin::class, 'updateSejarah'])->name('updateSejarah');
		// 	});
		// 	Route::group(array('prefix' => 'visimisi'), function () {
		// 		Route::get('/', [Admin::class, 'visimisi'])->name('visimisi');
		// 		Route::post('/update', [Admin::class, 'updateVisimisi'])->name('updateVisimisi');
		// 	});
		// 	Route::group(array('prefix' => 'kepsek'), function () {
		// 		Route::get('/', [Admin::class, 'kepsek'])->name('kepsek');
		// 		Route::post('/update', [Admin::class, 'updateKepsek'])->name('updateKepsek');
		// 	});
		// 	Route::group(array('prefix' => 'uks'), function () {
		// 		Route::get('/', [Admin::class, 'uks'])->name('uks');
		// 		Route::post('/update', [Admin::class, 'updateUks'])->name('updateUks');
		// 	});
		// 	Route::group(array('prefix' => 'organisasi'), function () {
		// 		Route::get('/', [Admin::class, 'organisasi'])->name('organisasi');
		// 		Route::post('/update', [Admin::class, 'updateOrganisasi'])->name('updateOrganisasi');
		// 	});
		// 	Route::group(array('prefix' => 'ekskul'), function () {
		// 		Route::get('/', [Admin::class, 'ekskul'])->name('ekskul');
		// 		Route::post('/formAddEkskul', [Admin::class, 'formAddEkskul'])->name('formAddEkskul');
		// 		Route::post('/formUpdateEkskul', [Admin::class, 'formUpdateEkskul'])->name('formUpdateEkskul');
		// 		Route::post('/getEkskul', [Admin::class, 'tampilEkskul'])->name('tampilEkskul');
		// 		Route::post('/upload', [Admin::class, 'uploadEkskul'])->name('uploadEkskul');
		// 		Route::post('/update', [Admin::class, 'updateEkskul'])->name('updateEkskul');
		// 	});
		// 	Route::group(array('prefix' => 'fasilitas'), function () {
		// 		Route::get('/', [Admin::class, 'fasilitas'])->name('fasilitas');
		// 		Route::post('/formAddFasilitas', [Admin::class, 'formAddFasilitas'])->name('formAddFasilitas');
		// 		Route::post('/formUpdateFasilitas', [Admin::class, 'formUpdateFasilitas'])->name('formUpdateFasilitas');
		// 		Route::post('/getFasilitas', [Admin::class, 'tampilFasilitas'])->name('tampilFasilitas');
		// 		Route::post('/upload', [Admin::class, 'uploadFasilitas'])->name('uploadFasilitas');
		// 		Route::post('/update', [Admin::class, 'updateFasilitas'])->name('updateFasilitas');
		// 	});
		// });
		// Route::group(array('prefix' => 'modul-media'), function () { #Modul media
		// 	Route::group(array('prefix' => 'amtv'), function () {
		// 		Route::get('/', [Admin::class, 'amtv'])->name('amtv');
		// 		Route::post('/getAMtv', [Admin::class, 'tampilAmtv'])->name('tampilAmtv');
		// 		Route::post('/formAddAMtv', [Admin::class, 'formAddAmtv'])->name('formAddAmtv');
		// 		Route::post('/formUpdateAmtv', [Admin::class, 'formUpdateAmtv'])->name('formUpdateAmtv');
		// 		Route::post('/uploadAMtv', [Admin::class, 'uploadAmtv'])->name('uploadAmtv');
		// 		Route::post('/updateAMtv', [Admin::class, 'updateAmtv'])->name('updateAmtv');
		// 		Route::post('/deleteAMtv', [Admin::class, 'deleteAmtv'])->name('deleteAmtv');
		// 	});
		// 	Route::group(array('prefix' => 'galeri'), function () {
		// 		Route::get('/', [Admin::class, 'galeri'])->name('galeri');
		// 		Route::post('/getGaleri', [Admin::class, 'tampilGaleri'])->name('tampilGaleri');
		// 		Route::post('/formAddGaleri', [Admin::class, 'formAddGaleri'])->name('formAddGaleri');
		// 		Route::post('/formUpdateGaleri', [Admin::class, 'formUpdateGaleri'])->name('formUpdateGaleri');
		// 		Route::post('/uploadGaleri', [Admin::class, 'uploadGaleri'])->name('uploadGaleri');
		// 		Route::post('/updateGaleri', [Admin::class, 'updateGaleri'])->name('updateGaleri');
		// 		Route::post('/deleteGaleri', [Admin::class, 'deleteGaleri'])->name('deleteGaleri');
		// 	});
		// });

		# Modul berita start
		Route::controller(Admin::class)->group(function(){
			# Modul berita start
			Route::group(['prefix'=>'berita','as'=>'berita.'],function(){
				Route::get('{id}','berita')->name('main');
				Route::post('formAddBerita', 'formAddBerita')->name('formAddBerita');
				Route::post('saveBerita', 'saveBerita')->name('saveBerita');
				Route::post('deleteBerita', 'deleteBerita')->name('deleteBerita');
			});
			# Modul berita end

			# Modul media start
			Route::group(['prefix'=>'modul-media','as'=>'media.'],function(){
				Route::group(['prefix'=>'amtv','as'=>'amtv.'],function(){
					Route::get('/', 'amtv')->name('main');
					Route::post('formAddAMtv', 'formAddAmtv')->name('formAddAmtv');
					Route::post('saveAmtv', 'saveAmtv')->name('saveAmtv');
					Route::post('deleteAMtv', 'deleteAmtv')->name('deleteAmtv');
				});

				Route::group(['prefix'=>'galeri','as'=>'galeri.'],function(){
					Route::get('/', 'galeri')->name('main');
					Route::post('/formAddGaleri', [Admin::class, 'formAddGaleri'])->name('formAddGaleri');
					Route::post('/SaveGaleri', [Admin::class, 'SaveGaleri'])->name('SaveGaleri');
					Route::post('/deleteGaleri', [Admin::class, 'deleteGaleri'])->name('deleteGaleri');
				});
			});
			# Modul media end

			# Modul sekolah start
			Route::group(['prefix'=>'modul-sekolah','as'=>'sekolah.'],function(){
				Route::group(['prefix'=>'sejarah','as'=>'sejarah.'],function(){
					Route::get('/', 'sejarah')->name('main');
					Route::post('/update', 'updateSejarah')->name('updateSejarah');
				});

				Route::group(['prefix'=>'visimisi','as'=>'visimisi.'], function () {
					Route::get('/', 'visimisi')->name('main');
					Route::post('/update', 'updateVisimisi')->name('updateVisimisi');
				});

				Route::group(['prefix'=>'kepsek','as'=>'kepsek.'], function () {
					Route::get('/', 'kepsek')->name('main');
					Route::post('/update', 'updateKepsek')->name('updateKepsek');
				});

				Route::group(['prefix'=>'uks','as'=>'uks.'], function () {
					Route::get('/', 'uks')->name('main');
					Route::post('/update', 'updateUks')->name('updateUks');
				});

				Route::group(['prefix'=>'organisasi','as'=>'organisasi.'], function () {
					Route::get('/', 'organisasi')->name('main');
					Route::post('/update', 'updateOrganisasi')->name('updateOrganisasi');
				});

				Route::group(['prefix'=>'ekskul','as'=>'ekskul.'], function () {
					Route::get('/', 'ekskul')->name('main');
					Route::post('/formAddEkskul', 'formAddEkskul')->name('formAddEkskul');
					Route::post('/saveExkul', 'saveExkul')->name('saveExkul');
				});

				Route::group(['prefix'=>'fasilitas','as'=>'fasilitas.'], function () {
					Route::get('/', 'fasilitas')->name('main');
					Route::post('/formAddFasilitas', 'formAddFasilitas')->name('formAddFasilitas');
					Route::post('/saveFasilitas', 'saveFasilitas')->name('saveFasilitas');
				});
			});
			# Modul sekolah end
		});
		# Modul berita end
		// Route::group(['prefix' => 'berita'], function () { # Modul berita
		// 	// Route::group(['prefix' => 'sekolah'], function () {
		// 	// 	Route::get('/{id}', [Admin::class, 'beritaSekolah'])->name('beritaSekolah');
		// 	// 	Route::post('/formAddBeritaSekolah', [Admin::class, 'formAddBeritaSekolah'])->name('formAddBeritaSekolah');
		// 	// 	Route::post('/formUpdateBeritaSekolah', [Admin::class, 'formUpdateBeritaSekolah'])->name('formUpdateBeritaSekolah');
		// 	// 	Route::post('/getBeritaSekolah', [Admin::class, 'tampilBeritaSekolah'])->name('tampilBeritaSekolah');
		// 	// 	Route::post('/upload', [Admin::class, 'uploadBeritaSekolah'])->name('uploadBeritaSekolah');
		// 	// 	Route::post('/update', [Admin::class, 'updateBeritaSekolah'])->name('updateBeritaSekolah');
		// 	// 	Route::post('/delete', [Admin::class, 'deleteBeritaSekolah'])->name('deleteBeritaSekolah');
		// 	// });
		// });
	});
	Route::group(array('prefix' => 'petugas-sekolah'), function () { #Web petugas sekolah
		Route::get('/', [Dashboard::class, 'mainPetugas'])->name('dashboardPetugas');
		Route::get('/get-dashboard-petugas', [Dashboard::class, 'getDashboardPetugas'])->name('getDashboardPetugas');
		Route::group(array('prefix' => 'data-guru'), function () {
			Route::get('/', [DataGuru::class, 'main'])->name('dataGuru');
			Route::post('/form', [DataGuru::class, 'form'])->name('tambahGuru');
			Route::post('/store-data-diri', [DataGuru::class, 'saveDataDiri'])->name('saveDataDiri');
			Route::post('/store-data-pendidikan', [DataGuru::class, 'saveDataPendidikan'])->name('saveDataPendidikan');
			Route::post('/store-data-penugasan', [DataGuru::class, 'saveDataPenugasan'])->name('saveDataPenugasan');
			Route::post('/store-data-pendukung', [DataGuru::class, 'saveDataPendukung'])->name('saveDataPendukung');
			Route::post('/delete-data-guru', [DataGuru::class, 'deleteGuru'])->name('deleteGuru');
		});
		Route::group(array('prefix' => 'data-tugas-pegawai'), function () {
			Route::get('/', [DataTugasPegawai::class, 'main'])->name('dataTugasPegawai');
			Route::post('/modal-form', [DataTugasPegawai::class, 'modalForm'])->name('tugasModalForm');
			Route::post('/store', [DataTugasPegawai::class, 'save'])->name('saveTugasPegawai');
			Route::post('/delete', [DataTugasPegawai::class, 'delete'])->name('deleteTugasPegawai');
		});
		Route::group(array('prefix' => 'data-kelas'), function () {
			Route::get('/', [DataKelas::class, 'main'])->name('dataKelas');
			Route::post('/modal-form', [DataKelas::class, 'modalForm'])->name('kelasModalForm');
			Route::post('/store', [DataKelas::class, 'save'])->name('saveKelas');
			Route::post('/delete', [DataKelas::class, 'delete'])->name('deleteKelas');
		});
		Route::group(array('prefix' => 'data-pelajaran'), function () {
			Route::get('/', [DataPelajaran::class, 'main'])->name('dataPelajaran');
			Route::post('/datatable-dataPelajaran', [DataPelajaran::class, 'main'])->name('datatableDataPelajaran');
			Route::post('/form', [DataPelajaran::class, 'form'])->name('formDataPelajaran');
			Route::post('/store', [DataPelajaran::class, 'save'])->name('saveDataPelajaran');
			Route::post('/delete', [DataPelajaran::class, 'delete'])->name('deleteDataPelajaran');
		});
		Route::group(array('prefix' => 'data-pengembangan-diri'), function () {
			Route::get('/', [PengembanganDiri::class, 'main'])->name('mainPengembanganDiri');
			Route::post('/pengembangan-diri', [PengembanganDiri::class, 'pengembanganDiri'])->name('pengembanganDiriPetugas');
			Route::post('/mst-pengembangan-diri', [PengembanganDiri::class, 'mstPengembanganDiri'])->name('mstPengembanganDiri');
			Route::post('/form-pengembangan-diri', [PengembanganDiri::class, 'formPengembanganDiri'])->name('formPengembanganDiri');
			Route::post('/form-lihat-pengembangan-diri', [PengembanganDiri::class, 'formLihatPengembanganDiri'])->name('formLihatPengembanganDiri');
			Route::post('/form-mst-pengembangan-diri', [PengembanganDiri::class, 'formMstPengembanganDiri'])->name('formMstPengembanganDiri');
			Route::post('/save-pengembangan-diri', [PengembanganDiri::class, 'savePengembanganDiri'])->name('savePengembanganDiri');
			Route::post('/save-mst-pengembangan-diri', [PengembanganDiri::class, 'saveMstPengembanganDiri'])->name('saveMstPengembanganDiri');
			Route::post('/verif-pengembangan-diri', [PengembanganDiri::class, 'verifPengembanganDiri'])->name('verifPengembanganDiri');
			Route::post('/tolak-pengembangan-diri', [PengembanganDiri::class, 'tolakPengembanganDiri'])->name('tolakPengembanganDiri');
			Route::post('/delete-pengembangan-diri', [PengembanganDiri::class, 'deleteMstPengembanganDiri'])->name('deleteMstPengembanganDiri');
			
		});
		Route::group(array('prefix' => 'data-administrasi'), function () {
			Route::get('/', [DataAdministrasi::class, 'mainPetugas'])->name('dataAdministrasiPetugas');
			Route::post('/modal-form', [DataAdministrasi::class, 'modalFormPetugas'])->name('administrasiModalFormPetugas');
			Route::post('/verifikasi', [DataAdministrasi::class, 'verifikasi'])->name('verifAdministrasiPetugas');
			Route::post('/tolak', [DataAdministrasi::class, 'tolak'])->name('tolakAdministrasiPetugas');
			Route::post('/modal-berkas', [DataAdministrasi::class, 'modalBerkas'])->name('modalBerkasGuru');
			Route::post('/upload-berkas-guru', [DataAdministrasi::class, 'uploadBerkas'])->name('uploadBerkasGuru');
		});
		Route::group(array('prefix' => 'berbagi-dokumen'), function () {
			Route::get('/', [BerbagiDokumen::class, 'main'])->name('berbagiDokumen');
			Route::post('/datatable-berbagiDokumen', [BerbagiDokumen::class, 'main'])->name('datatableBerbagiDokumen');
			Route::post('/modal-form', [BerbagiDokumen::class, 'modalForm'])->name('berbagiDokumenModal');
			Route::post('/store', [BerbagiDokumen::class, 'save'])->name('saveBerbagiDokumen');
			Route::post('/delete', [BerbagiDokumen::class, 'delete'])->name('deleteBerbagiDokumen');
		});
		Route::group(array('prefix' => 'master_sim'), function () {
			Route::get('/', [MasterSIMController::class, 'main'])->name('masterSim');
			Route::post('/modal-form', [MasterSIMController::class, 'modalForm'])->name('masterSimModalForm');
			Route::post('/store', [MasterSIMController::class, 'save'])->name('saveMasterSim');
			Route::post('/delete', [MasterSIMController::class, 'delete'])->name('deleteMasterSim');
		});
		Route::group(array('prefix' => 'pengguna'), function () {
			Route::get('/', [Pengguna::class, 'main'])->name('pengguna');
			Route::post('/modal-form', [Pengguna::class, 'modalForm'])->name('penggunaModalForm');
			Route::post('/store', [Pengguna::class, 'save'])->name('savePengguna');
			Route::post('/delete', [Pengguna::class, 'delete'])->name('deletePengguna');
		});
		Route::group(array('prefix' => 'reset-akun'), function () {
			Route::get('/', [Pengaturan::class, 'main'])->name('resetAkun');
			Route::post('/reset', [Pengaturan::class, 'reset'])->name('resetAkunUser');
			Route::post('/remove', [Pengaturan::class, 'remove'])->name('removeAkunUser');
		});
		Route::group(array('prefix' => 'pengaturan'), function () {
			Route::get('/', [Pengaturan::class, 'form'])->name('pengaturan');
			Route::post('/store', [Pengaturan::class, 'save'])->name('savePengaturan');
		});
	});
	Route::group(array('prefix' => 'guru-pengajar'), function () { #Web petugas sekolah
		Route::group(array('prefix' => 'Dashboard'), function () {
			Route::get('/', [Dashboard::class, 'mainGuru'])->name('dashboardGuru');
		});
		Route::group(array('prefix' => 'data-pelajaran'), function () {
			Route::get('/', [DataPelajaran::class, 'mainGuru'])->name('dataPelajaranGuru');
			Route::post('/datatable', [DataPelajaran::class, 'mainGuru'])->name('datatableDataPelajaranGuru');
		});	
		Route::group(array('prefix' => 'profile'), function () {
			Route::get('/', [Profil::class, 'form'])->name('profile');
		});
		Route::group(array('prefix' => 'data-pengembangan-diri'), function () {
			Route::get('/', [PengembanganDiri::class, 'mainPengembanganDiriGuru'])->name('mainPengembanganDiriGuru');
			Route::post('/form-pengembangan-diri-guru', [PengembanganDiri::class, 'formPengembanganDiriGuru'])->name('formPengembanganDiriGuru');
			Route::post('/delete-pengembangan-diri-guru', [PengembanganDiri::class, 'delete'])->name('deletePengembanganDiriGuru');
			Route::post('/save-pengembangan-diri-guru', [PengembanganDiri::class, 'savePengembanganDiriGuru'])->name('savePengembanganDiriGuru');
		});
		Route::group(array('prefix' => 'data-administrasi'), function () {
			Route::get('/', [DataAdministrasi::class, 'main'])->name('dataAdministrasi');
			Route::post('/modal-form', [DataAdministrasi::class, 'modalForm'])->name('administrasiModalForm');
			Route::post('/store', [DataAdministrasi::class, 'save'])->name('saveAdministrasi');
			Route::post('/delete', [DataAdministrasi::class, 'delete'])->name('deleteAdministrasi');
		});
	});
});
