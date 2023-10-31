<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Identity;
use App\Http\Libraries\compressFile;
use App\Models\Menus;
use App\Models\Slider;
use App\Models\Berita;
use App\Models\Berita_pilihan;
use App\Models\Users;
use App\Models\Iklan;
use App\Models\Galeri;
use App\Models\Amtv;
use App\Models\Exkul;
use App\Models\Tags;
use App\Models\KataJorok;
use Redirect, File, Sentinel, DataTables, Validator, DB, Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller{
	public function identitas(Request $request){
		$data['mn_active'] = 'identitas';
		$data['subMenuActive'] = '';
		$data['title'] = 'Identitas';
		$data['identity'] = Identity::find(1);
		return view('content.admin.identitas.main', $data);
	}
	public function changeIdentity(Request $request){
		$identity = Identity::find(1);
		$identity->nama_web = $request->nama_web;
		$identity->url =$request->url;
		$identity->meta = $request->meta;
		$identity->alamat = $request->alamat;
		$identity->phone = $request->phone;
		$identity->email = $request->email;
		// $identity->rekening = $request->rekening;
		$identity->rekening = '-';
		$identity->fb = $request->fb;
		$identity->instagram = $request->instagram;
		$identity->gplus = $request->gplus;
		$identity->twitter = $request->twitter;
		$identity->youtube = $request->youtube;
		if (!empty($request->icon)) {
			if($identity->favicon!=''){
				if(file_exists('uploads/identitas/'.$identity->favicon)){
					unlink('uploads/identitas/'.$identity->favicon);
				}
			}
			$ukuranFile1 = filesize($request->icon);
			if ($ukuranFile1 <= 500000) {
				$ext_foto1 = $request->icon->getClientOriginalExtension();
				$filename1 = "Icon".date('Ymd-His').".".$ext_foto1;
				$temp_foto1 = 'uploads/identitas/';
				$proses1 = $request->icon->move($temp_foto1, $filename1);
				$identity->favicon = $filename1;
			}else{
				$file1=$_FILES['icon']['name'];
				$ext_foto1 = $request->icon->getClientOriginalExtension();
				if(!empty($file1)){
					$direktori1='uploads/identitas/'; //tempat upload foto
					$name1='icon'; //name pada input type file
					$namaBaru1="Icon".date('Ymd-His'); //name pada input type file
					$quality1=50; //konversi kualitas gambar dalam satuan %
					$upload1 = compressFile::UploadCompress($namaBaru1,$name1,$direktori1,$quality1);
				}
				$identity->favicon = $namaBaru1.".".$ext_foto1;
			}
		}
		if(!empty($request->lokasi)){
			$identity->lokasi = $request->lokasi;
		}
		$identity->save();
		if ($identity) {
			Session::flash('success', 'Berhasil Menyimpan Data');
			return Redirect::route('identitas');
		} else {
			Session::flash('error', 'Gagal Menyimpan Data');
			return Redirect::route('identitas');
		}
	}


	# Modul web start
	public function logo(Request $request) {
		if(request()->ajax()){
			return DataTables::of(Identity::get())
			->addIndexColumn()
			->addColumn('image', function($row){
				if(file_exists(public_path()."/uploads/identitas/$row->logo_kiri")){
					$image = "/uploads/identitas/$row->logo_kiri";
				}else{
					$image = '/uploads/default.jpg';
				}
				$html = "<img class='rounded mx-auto d-block responsive img-thumbnail' src='$image' width='100' height='100'>";
				return $html;
			})
			->addColumn('actions', function($row){
				$html = "
				<button style='color: #fff' class='btn btn-sm btn-secondary' title='Detail' onclick='formAdd(`$row->id_identitas`)'><i class='fadeIn animated bx bx-file' aria-hidden='true'></i></button>
				";
				return $html;
			})
			->rawColumns(['actions','image'])->toJson();
		}
		$data['title'] = 'Logo';
		return view('content.admin.logo.main', $data);
	}
	public function formUpdateLogo(Request $request){
		$data['identity'] = Identity::find(1);
		$data['position'] = $request->posisi;
		$content = view('content.admin.logo.form', $data)->render();
		return ['status' => 'success', 'content' => $content];
	}
	public function saveLogo(Request $request){
		// return $request->all();
		$identity = Identity::find(1);
		if ($request->position == "Kiri") {
			if (!empty($request->logo)) {
				if($identity->logo_kiri!=''){
					if(file_exists('./uploads/identitas/'.$identity->logo_kiri)){
						unlink('./uploads/identitas/'.$identity->logo_kiri);
					}
				}
				$ukuranFile1 = filesize($request->logo);
				if ($ukuranFile1 <= 500000) {
					$ext_foto1 = $request->logo->getClientOriginalExtension();
					$filename1 = "Icon".date('Ymd-His').".".$ext_foto1;
					$temp_foto1 = 'uploads/identitas/';
					$proses1 = $request->logo->move($temp_foto1, $filename1);
					$identity->logo_kiri = $filename1;
				}else{
					$file1=$_FILES['logo']['name'];
					$ext_foto1 = $request->logo->getClientOriginalExtension();
					if(!empty($file1)){
						$direktori1='uploads/identitas/'; //tempat upload foto
						$name1='logo'; //name pada input type file
						$namaBaru1="Icon".date('Ymd-His'); //name pada input type file
						$quality1=50; //konversi kualitas gambar dalam satuan %
						$upload1 = compressFile::UploadCompress($namaBaru1,$name1,$direktori1,$quality1);
					}
					$identity->logo_kiri = $namaBaru1.".".$ext_foto1;
				}
			}
		}
		$identity->save();
		if ($identity) {
			return ['code'=>200,'status'=>'success','message'=>'Data berhasil diperbarui.'];
		} else {
			return ['code'=>201,'status'=>'error','message'=>'Data gagal diperbarui.'];
		}
	}


	public function slider(Request $request) {
		if(request()->ajax()){
			return DataTables::of(Slider::orderBy('id_slider','ASC')->get())
			->addIndexColumn()
			->addColumn('image', function($row){
				if(file_exists(public_path()."/uploads/slider/$row->gambar")){
					$image = "/uploads/slider/$row->gambar";
				}else{
					$image = '/uploads/default.jpg';
				}
				$html = "<img class='rounded mx-auto d-block responsive img-thumbnail' src='$image' width='100' height='100'>";
				return $html;
			})
			->addColumn('actions', function($row){
				$html = "
				<button style='color: #fff' class='btn btn-sm btn-secondary' title='Detail' onclick='formAdd(`$row->id_slider`)'><i class='fadeIn animated bx bx-file' aria-hidden='true'></i></button>
				";
				return $html;
			})
			->rawColumns(['actions','image'])
			->toJson();
		}
		$data['title'] = 'Slider Gambar';
		return view('content.admin.slider.main', $data);
	}
	public function formUpdateSlider(Request $request){
		$data['slider'] = Slider::find($request->id);
		$content = view('content.admin.slider.form',$data)->render();
		return ['status' => 'success', 'content' => $content];
	}
	public function saveSlider(Request $request){
		$slider = Slider::find($request->id_slider);
		$foto = date('YmdHis');
		if (!empty($request->logo)) {
			if($slider->gambar!=''){
				if(file_exists('uploads/slider/'.$slider->gambar)){
					unlink('uploads/slider/'.$slider->gambar);
				}
			}
			$ukuranFile1 = filesize($request->logo);
			if ($ukuranFile1 <= 500000) {
				$ext_foto1 = $request->logo->getClientOriginalExtension();
				$filename1 = "Slider".date('Ymd-His').".".$ext_foto1;
				$temp_foto1 = 'uploads/slider/';
				$proses1 = $request->logo->move($temp_foto1, $filename1);
				$slider->gambar = $filename1;
			}else{
				$file1=$_FILES['logo']['name'];
				$ext_foto1 = $request->logo->getClientOriginalExtension();
				if(!empty($file1)){
					$direktori1='uploads/slider/'; //tempat upload foto
					$name1='logo'; //name pada input type file
					$namaBaru1="Slider".date('Ymd-His'); //name pada input type file
					$quality1=50; //konversi kualitas gambar dalam satuan %
					$upload1 = compressFile::UploadCompress($namaBaru1,$name1,$direktori1,$quality1);
				}
				$slider->gambar = $namaBaru1.".".$ext_foto1;
			}
		}
		$slider->save();
		if ($slider) {
			return ['code'=>200,'status'=>'success','message'=>'Data berhasil diperbarui.'];
		} else {
			return ['code'=>201,'status'=>'error','message'=>'Data gagal diperbarui.'];
		}
	}
	# Modul web end


	#Modul sekolah
	public function sejarah(Request $request) {#Sejarah
		$data['mn_active'] = 'modulSekolah';
		$data['subMenuActive'] = 'sejarah';
		$data['title'] = 'Sejarah';
		$data['identity'] = Identity::find(1);
		return view('content.admin.sejarah.main', $data);
	}
	public function updateSejarah(Request $request){
		$identity = Identity::find(1);
		$identity->sejarah = $request->sejarah_isi;
		if (!empty($request->gambar)) {
			if($identity->foto_sejarah!=''){
				if(file_exists('./uploads/identitas/'.$identity->foto_sejarah)){
					unlink('./uploads/identitas/'.$identity->foto_sejarah);
				}
			}
			$ukuranFile1 = filesize($request->gambar);
			if ($ukuranFile1 <= 500000) {
				$ext_foto1 = $request->gambar->getClientOriginalExtension();
				$filename1 = "Sejarah".date('Ymd-His').".".$ext_foto1;
				$temp_foto1 = 'uploads/identitas/';
				$proses1 = $request->gambar->move($temp_foto1, $filename1);
				$identity->foto_sejarah = $filename1;
			}else{
				$file1=$_FILES['gambar']['name'];
				$ext_foto1 = $request->gambar->getClientOriginalExtension();
				if(!empty($file1)){
					$direktori1='uploads/identitas/'; //tempat upload foto
					$name1='gambar'; //name pada input type file
					$namaBaru1="Sejarah".date('Ymd-His'); //name pada input type file
					$quality1=50; //konversi kualitas gambar dalam satuan %
					$upload1 = compressFile::UploadCompress($namaBaru1,$name1,$direktori1,$quality1);
				}
				$identity->foto_sejarah = $namaBaru1.".".$ext_foto1;
			}
		}
		$identity->save();
		if ($identity) {
			session()->flash('success', 'Berhasil!');
			return Redirect::route('sekolah.sejarah.main');
		} else {
			session()->flash('error', 'Gagal!');
			return Redirect::route('sekolah.sejarah.main');
		}
	}
	public function visimisi(Request $request) {#Visimisi
		$data['mn_active'] = 'modulSekolah';
		$data['subMenuActive'] = 'visimisi';
		$data['title'] = 'Visi dan Misi';
		$data['identity'] = Identity::find(1);
		return view('content.admin.visimisi.main', $data);
	}
	public function updateVisimisi(Request $request)
	{
		$identity = Identity::find(1);
		$identity->vm = $request->visimisi;
		if (!empty($request->gambar)) {
			if($identity->foto_vm!=''){
				if(file_exists('./uploads/identitas/'.$identity->foto_vm)){
					unlink('./uploads/identitas/'.$identity->foto_vm);
				}
			}
			$ukuranFile1 = filesize($request->gambar);
			if ($ukuranFile1 <= 500000) {
				$ext_foto1 = $request->gambar->getClientOriginalExtension();
				$filename1 = "VM".date('Ymd-His').".".$ext_foto1;
				$temp_foto1 = 'uploads/identitas/';
				$proses1 = $request->gambar->move($temp_foto1, $filename1);
				$identity->foto_vm = $filename1;
			}else{
				$file1=$_FILES['gambar']['name'];
				$ext_foto1 = $request->gambar->getClientOriginalExtension();
				if(!empty($file1)){
					$direktori1='uploads/identitas/'; //tempat upload foto
					$name1='gambar'; //name pada input type file
					$namaBaru1="VM".date('Ymd-His'); //name pada input type file
					$quality1=50; //konversi kualitas gambar dalam satuan %
					$upload1 = compressFile::UploadCompress($namaBaru1,$name1,$direktori1,$quality1);
				}
				$identity->foto_vm = $namaBaru1.".".$ext_foto1;
			}
		}
		$identity->save();
		if ($identity) {
			session()->flash('success', 'Berhasil!');
			return Redirect::route('sekolah.visimisi.main');
		} else {
			session()->flash('error', 'gagal!');
			return Redirect::route('sekolah.visimisi.main');
		}
	}
	public function kepsek(Request $request) {#Kepsek
		$data['mn_active'] = 'modulSekolah';
		$data['subMenuActive'] = 'sambutan';
		$data['title'] = 'Sambutan Kepala Sekolah';
		$data['identity'] = Identity::find(1);
		return view('content.admin.kepsek.main', $data);
	}
	public function updateKepsek(Request $request)
	{
		$identity = Identity::find(1);
		$identity->sambutan_kepsek = $request->kepsek;
		if (!empty($request->gambar)) {
			if($identity->foto_kepsek!=''){
				if(file_exists('./uploads/identitas/'.$identity->foto_kepsek)){
					unlink('./uploads/identitas/'.$identity->foto_kepsek);
				}
			}
			$ukuranFile1 = filesize($request->gambar);
			if ($ukuranFile1 <= 500000) {
				$ext_foto1 = $request->gambar->getClientOriginalExtension();
				$filename1 = "Kepsek".date('Ymd-His').".".$ext_foto1;
				$temp_foto1 = 'uploads/identitas/';
				$proses1 = $request->gambar->move($temp_foto1, $filename1);
				$identity->foto_kepsek = $filename1;
			}else{
				$file1=$_FILES['gambar']['name'];
				$ext_foto1 = $request->gambar->getClientOriginalExtension();
				if(!empty($file1)){
					$direktori1='uploads/identitas/'; //tempat upload foto
					$name1='gambar'; //name pada input type file
					$namaBaru1="Kepsek".date('Ymd-His'); //name pada input type file
					$quality1=50; //konversi kualitas gambar dalam satuan %
					$upload1 = compressFile::UploadCompress($namaBaru1,$name1,$direktori1,$quality1);
				}
				$identity->foto_kepsek = $namaBaru1.".".$ext_foto1;
			}
		}
		$identity->save();
		if ($identity) {
			session()->flash('success', 'Berhasil!');
			return Redirect::route('sekolah.kepsek.main');
		} else {
			session()->flash('error', 'Gagal!');
			return Redirect::route('sekolah.kepsek.main');
		}
	}
	public function uks(Request $request) {#Uks
		$data['mn_active'] = 'modulSekolah';
		$data['subMenuActive'] = 'uks';
		$data['title'] = 'UKS';
		$data['data'] = Identity::find(1);
		return view('content.admin.uks.main', $data);
	}
	public function updateUks(Request $request)
	{
		$identity = Identity::find(1);
		$identity->uks = $request->uks;
		if (!empty($request->gambar)) {
			if($identity->foto_uks!=''){
				if(file_exists('./uploads/identitas/'.$identity->foto_uks)){
					unlink('./uploads/identitas/'.$identity->foto_uks);
				}
			}
			$ukuranFile1 = filesize($request->gambar);
			if ($ukuranFile1 <= 500000) {
				$ext_foto1 = $request->gambar->getClientOriginalExtension();
				$filename1 = "UKS".date('Ymd-His').".".$ext_foto1;
				$temp_foto1 = 'uploads/identitas/';
				$proses1 = $request->gambar->move($temp_foto1, $filename1);
				$identity->foto_uks = $filename1;
			}else{
				$file1=$_FILES['gambar']['name'];
				$ext_foto1 = $request->gambar->getClientOriginalExtension();
				if(!empty($file1)){
					$direktori1='uploads/identitas/'; //tempat upload foto
					$name1='gambar'; //name pada input type file
					$namaBaru1="UKS".date('Ymd-His'); //name pada input type file
					$quality1=50; //konversi kualitas gambar dalam satuan %
					$upload1 = compressFile::UploadCompress($namaBaru1,$name1,$direktori1,$quality1);
				}
				$identity->foto_uks = $namaBaru1.".".$ext_foto1;
			}
		}
		$identity->save();
		if ($identity) {
			session()->flash('success', 'Berhasil!');
			return Redirect::route('sekolah.uks.main');
		} else {
			session()->flash('error', 'Gagal!');
			return Redirect::route('sekolah.uks.main');
		}
	}
	public function organisasi(Request $request) {#Struktur organisasi
		$data['mn_active'] = 'modulSekolah';
		$data['subMenuActive'] = 'organisasi';
		$data['title'] = 'Struktur Organisasi';
		$data['identity'] = Identity::find(1);
		return view('content.admin.organisasi.main', $data);
	}
	public function updateOrganisasi(Request $request)
	{
		$identity = Identity::find(1);
		// $identity->struktur_organisasi = $request->organisasi;
		if (!empty($request->gambar)) {
			if($identity->foto_struktur!=''){
				if(file_exists('./uploads/identitas/'.$identity->foto_struktur)){
					unlink('./uploads/identitas/'.$identity->foto_struktur);
				}
			}
			$ukuranFile1 = filesize($request->gambar);
			if ($ukuranFile1 <= 500000) {
				$ext_foto1 = $request->gambar->getClientOriginalExtension();
				$filename1 = "Organisasi".date('Ymd-His').".".$ext_foto1;
				$temp_foto1 = 'uploads/identitas/';
				$proses1 = $request->gambar->move($temp_foto1, $filename1);
				$identity->foto_struktur = $filename1;
			}else{
				$file1=$_FILES['gambar']['name'];
				$ext_foto1 = $request->gambar->getClientOriginalExtension();
				if(!empty($file1)){
					$direktori1='uploads/identitas/'; //tempat upload foto
					$name1='gambar'; //name pada input type file
					$namaBaru1="Organisasi".date('Ymd-His'); //name pada input type file
					$quality1=50; //konversi kualitas gambar dalam satuan %
					$upload1 = compressFile::UploadCompress($namaBaru1,$name1,$direktori1,$quality1);
				}
				$identity->foto_struktur = $namaBaru1.".".$ext_foto1;
			}
		}
		$identity->save();
		if ($identity) {
			session()->flash('success', 'Berhasil!');
			return Redirect::route('sekolah.organisasi.main');
		} else {
			session()->flash('error', 'Gagal!');
			return Redirect::route('sekolah.organisasi.main');
		}
	}


	# Moudul ekstrakurikuler start
	public function ekskul(Request $request) {
		if($request->ajax()){
			// return Exkul::get();
			return DataTables::of(Exkul::where('type_exkul',1)->get())
			->addIndexColumn()
			->addColumn('gambar', function($row){
				if(file_exists(public_path()."/uploads/exkul/$row->foto")){
					$image = "/uploads/exkul/$row->foto";
				}else{
					$image = '/uploads/default.jpg';
				}
				$html = "<img class='rounded mx-auto d-block responsive img-thumbnail' src='$image' width='100' height='100'>";
				return $html;
			})
			->addColumn('nama', function($row){
				$html = "<p class='p-0'>".($row->nama_exkul ? $row->nama_exkul : "-")."</p>";
				return $html;
			})
			->addColumn('status', function($row){
				$status = $row->status_exkul==1 ? 'Aktif' : 'Non-aktif';
				$html = "<p class='p-0'>$status</p>";
				return $html;
			})
			->addColumn('actions', function($row){
				$html = "<button class='btn btn-sm btn-primary' title='Edit' onclick='editExkul(`$row->id_exkul`)'><i class='fa-regular fa-pen-to-square'></i></button>";
				// $html .= " <button class='btn btn-sm btn-danger' title='Hapus' onclick='hapusFasilitas(`$row->id_amtv`)'><i class='fa-solid fa-trash'></i></button>";
				return $html;
			})
			->rawColumns(['gambar','nama','status','actions'])
			->toJson();
		}
		$data['mn_active'] = 'modulSekolah';
		$data['subMenuActive'] = 'ekstrakurikuler';
		$data['title'] = 'Ekstra Kulikuler';
		return view('content.admin.ekskul.main', $data);
	}
	public function formAddEkskul(Request $request){
		// return$request->id;
		if (empty($request->id)) {
			$data['data'] = '';
		} else {
			$data['data'] = Exkul::where('id_exkul', $request->id)->where('type_exkul',1)->first();
		}
		$content = view('content.admin.ekskul.form', $data)->render();
		return ['status' => 'success', 'content' => $content];
	}
	public function saveExkul(Request $request) {
		// return $request->all();
		if (empty($request->id)) {
			$ekskul = new Exkul;
		} else {
			$ekskul = Exkul::find($request->id);
		}
		$ekskul->nama_exkul = $request->nama_exkul;
		$ekskul->deskripsi = $request->deskripsi;
		$ekskul->status_exkul = $request->status;
		$foto = date('YmdHis');
		if (!empty($request->logo)) {
			if($ekskul->foto!=''){
				if(file_exists('uploads/ekskul/'.$ekskul->foto)){
					unlink('uploads/ekskul/'.$ekskul->foto);
				}
			}
			$ukuranFile1 = filesize($request->logo);
			if ($ukuranFile1 <= 500000) {
				$ext_foto1 = $request->logo->getClientOriginalExtension();
				$filename1 = "Fasilitas".date('Ymd-His').".".$ext_foto1;
				$temp_foto1 = 'uploads/exkul/';
				$proses1 = $request->logo->move($temp_foto1, $filename1);
				$ekskul->foto = $filename1;
			}else{
				$file1=$_FILES['logo']['name'];
				$ext_foto1 = $request->logo->getClientOriginalExtension();
				if(!empty($file1)){
					$direktori1='uploads/exkul/'; //tempat upload foto
					$name1='logo'; //name pada input type file
					$namaBaru1="Fasilitas".date('Ymd-His'); //name pada input type file
					$quality1=50; //konversi kualitas gambar dalam satuan %
					$upload1 = compressFile::UploadCompress($namaBaru1,$name1,$direktori1,$quality1);
				}
				$ekskul->foto = $namaBaru1.".".$ext_foto1;
			}
		}
		$ekskul->type_exkul = 1;
		$ekskul->save();
		if ($ekskul) {
			return ['code'=>200,'status'=>'success','Berhasil.'];
		} else {
			return ['code'=>201,'status'=>'error','Gagal.'];
		}
	}
	# Modul ekstrakurikuler end
	# Modul fasilitas sekolah start
	public function fasilitas(Request $request){#Fasilitas sekolah
		// return Exkul::where('type_exkul',2)->get();
		if($request->ajax()){
			return DataTables::of(Exkul::where('type_exkul',2)->get())
			->addIndexColumn()
			->addColumn('gambar', function($row){
				if(file_exists(public_path()."/uploads/exkul/$row->foto")){
					$image = "/uploads/exkul/$row->foto";
				}else{
					$image = '/uploads/default.jpg';
				}
				$html = "<img class='rounded mx-auto d-block responsive img-thumbnail' src='$image' width='100' height='100'>";
				return $html;
			})
			->addColumn('deskripsi', function($row){
				$html = "<p class='p-0'>".($row->nama_exkul ? $row->nama_exkul : "-")."</p>";
				return $html;
			})
			->addColumn('status', function($row){
				$status = $row->status_exkul==1 ? 'Aktif' : 'Non-aktif';
				$html = "<p class='p-0'>$status</p>";
				return $html;
			})
			->addColumn('actions', function($row){
				$html = "<button class='btn btn-sm btn-primary' title='Edit' onclick='editFasilitas(`$row->id_exkul`)'><i class='fa-regular fa-pen-to-square'></i></button>";
				return $html;
			})
			->rawColumns(['gambar','deskripsi','status','actions'])
			->toJson();
		}
		$data['mn_active'] = 'modulSekolah';
		$data['subMenuActive'] = 'fasilitas';
		$data['title'] = 'Fasilitas Sekolah';
		return view('content.admin.fasilitas.main', $data);
	}
	public function formAddFasilitas(Request $request){
		if (empty($request->id)) {
			$data['data'] = '';
		} else {
			$data['data'] = Exkul::where('id_exkul', $request->id)->where('type_exkul',2)->first();
		}
		$content = view('content.admin.fasilitas.form', $data)->render();
		return ['status' => 'success', 'content' => $content];
	}
	public function saveFasilitas(Request $request) {
		// return $request->all();
		if (empty($request->id)) {
			$ekskul = new Exkul;
		} else {
			$ekskul = Exkul::find($request->id);
		}
		$ekskul->nama_exkul = $request->nama_exkul;
		$ekskul->deskripsi = $request->deskripsi;
		$ekskul->status_exkul = $request->status;
		$foto = date('YmdHis');
		if (!empty($request->logo)) {
			if($ekskul->foto!=''){
				if(file_exists('uploads/ekskul/'.$ekskul->foto)){
					unlink('uploads/ekskul/'.$ekskul->foto);
				}
			}
			$ukuranFile1 = filesize($request->logo);
			if ($ukuranFile1 <= 500000) {
				$ext_foto1 = $request->logo->getClientOriginalExtension();
				$filename1 = "Fasilitas".date('Ymd-His').".".$ext_foto1;
				$temp_foto1 = 'uploads/exkul/';
				$proses1 = $request->logo->move($temp_foto1, $filename1);
				$ekskul->foto = $filename1;
			}else{
				$file1=$_FILES['logo']['name'];
				$ext_foto1 = $request->logo->getClientOriginalExtension();
				if(!empty($file1)){
					$direktori1='uploads/exkul/'; //tempat upload foto
					$name1='logo'; //name pada input type file
					$namaBaru1="Fasilitas".date('Ymd-His'); //name pada input type file
					$quality1=50; //konversi kualitas gambar dalam satuan %
					$upload1 = compressFile::UploadCompress($namaBaru1,$name1,$direktori1,$quality1);
				}
				$ekskul->foto = $namaBaru1.".".$ext_foto1;
			}
		}
		$ekskul->type_exkul = 2;
		$ekskul->save();
		if ($ekskul) {
			return ['code'=>200,'status'=>'success','Berhasil.'];
		} else {
			return ['code'=>201,'status'=>'error','Gagal.'];
		}
	}
	# Modul fasilitas sekolah end
	#Modul media start
	public function amtv(Request $request) { # Amtv
		$data['mn_active'] = 'modulMedia';
		$data['subMenuActive'] = 'amtv';
		$data['title'] = 'AMTV';
		if(request()->ajax()){
			return DataTables::of(Amtv::get())
			->addIndexColumn()
			->addColumn('judul', function($row){
				$html = "<p class='p-0'>$row->judul_amtv</p>";
				return $html;
			})
			->addColumn('file', function($row){
				if($row->file){
					$uri = str_replace('watch?v=','embed/',$row->file);
					// $html = "<iframe width='250' height='auto' src='https://www.youtube.com/embed/tgbNymZ7vqY'></iframe>";
					$html = "<iframe width='250' height='auto' src='$uri'></iframe>";
				}else{
					$html = "<img class='rounded mx-auto d-block responsive img-thumbnail' src='/default.jpg' width='100' height='100'>";
				}
				return $html;
			})
			->addColumn('status', function($row){
				$status = $row->status_amtv==1 ? 'Aktif' : 'Non-aktif';
				$html = "<p class='p-0'>$status</p>";
				return $html;
			})
			->addColumn('actions', function($row){
				$html = "<button class='btn btn-sm btn-primary' title='Edit' onclick='formAdd(`$row->id_amtv`)'><i class='fa-regular fa-pen-to-square'></i></button>";
				$html .= " <button class='btn btn-sm btn-danger' title='Hapus' onclick='hapusAmtv(`$row->id_amtv`)'><i class='fa-solid fa-trash'></i></button>";
				return $html;
			})
			->rawColumns(['judul','file','status','actions'])
			->toJson();
		}
		return view('content.admin.amtv.main', $data);
	}
	public function formAddAmtv(Request $request){
		if (empty($request->id)) {
			$data['data'] = '';
		} else {
			$data['data'] = Amtv::where('id_amtv', $request->id)->first();
		}
		$content = view('content.admin.amtv.form', $data)->render();
		return ['status' => 'success', 'content' => $content];
	}
	public function saveAmtv(Request $request) {
		if (empty($request->id)) {
			$amtv = new Amtv;
		} else {
			$amtv = Amtv::find($request->id);
		}
		$amtv->judul_amtv = $request->judul;
		$amtv->file = $request->link;
		$amtv->status_amtv = $request->status;
		$amtv->save();
		if ($amtv) {
			return ['code'=>200,'status'=>'success','Berhasil.'];
		} else {
			return ['code'=>201,'status'=>'error','Gagal.'];
		}
	}
	public function deleteAmtv(Request $request){
		$amtv = Amtv::where('id_amtv',$request->id)->delete();
		if ($amtv) {
			return ['code'=>200,'status'=>'success','Berhasil.'];
		} else {
			return ['code'=>201,'status'=>'error','Gagal.'];
		}
	}

	public function galeri(){
		$data['mn_active'] = 'modulMedia';
		$data['subMenuActive'] = 'galeri';
		$data['title'] = 'Galeri';
		if(request()->ajax()){
			return DataTables::of(Galeri::get())
			->addIndexColumn()
			->addColumn('gambar', function($row){
				if(file_exists(public_path()."/uploads/galeri/$row->file_galeri")){
					$image = "/uploads/galeri/$row->file_galeri";
				}else{
					$image = '/uploads/default.jpg';
				}
				$html = "<img class='rounded mx-auto d-block responsive img-thumbnail' src='$image' width='100' height='100'>";
				return $html;
			})
			->addColumn('deskripsi', function($row){
				$html = "<p class='p-0'>".($row->deskripsi_galeri ? $row->deskripsi_galeri : "-")."</p>";
				return $html;
			})
			->addColumn('status', function($row){
				$status = $row->status_galeri==1 ? 'Aktif' : 'Non-aktif';
				$html = "<p class='p-0'>$status</p>";
				return $html;
			})
			->addColumn('actions', function($row){
				$html = "<button class='btn btn-sm btn-primary' title='Edit' onclick='formAdd(`$row->id_galeri`)'><i class='fa-regular fa-pen-to-square'></i></button>";
				$html .= " <button class='btn btn-sm btn-danger' title='Hapus' onclick='hapusGaleri(`$row->id_galeri`)'><i class='fa-solid fa-trash'></i></button>";
				return $html;
			})
			->rawColumns(['gambar','deskripsi','status','actions'])
			->toJson();
		}
		return view('content.admin.galeri.main', $data);
	}
	public function formAddGaleri(Request $request){
		if (empty($request->id)) {
			$data['data'] = '';
		} else {
			$data['data'] = Galeri::where('id_galeri', $request->id)->first();
		}
		$content = view('content.admin.galeri.form', $data)->render();
		return ['status' => 'success', 'content' => $content];
	}
	public function SaveGaleri(Request $request) {
		// return $request->all();
		if (empty($request->id)) {
			$galeri = new Galeri;
		} else {
			$galeri = Galeri::find($request->id);
		}
		if($request->kategori==1){
			$foto = date('YmdHis');
			if (!empty($request->file)) {
				if(!empty($galeri) && $galeri->file_galeri!=''){
					if(file_exists('uploads/galeri/'.$galeri->file_galeri)){
						unlink('uploads/galeri/'.$galeri->file_galeri);
					}
				}
				$ukuranFile1 = filesize($request->file);
				if ($ukuranFile1 <= 500000) {
					$ext_foto1 = $request->file->getClientOriginalExtension();
					$filename1 = "Galeri".date('Ymd-His').".".$ext_foto1;
					$temp_foto1 = 'uploads/galeri/';
					$proses1 = $request->file->move($temp_foto1, $filename1);
					$galeri->file_galeri = $filename1;
				}else{
					$file1=$_FILES['file']['name'];
					$ext_foto1 = $request->file->getClientOriginalExtension();
					if(!empty($file1)){
						$direktori1='uploads/galeri/'; //tempat upload foto
						$name1='file'; //name pada input type file
						$namaBaru1="Galeri".date('Ymd-His'); //name pada input type file
						$quality1=50; //konversi kualitas gambar dalam satuan %
						$upload1 = compressFile::UploadCompress($namaBaru1,$name1,$direktori1,$quality1);
					}
					$galeri->file_galeri = $namaBaru1.".".$ext_foto1;
				}
			}
		}else{
			if(!empty($request->file)){
				if(!empty($galeri) && $galeri->kategori_galeri=='1'){
					if($galeri->file_galeri!=''){
						if(file_exists('uploads/galeri/'.$galeri->file_galeri)){
							unlink('uploads/galeri/'.$galeri->file_galeri);
						}
					}
				}
				$galeri->file_galeri = $request->file;
			}
		}
		
		$galeri->kategori_galeri = $request->kategori;
		$galeri->deskripsi_galeri = $request->deskripsi;
		$galeri->status_galeri = $request->status;
		$galeri->save();
		if ($galeri) {
			return ['code'=>200,'status'=>'success','Berhasil.'];
		} else {
			return ['code'=>201,'status'=>'error','Gagal.'];
		}
	}
	public function deleteGaleri(Request $request){
		$gambar = Galeri::find($request->id);
		if($gambar->kategori_galeri=='1'){
			if($gambar->file_galeri!=''){
				if(file_exists('uploads/galeri/'.$gambar->file_galeri)){
					unlink('uploads/galeri/'.$gambar->file_galeri);
				}
			}
		}
		$galeri = Galeri::where('id_galeri',$request->id)->delete();
		if ($galeri) {
            return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Dihapus.'];
        } else {
            return ['code'=>201,'status'=>'error','message'=>'Data Gagal Dihapus.'];
        }
	}
	# Modul media end
	# Modul berita start
	public function berita(Request $request) {#Berita sekolah
		$id = $request->id;
		if(!in_array($id,[1,2,3,4,5])){
			abort(404);
		}
		$data['id'] = $id;
		$data['mn_active'] = 'modulBerita';
		switch($id){
			case 1:
				$title = 'Berita Sekolah';
				$subMenuActive = 'beritaSekolah';
				break;
			case 2:
				$title = 'Event';
				$subMenuActive = 'event';
				break;
			case 3:
				$title = 'Pengumuman';
				$subMenuActive = 'pengumuman';
				break;
			case 4:
				$title = 'Prestasi Siswa';
				$subMenuActive = 'prestasiSiswa';
				break;
			case 5:
				$title = 'Program Unggulan';
				$subMenuActive = 'programUnggulan';
				break;
			default:
				$title = '';
				$subMenuActive = '';
				break;
		}
		$data['title'] = $title;
		$data['subMenuActive'] = $subMenuActive;

		if(request()->ajax()){
			return DataTables::of(Berita::getDatatable($request))
			->addIndexColumn()
			->addColumn('judul', function($row){
				$html = "<p>$row->judul</p>";
				return $html;
			})
			->addColumn('tanggal', function($row){
				$html = "<p class='text-center'>$row->date_indo</p>";
				return $html;
			})
			->addColumn('stts', function($row){
				$status = ($row->status==1)?'Aktif':'Non Aktif';
				return $status;
			})
			->addColumn('actions', function($row){
				$html = "
				<button style='color: #fff' class='btn btn-sm btn-primary' title='Edit' onclick='formAdd(`$row->id_berita`)'><i class='fadeIn animated bx bx-file' aria-hidden='true'></i></button>
				<button style='color: #fff' class='btn btn-sm btn-danger' title='Hapus' onclick='hapusBerita(`$row->id_berita`)'><i class='fadeIn animated bx bx-trash' aria-hidden='true'></i></button>
				
				";
				return $html;
			})
			->rawColumns(['judul','tanggal','actions'])
			->toJson();
		}
		return view('content.admin.berita.main', $data);
	}
	public function formAddBerita(Request $request)
	{
		$data['kategori'] = $request->kategori;
		if($request->kategori==1){
			$data['title'] = 'Berita Sekolah';
		}else if($request->kategori==2){
			$data['title'] = 'Event';
		}else if($request->kategori==3){
			$data['title'] = 'Pengumuman';
		}else if($request->kategori==4){
			$data['title'] = 'Prestasi Siswa';
		}else{
			$data['title'] = 'Program Unggulan';
		}
		if (empty($request->id)) {
			$data['data'] = '';
		} else {
			$data['data'] = Berita::where('id_berita', $request->id)->first();
		}
		$content = view('content.admin.berita.form', $data)->render();
		return ['status' => 'success', 'content' => $content];
	}
	public function saveBerita(Request $request) {
		if (empty($request->id)) {
			$berita = new Berita;
		} else {
			$berita = Berita::find($request->id);
		}
		$berita->editor_id = 1;
		$berita->judul = $request->judul;
		$berita->isi = $request->isi;
		$berita->status = $request->status;
		if($request->kategori=='2'){
			$berita->tanggal_acara = date('Y-m-d', strtotime($request->tanggal_acara));
		}else{
			$defaultTgl = '0000-00-00';
			$berita->tanggal_acara = date('Y-m-d');
		}
		$berita->tanggal = date('Y-m-d');
		$berita->jam = date('H:i');
		$berita->kategori = $request->kategori;
		$foto = date('YmdHis');
		if (!empty($request->gambar)) {
			if(!empty($request->id) && $berita->gambar!=''){
				if(file_exists('uploads/berita/'.$berita->gambar)){
					unlink('uploads/berita/'.$berita->gambar);
				}
			}
			$ukuranFile1 = filesize($request->gambar);
			if ($ukuranFile1 <= 500000) {
				$ext_foto1 = $request->gambar->getClientOriginalExtension();
				$filename1 = "Berita".date('Ymd-His').".".$ext_foto1;
				$temp_foto1 = 'uploads/berita/';
				$proses1 = $request->gambar->move($temp_foto1, $filename1);
				$berita->gambar = $filename1;
			}else{
				$file1=$_FILES['gambar']['name'];
				$ext_foto1 = $request->gambar->getClientOriginalExtension();
				if(!empty($file1)){
					$direktori1='uploads/berita/'; //tempat upload foto
					$name1='gambar'; //name pada input type file
					$namaBaru1="Berita".date('Ymd-His'); //name pada input type file
					$quality1=50; //konversi kualitas gambar dalam satuan %
					$upload1 = compressFile::UploadCompress($namaBaru1,$name1,$direktori1,$quality1);
				}
				$berita->gambar = $namaBaru1.".".$ext_foto1;
			}
		}
		$berita->save();
		if ($berita) {
			return ['code'=>200,'status'=>'success','Berhasil.'];
		} else {
			return ['code'=>201,'status'=>'error','Gagal.'];
		}
	}
	public function deleteBerita(Request $request)
	{
		$data = Berita::where('id_berita',$request->id)->delete();
		if ($data) {
			return ['code'=>200,'status'=>'success','Berhasil.'];
		} else {
			return ['code'=>201,'status'=>'error','Gagal.'];
		}
	}
	# Modul berita end


	#Iklan
	public function iklanAtas(Request $request)
	{
		$data['mn_active'] = 'iklan';
		$data['title'] = 'Iklan';
		$data['subMenuActive'] = 'dashboard';
		$data['smallTitle'] = 'Atas';
		$data['iklan'] = Iklan::find(1);
		return view('Admin.iklan.main', $data);
	}
	public function iklanTengah(Request $request)
	{
		$data['mn_active'] = 'iklan';
		$data['title'] = 'Iklan';
		$data['subMenuActive'] = 'dashboard';
		$data['smallTitle'] = 'Bawah';
		$data['iklan'] = Iklan::find(2);
		return view('Admin.iklan.main', $data);
	}
	public function iklanBawah(Request $request)
	{
		$data['mn_active'] = 'iklan';
		$data['title'] = 'Iklan';
		$data['subMenuActive'] = 'dashboard';
		$data['smallTitle'] = 'Samping';
		$data['iklan'] = Iklan::find(3);
		return view('Admin.iklan.main', $data);
	}
	public function iklanSamping(Request $request)
	{
		$data['mn_active'] = 'iklan';
		$data['title'] = 'Iklan';
		$data['subMenuActive'] = 'dashboard';
		$data['smallTitle'] = 'Samping';
		$data['iklan'] = Iklan::find(4);
		return view('Admin.iklan.main', $data);
	}
	public function profileGambar(Request $request)
	{
		$data['mn_active'] = 'modulWeb';
		$data['subMenuActive'] = 'dashboard';
		$data['title'] = 'Profile';
		$data['smallTitle'] = '';
		$data['iklan'] = Iklan::find(5);
		return view('Admin.iklan.main', $data);
	}
	public function formIklan(Request $request)
	{
		$data['iklan'] = Iklan::find($request->id);
		$content = view('Admin.iklan.formEdit', $data)->render();
		return ['status' => 'success', 'content' => $content];
	}
	public function UpdateIklan(Request $request)
	{
		$iklan = Iklan::find($request->id_iklan);
		$iklan->judul_iklan = $request->judul_iklan;
		$iklan->url = $request->url;
		$iklan->tgl_iklan = date('Y-m-d');
		$iklan->aktif = $request->aktif;
		$posisi = $iklan->posisi;
		if (!empty($request->gambar_iklan)) {
			if($iklan->gambar_iklan!=''){
				if(file_exists('AssetsSite/img/iklan/'.$iklan->gambar_iklan)){
					unlink('AssetsSite/img/iklan/'.$iklan->gambar_iklan);
				}
			}
			$ukuranFile1 = filesize($request->gambar_iklan);
			if ($ukuranFile1 <= 500000) {
				$ext_foto1 = $request->gambar_iklan->getClientOriginalExtension();
				$filename1 = "Iklan".date('Ymd-His').".".$ext_foto1;
				$temp_foto1 = 'AssetsSite/img/iklan/';
				$proses1 = $request->gambar_iklan->move($temp_foto1, $filename1);
				$iklan->gambar_iklan = $filename1;
			}else{
				$file1=$_FILES['gambar_iklan']['name'];
				$ext_foto1 = $request->gambar_iklan->getClientOriginalExtension();
				if(!empty($file1)){
					$direktori1= 'AssetsSite/img/iklan/'; //tempat upload foto
					$name1='gambar_iklan'; //name pada input type file
					$namaBaru1="Iklan".date('Ymd-His'); //name pada input type file
					$quality1=50; //konversi kualitas gambar dalam satuan %
					$upload1 = compressFile::UploadCompress($namaBaru1,$name1,$direktori1,$quality1);
				}
				$iklan->gambar_iklan = $namaBaru1.".".$ext_foto1;
			}
		}
		$iklan->save();
		if ($posisi == "Atas") {
			$rute = 'iklanAtas';
		}elseif ($posisi == "Tengah") {
			$rute = 'iklanTengah';
		}elseif ($posisi == "Bawah") {
			$rute = 'iklanBawah';
		}elseif ($posisi == "Samping") {
			$rute = 'iklanSamping';
		}elseif ($posisi == "Profile") {
			$rute = 'profile';
		}
		if ($iklan) {
			return Redirect::route($rute)->with('title', 'Success !')->with('message', 'Iklan Successfully Updated !!')->with('type', 'success');
		} else {
			return Redirect::route($rute)->with('title', 'Whoops!!!')->with('message', 'Iklan Failed to Update !!')->with('type', 'error');
		}
	}
	#Kata jorok
	public function kataJorok(Request $request)
	{
		$data['mn_active'] = 'kataJorok';
		$data['subMenuActive'] = 'dashboard';
		$data['title'] = 'Kata Jorok';
		$data['kataJorok'] = KataJorok::all();
		return view('Admin.kataJorok.main', $data);
	}
	public function kataJorokDatagrid(Request $request)
	{
		$data = KataJorok::getJson($request);
		return response()->json($data);
	}
	public function formAddKataJorok(Request $request)
	{
		$content = view('Admin.kataJorok.formAdd')->render();
		return ['status' => 'success', 'content' => $content];
	}
	public function AddKataJorok(Request $request)
	{
		$kata = new KataJorok;
		$kata->kata_asli = $request->kata_asli;
		$kata->diganti = $request->diganti;
		$kata->save();
		if ($kata) {
			return Redirect::route('kataJorok')->with('title', 'Success !')->with('message', 'Kata Jorok Successfully Created !!')->with('type', 'success');
		} else {
			return Redirect::route('kataJorok')->with('title', 'Whoops!!!')->with('message', 'Kata Jorok Failed to Create !!')->with('type', 'error');
		}
	}
	public function formUpdateKataJorok(Request $request)
	{
		$data['kataJorok'] = KataJorok::find($request->id);
		$content = view('Admin.kataJorok.formEdit', $data)->render();
		return ['status' => 'success', 'content' => $content];
	}
	public function UpdateKataJorok(Request $request)
	{
		$kata = KataJorok::find($request->id_kata_jorok);
		$kata->kata_asli = $request->kata_asli;
		$kata->diganti = $request->diganti;
		$kata->save();
		if ($kata) {
			return Redirect::route('kataJorok')->with('title', 'Success !')->with('message', 'Kata Jorok Successfully Updated !!')->with('type', 'success');
		} else {
			return Redirect::route('kataJorok')->with('title', 'Whoops!!!')->with('message', 'Kata Jorok Failed to Update !!')->with('type', 'error');
		}
	}
	public function deleteKataJorok(Request $request)
	{
		$id_kata_jorok = $request->id;
		$kata = KataJorok::find($id_kata_jorok);
		if(!empty($kata)){
			$kata->delete();
			return ['status' => 'success', 'message' => 'Kata Jorok Successfully Deleted'];
		}else{
			return ['status'=>'error', 'message'=>'Invalid user.'];
		}
	}
	#Profile
	public function profile(){
		$data['mn_active']="";
		$data['title'] = 'Detail Profile';
		return view('Admin.profile.main',$data);
	}
	
	public function form_ubah_password(){
		$data['mn_active']="berita";
		$data['title'] = 'Detail Profile';
		$content = view('Admin.profile.form',$data)->render();
		return ['status'=>'success','content'=>$content];
	}
	
	public function ubah_password(Request $request)
	{
		$password_baru = $request->baru;
		$password_lama = $request->lama;
		$user = Sentinel::getUser();
		$hasher = Sentinel::getHasher();
		if (!$hasher->check($password_lama, $user->password)) {
			return Redirect::to('profileAdmin')->with('title', 'SALAH !')->with('message', 'Password Salah, Silahkan Coba Lagi !!')->with('type', 'error');
		} else {
			Sentinel::update($user, array('password' => $password_baru));
			return Redirect::to('profileAdmin')->with('title', 'Berhasil !')->with('message', 'Password Berhasil Di Perbaharui !!')->with('type', 'success');
		}
	}
	#Menu
	public function menu(Request $request) {#Menu
		$data['mn_active'] = 'modulWeb';
		$data['subMenuActive'] = 'dashboard';
		$data['title'] = 'Menu';
		$data['menus'] = Menus::where('parent_id','0')->get();
		$data['childMenus'] = Menus::where('parent_id','!=','0')->get();
		return view('Admin.web.menu.main', $data);
	}
	public function formAddMenu(Request $request)
	{
		$content = view('Admin.web.menu.formAdd')->render();
		return ['status' => 'success', 'content' => $content];
	}
	public function AddMenu(Request $request)
	{
		$menu = new Menus;
		if($request->parent!='' && $request->parent_cek=='y'){
			$menu->parent_id = $request->parent;
		}else{
			$menu->parent_id = '0';
		}
		$menu->nama_menu = $request->nama_menu;
		$menu->aktif = $request->aktif;
		$menu->save();
		if ($menu) {
			return Redirect::route('menu')->with('title', 'Success !')->with('message', 'Menu Successfully Created !!')->with('type', 'success');
		} else {
			return Redirect::route('menu')->with('title', 'Whoops!!!')->with('message', 'Menu Failed to Create !!')->with('type', 'error');
		}
	}
	public function formUpdateMenu(Request $request)
	{
		$data['menu'] = Menus::find($request->id);
		$content = view('Admin.web.menu.formEdit', $data)->render();
		return ['status' => 'success', 'content' => $content];
	}
	public function UpdateMenu(Request $request)
	{
		$menu = Menus::find($request->id_menu);
		if($request->parent!='' && $request->parent_cek=='y'){
			$menu->parent_id = $request->parent;
		}else{
			$menu->parent_id = '0';
		}
		$menu->nama_menu = $request->nama_menu;
		$menu->aktif = $request->aktif;
		$menu->save();
		if ($menu) {
			return Redirect::route('menu')->with('title', 'Success !')->with('message', 'Menu Successfully Updated !!')->with('type', 'success');
		} else {
			return Redirect::route('menu')->with('title', 'Whoops!!!')->with('message', 'Menu Failed to Update !!')->with('type', 'error');
		}
	}
}
