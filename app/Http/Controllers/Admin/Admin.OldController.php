<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Identity;
use App\Libraries\compressFile;
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
use Redirect, File, Sentinel;

class AdminController extends Controller
{   
    /* =========================================================
    ===================== IDENTITAS ============================
    ========================================================= */
    public function identitas(Request $request)
    {
        $data['mn_active'] = 'dashboard';
        $data['title'] = 'Identitas';
        $data['identity'] = Identity::find(1);
        return view('Admin.identitas.main', $data);
    }
    public function changeIdentity(Request $request)
    {
        $identity = Identity::find(1);
        $identity->nama_web = $request->nama_web;
        $identity->url =$request->url;
        $identity->meta = $request->meta;
        $identity->alamat = $request->alamat;
        $identity->phone = $request->phone;
        $identity->email = $request->email;
        $identity->rekening = $request->rekening;
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
            return Redirect::route('identitas')->with('title', 'Success !')->with('message', 'Identitas Successfully Updated !!')->with('type', 'success');
        } else {
            return Redirect::route('identitas')->with('title', 'Whoops!!!')->with('message', 'Identitas Failed to Update !!')->with('type', 'error');
        }
    }
    /* =========================================================
    ======================== LOGO ==============================
    ========================================================= */
    public function logo(Request $request)
    {
        $data['mn_active'] = 'modulWeb';
        $data['title'] = 'Logo';
        $data['identity'] = Identity::find(1);
        return view('Admin.web.logo.main', $data);
    }
    public function formUpdateLogo(Request $request)
    {
        $data['identity'] = Identity::find(1);
        $data['position'] = $request->posisi;
        $content = view('Admin.web.logo.form', $data)->render();
        return ['status' => 'success', 'content' => $content];
    }
    public function UpdateLogo(Request $request)
    {
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
            return Redirect::route('logo')->with('title', 'Success !')->with('message', 'Logo Successfully Updated !!')->with('type', 'success');
        } else {
            return Redirect::route('logo')->with('title', 'Whoops!!!')->with('message', 'Logo Failed to Update !!')->with('type', 'error');
        }
    }
    /* =========================================================
    ======================== MENU ==============================
    ========================================================= */
    public function menu(Request $request)
    {
        $data['mn_active'] = 'modulWeb';
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
    /* =========================================================
    ======================= SEJARAH ============================
    ========================================================= */
    public function sejarah(Request $request)
    {
        $data['mn_active'] = 'sekolah';
        $data['title'] = 'Sejarah';
        $data['identity'] = Identity::find(1);
        return view('Admin.web.sejarah.main', $data);
    }
    public function updateSejarah(Request $request)
    {
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
            return Redirect::route('sejarah')->with('title', 'Success !')->with('message', 'Sejarah Successfully Updated !!')->with('type', 'success');
        } else {
            return Redirect::route('sejarah')->with('title', 'Whoops!!!')->with('message', 'Sejarah Failed to Update !!')->with('type', 'error');
        }
    }
    /* =========================================================
    ======================= VISI MISI ============================
    ========================================================= */
    public function visimisi(Request $request)
    {
        $data['mn_active'] = 'sekolah';
        $data['title'] = 'Visi dan Misi';
        $data['identity'] = Identity::find(1);
        return view('Admin.web.visimisi.main', $data);
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
            return Redirect::route('visimisi')->with('title', 'Success !')->with('message', 'Visi dan Misi Successfully Updated !!')->with('type', 'success');
        } else {
            return Redirect::route('visimisi')->with('title', 'Whoops!!!')->with('message', 'Visi dan Misi Failed to Update !!')->with('type', 'error');
        }
    }
    /* =========================================================
    ======================== KEPALA SEKOLAH =============================
    ========================================================= */
    public function kepsek(Request $request)
    {
        $data['mn_active'] = 'sekolah';
        $data['title'] = 'Sambutan Kepala Sekolah';
        $data['identity'] = Identity::find(1);
        return view('Admin.web.kepsek.main', $data);
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
            return Redirect::route('kepsek')->with('title', 'Success !')->with('message', 'Sambutan Successfully Updated !!')->with('type', 'success');
        } else {
            return Redirect::route('kepsek')->with('title', 'Whoops!!!')->with('message', 'Sambutan Failed to Update !!')->with('type', 'error');
        }
    }
    /* =========================================================
    ======================== UKS =============================
    ========================================================= */
    public function uks(Request $request)
    {
        $data['mn_active'] = 'sekolah';
        $data['title'] = 'UKS';
        $data['identity'] = Identity::find(1);
        return view('Admin.web.uks.main', $data);
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
            return Redirect::route('uks')->with('title', 'Success !')->with('message', 'UKS Successfully Updated !!')->with('type', 'success');
        } else {
            return Redirect::route('uks')->with('title', 'Whoops!!!')->with('message', 'UKS Failed to Update !!')->with('type', 'error');
        }
    }
    /* =========================================================
    ====================== STRUKTUR ORGANISASI ==========================
    ========================================================= */
    public function organisasi(Request $request)
    {
        $data['mn_active'] = 'sekolah';
        $data['title'] = 'Struktur Organisasi';
        $data['identity'] = Identity::find(1);
        return view('Admin.web.organisasi.main', $data);
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
            return Redirect::route('organisasi')->with('title', 'Success !')->with('message', 'Info Iklan Successfully Updated !!')->with('type', 'success');
        } else {
            return Redirect::route('organisasi')->with('title', 'Whoops!!!')->with('message', 'Info Iklan Failed to Update !!')->with('type', 'error');
        }
    }
    /* =========================================================
    ====================== SLIDER ==========================
    ========================================================= */
    public function slider(Request $request)
    {
        $data['mn_active'] = 'modulWeb';
        $data['title'] = 'Slider Gambar';
        $data['identity'] = Identity::find(1);
        return view('Admin.web.slider.main', $data);
    }

    public function tampilSlider(Request $request){
        $data = Slider::getSlider($request);
        return response()->json($data);
    }

    public function formUpdateSlider(Request $request)
    {
        $data['slider'] = Slider::find($request->id);
        $content = view('Admin.web.slider.formEdit',$data)->render();
        return ['status' => 'success', 'content' => $content];
    }

    public function updateSlider(Request $request)
    {
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
            return Redirect::route('slider')->with('title', 'Success !')->with('message', 'Slider Successfully Update !!')->with('type', 'success');
        } else {
            return Redirect::route('slider')->with('title', 'Whoops!!!')->with('message', 'Slider Failed to Update !!')->with('type', 'error');
        }
    }
    /* =========================================================
    ====================== EKSTRA KULIKULER ==========================
    ========================================================= */
    public function ekskul(Request $request)
    {
        $data['mn_active'] = 'sekolah';
        $data['title'] = 'Ekstra Kulikuler';
        $data['identity'] = Identity::find(1);
        return view('Admin.web.ekskul.main', $data);
    }

    public function tampilEkskul(Request $request){
        $data = Exkul::getEkskul($request);
        return response()->json($data);
    }

    public function formAddEkskul()
    {
        $content = view('Admin.web.ekskul.formAdd')->render();
        return ['status' => 'success', 'content' => $content];
    }

    public function formUpdateEkskul(Request $request)
    {
        $data['ekskul'] = Exkul::find($request->id);
        $content = view('Admin.web.ekskul.formEdit',$data)->render();
        return ['status' => 'success', 'content' => $content];
    }

    public function uploadEkskul(Request $request)
    {
        $ekskul = new Exkul;
        $ekskul->nama_exkul = $request->nama_ekskul;
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
                $filename1 = "Ekskul".date('Ymd-His').".".$ext_foto1;
                $temp_foto1 = 'uploads/exkul/';
                $proses1 = $request->logo->move($temp_foto1, $filename1);
                $ekskul->foto = $filename1;
            }else{
                $file1=$_FILES['logo']['name'];
                $ext_foto1 = $request->logo->getClientOriginalExtension();
                if(!empty($file1)){
                    $direktori1='uploads/exkul/'; //tempat upload foto
                    $name1='logo'; //name pada input type file
                    $namaBaru1="Ekskul".date('Ymd-His'); //name pada input type file
                    $quality1=50; //konversi kualitas gambar dalam satuan %
                    $upload1 = compressFile::UploadCompress($namaBaru1,$name1,$direktori1,$quality1);
                }
                $ekskul->foto = $namaBaru1.".".$ext_foto1;
            }
        }
        $ekskul->type_exkul = 1;
        $ekskul->save();
        if ($ekskul) {
            return Redirect::route('ekskul')->with('title', 'Success !')->with('message', 'Info Ekstra Kulikuler Successfully Upload !!')->with('type', 'success');
        } else {
            return Redirect::route('ekskul')->with('title', 'Whoops!!!')->with('message', 'Info Ekstra Kulikuler Failed to Upload !!')->with('type', 'error');
        }
    }

    public function updateEkskul(Request $request)
    {
        $ekskul = Exkul::find($request->id_ekskul);
        $ekskul->nama_exkul = $request->nama_ekskul;
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
                $filename1 = "Ekskul".date('Ymd-His').".".$ext_foto1;
                $temp_foto1 = 'uploads/exkul/';
                $proses1 = $request->logo->move($temp_foto1, $filename1);
                $ekskul->foto = $filename1;
            }else{
                $file1=$_FILES['logo']['name'];
                $ext_foto1 = $request->logo->getClientOriginalExtension();
                if(!empty($file1)){
                    $direktori1='uploads/exkul/'; //tempat upload foto
                    $name1='logo'; //name pada input type file
                    $namaBaru1="Ekskul".date('Ymd-His'); //name pada input type file
                    $quality1=50; //konversi kualitas gambar dalam satuan %
                    $upload1 = compressFile::UploadCompress($namaBaru1,$name1,$direktori1,$quality1);
                }
                $ekskul->foto = $namaBaru1.".".$ext_foto1;
            }
        }
        $ekskul->save();
        if ($ekskul) {
            return Redirect::route('ekskul')->with('title', 'Success !')->with('message', 'Info Ekstra Kulikuler Successfully Updated !!')->with('type', 'success');
        } else {
            return Redirect::route('ekskul')->with('title', 'Whoops!!!')->with('message', 'Info Ekstra Kulikuler Failed to Update !!')->with('type', 'error');
        }
    }
    /* =========================================================
    ====================== FASILITAS SEKOLAH ==========================
    ========================================================= */
    public function fasilitas(Request $request)
    {
        $data['mn_active'] = 'sekolah';
        $data['title'] = 'Fasilitas Sekolah';
        $data['identity'] = Identity::find(1);
        return view('Admin.web.fasilitas.main', $data);
    }

    public function tampilFasilitas(Request $request){
        $data = Exkul::getFasilitas($request);
        return response()->json($data);
    }

    public function formAddFasilitas()
    {
        $content = view('Admin.web.fasilitas.formAdd')->render();
        return ['status' => 'success', 'content' => $content];
    }

    public function formUpdateFasilitas(Request $request)
    {
        $data['ekskul'] = Exkul::find($request->id);
        $content = view('Admin.web.fasilitas.formEdit',$data)->render();
        return ['status' => 'success', 'content' => $content];
    }

    public function uploadFasilitas(Request $request)
    {
        $ekskul = new Exkul;
        $ekskul->nama_exkul = $request->nama_ekskul;
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
            return Redirect::route('fasilitas')->with('title', 'Success !')->with('message', 'Info Ekstra Kulikuler Successfully Upload !!')->with('type', 'success');
        } else {
            return Redirect::route('fasilitas')->with('title', 'Whoops!!!')->with('message', 'Info Ekstra Kulikuler Failed to Upload !!')->with('type', 'error');
        }
    }

    public function updateFasilitas(Request $request)
    {
        $ekskul = Exkul::find($request->id_ekskul);
        $ekskul->nama_exkul = $request->nama_ekskul;
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
        $ekskul->save();
        if ($ekskul) {
            return Redirect::route('fasilitas')->with('title', 'Success !')->with('message', 'Info Ekstra Kulikuler Successfully Updated !!')->with('type', 'success');
        } else {
            return Redirect::route('fasilitas')->with('title', 'Whoops!!!')->with('message', 'Info Ekstra Kulikuler Failed to Update !!')->with('type', 'error');
        }
    }
    /* =========================================================
    ======================== EDITOR ============================
    ========================================================= */
    public function editor(Request $request)
    {
        $data['mn_active'] = 'pengguna';
        $data['title'] = 'Pengguna';
        $data['users'] = Users::where('level','2')->get();
        return view('Admin.pengguna.editor.main', $data);
    }
    public function editorDatagrid(Request $request)
    {
        $data = Users::getJsonEditor($request);
        return response()->json($data);
    }
    public function formAddEditor(Request $request)
    {
        $content = view('Admin.pengguna.editor.formAdd')->render();
        return ['status' => 'success', 'content' => $content];
    }
    public function AddEditor(Request $request)
    {
        $user = Sentinel::registerAndActivate([
            'email' => $request->email,
            'password' => $request->email,
        ]);
        $user->level = '2';
        $user->name_user = $request->name_user;
        $user->alias = $request->alias;
        $user->address_user = $request->address_user;
        $user->phone = $request->phone;
        $user->active = $request->active;
        if (!empty($request->photo_user)) {
        	$ukuranFile1 = filesize($request->photo_user);
            if ($ukuranFile1 <= 500000) {
                $ext_foto1 = $request->photo_user->getClientOriginalExtension();
                $filename1 = "Editor".date('Ymd-His').".".$ext_foto1;
                $temp_foto1 = 'AssetsAdmin/dist/img/Editor/';
                $proses1 = $request->photo_user->move($temp_foto1, $filename1);
                $user->photo_user = $filename1;
            }else{
                $file1=$_FILES['photo_user']['name'];
                $ext_foto1 = $request->photo_user->getClientOriginalExtension();
                if(!empty($file1)){
                    $direktori1= 'AssetsAdmin/dist/img/Editor/'; //tempat upload foto
                    $name1='photo_user'; //name pada input type file
                    $namaBaru1="Editor".date('Ymd-His'); //name pada input type file
                    $quality1=50; //konversi kualitas gambar dalam satuan %
                    $upload1 = compressFile::UploadCompress($namaBaru1,$name1,$direktori1,$quality1);
                }
                $user->photo_user = $namaBaru1.".".$ext_foto1;
            }
        }
        // return $user;
        $user->save();
        if ($user) {
            return Redirect::route('editor')->with('title', 'Success !')->with('message', 'Editor Iklan Successfully Created !!')->with('type', 'success');
        } else {
            return Redirect::route('editor')->with('title', 'Whoops!!!')->with('message', 'Editor Iklan Failed to Create !!')->with('type', 'error');
        }
    }
    public function formUpdateEditor(Request $request)
    {
        $data['user'] = Users::find($request->id);
        $content = view('Admin.pengguna.editor.formEdit', $data)->render();
        return ['status' => 'success', 'content' => $content];
    }
    public function UpdateEditor(Request $request)
    {
        $user = Users::find($request->id);
        $user->name_user = $request->name_user;
        $user->alias = $request->alias;
        $user->address_user = $request->address_user;
        $user->phone = $request->phone;
        $user->active = $request->active;
        if (!empty($request->photo_user)) {
        	if($user->photo_user!=''){
	        	if(file_exists('AssetsAdmin/dist/img/Editor/'.$user->photo_user)){
	                unlink('AssetsAdmin/dist/img/Editor/'.$user->photo_user);
	            }
            }
            $ukuranFile1 = filesize($request->photo_user);
            if ($ukuranFile1 <= 500000) {
                $ext_foto1 = $request->photo_user->getClientOriginalExtension();
                $filename1 = "Editor".date('Ymd-His').".".$ext_foto1;
                $temp_foto1 = 'AssetsAdmin/dist/img/Editor/';
                $proses1 = $request->photo_user->move($temp_foto1, $filename1);
                $user->photo_user = $filename1;
            }else{
                $file1=$_FILES['photo_user']['name'];
                $ext_foto1 = $request->photo_user->getClientOriginalExtension();
                if(!empty($file1)){
                    $direktori1= 'AssetsAdmin/dist/img/Editor/'; //tempat upload foto
                    $name1='photo_user'; //name pada input type file
                    $namaBaru1="Editor".date('Ymd-His'); //name pada input type file
                    $quality1=50; //konversi kualitas gambar dalam satuan %
                    $upload1 = compressFile::UploadCompress($namaBaru1,$name1,$direktori1,$quality1);
                }
                $user->photo_user = $namaBaru1.".".$ext_foto1;
            }
        }
        $user->save();
        if ($user) {
            return Redirect::route('editor')->with('title', 'Success !')->with('message', 'Editor Iklan Successfully Updated !!')->with('type', 'success');
        } else {
            return Redirect::route('editor')->with('title', 'Whoops!!!')->with('message', 'Editor Iklan Failed to Update !!')->with('type', 'error');
        }
    }
    public function resetSandiEditor(Request $request)
    {
        $user = Sentinel::findById($request->id);
        $email = $user->email;
        $credentials = [
            'password' => $email,
        ];
        $user = Sentinel::update($user, $credentials);
        if ($user) {
            return ['status' => 'success', 'message' => 'Password Successfully Reseted !!'];
        } else {
            return ['status'=>'error', 'message'=>'Password Failed to Reset !!'];
        }
    }
    /* =========================================================
    ========================= IKLAN ============================
    ========================================================= */
    public function iklanAtas(Request $request)
    {
        $data['mn_active'] = 'iklan';
        $data['title'] = 'Iklan';
        $data['smallTitle'] = 'Atas';
        $data['iklan'] = Iklan::find(1);
        return view('Admin.iklan.main', $data);
    }
    public function iklanTengah(Request $request)
    {
        $data['mn_active'] = 'iklan';
        $data['title'] = 'Iklan';
        $data['smallTitle'] = 'Bawah';
        $data['iklan'] = Iklan::find(2);
        return view('Admin.iklan.main', $data);
    }
    public function iklanBawah(Request $request)
    {
        $data['mn_active'] = 'iklan';
        $data['title'] = 'Iklan';
        $data['smallTitle'] = 'Samping';
        $data['iklan'] = Iklan::find(3);
        return view('Admin.iklan.main', $data);
    }
    public function iklanSamping(Request $request)
    {
        $data['mn_active'] = 'iklan';
        $data['title'] = 'Iklan';
        $data['smallTitle'] = 'Samping';
        $data['iklan'] = Iklan::find(4);
        return view('Admin.iklan.main', $data);
    }
    public function profileGambar(Request $request)
    {
        $data['mn_active'] = 'modulWeb';
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
    /* =========================================================
    ====================== KATA JOROK ==========================
    ========================================================= */
    public function kataJorok(Request $request)
    {
        $data['mn_active'] = 'kataJorok';
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

    // PROFILE
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

    /* =========================================================
    ====================== MODUL BERITA ==========================
    ========================================================= */
    public function beritaSekolah(Request $request)
    {
        $data['id'] = $request->id;
        $data['mn_active'] = 'berita';
        if($request->id==1){
            $data['title'] = 'Berita Sekolah';
        }else if($request->id==2){
            $data['title'] = 'Event';
        }else if($request->id==3){
            $data['title'] = 'Pengumuman';
        }else if($request->id==4){
            $data['title'] = 'Prestasi Siswa';
        }else if($request->id==5){
            $data['title'] = 'Program Unggulan';
        }else{
            $data['title'] = '';
        }
        $data['identity'] = Identity::find(1);
        return view('Admin.berita.berita_sekolah.main', $data);
    }

    public function tampilBeritaSekolah(Request $request){
        // return $request->kategori;
        $isi = $request->kategori;
        if ($isi==1) {
            $data = Berita::getBeritaSekolah($request,$isi);
        }else if($isi==2){
            $data = Berita::getEvent($request,$isi);
        }else if($isi==3){
            $data = Berita::getPengumuman($request,$isi);
        }else if($isi==4){
            $data = Berita::getPrestasi($request,$isi);
        }else {
            $data = Berita::getProgram($request,$isi);
        }
        return $data;
        return response()->json($data);
    }

    public function formAddBeritaSekolah(Request $request)
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
        $content = view('Admin.berita.berita_sekolah.formAdd',$data)->render();
        return ['status' => 'success', 'content' => $content];
    }

    public function formUpdateBeritaSekolah(Request $request)
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
        $data['berita'] = Berita::find($request->id);
        $content = view('Admin.berita.berita_sekolah.formEdit',$data)->render();
        return ['status' => 'success', 'content' => $content];
    }

    public function uploadBeritaSekolah(Request $request)
    {
        $berita = new Berita;
        $berita->judul = $request->judul;
        $berita->isi = $request->isi_berita;
        $berita->status = $request->status;
        $berita->kategori = $request->kategori;
        $berita->editor_id = Sentinel::getUser()->id;

        if($request->kategori==2){
            $berita->tanggal_acara = $request->tanggal_acara;
        }

        $berita->tanggal = date('Y-m-d');
        $berita->jam = date('H:i');
        $foto = date('YmdHis');
        if (!empty($request->gambar)) {
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
            return Redirect('admin/berita/beritaSekolah/'.$request->kategori)->with('title', 'Success !')->with('message', 'Berita Sekolah Successfully to Upload !!')->with('type', 'success');
        } else {
            return Redirect('admin/berita/beritaSekolah/'.$request->kategori)->with('title', 'Whoops!!!')->with('message', 'Berita Sekolah Failed to Upload !!')->with('type', 'error');
        }
    }

    public function updateBeritaSekolah(Request $request)
    {
        $berita = Berita::find($request->id_berita);
        $berita->judul = $request->judul;
        $berita->isi = $request->isi_berita;
        $berita->status = $request->status;
        if($request->kategori==2){
            $berita->tanggal_acara = $request->tanggal_acara;
        }
        // $berita->kategori = '1';
        $berita->tanggal = date('Y-m-d');
        $berita->jam = date('H:i');
        $foto = date('YmdHis');
        if (!empty($request->gambar)) {
            if($berita->gambar!=''){
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
            return Redirect('admin/berita/beritaSekolah/'.$request->kategori)->with('title', 'Success !')->with('message', 'Berita Sekolah Successfully to Update !!')->with('type', 'success');
        } else {
            return Redirect('admin/berita/beritaSekolah/'.$request->kategori)->with('title', 'Whoops!!!')->with('message', 'Berita Sekolah Failed to Update !!')->with('type', 'error');
        }
    }

    public function deleteBeritaSekolah(Request $request)
    {
        $amtv = Berita::where('id_berita',$request->id)->delete();
        if($amtv){
            return ['status' => 'success'];
        }
    }

    /* =========================================================
    ============================ AMTV ==========================
    ========================================================= */

    public function amtv(){
        $data['mn_active'] = 'amtv';
        $data['title'] = 'AMTV';
        return view('Admin.media.amtv.main', $data);
    }

    public function tampilAmtv(Request $request){
        $data = Amtv::getAmtv($request);
        return response()->json($data);
    }

    public function formAddAmtv(Request $request)
    {
        $content = view('Admin.media.amtv.formAdd')->render();
        return ['status' => 'success', 'content' => $content];
    }

    public function formUpdateAmtv(Request $request)
    {
        $data['id'] = $request->id;
        $data['amtv'] = Amtv::find($request->id);
        $content = view('Admin.media.amtv.formEdit',$data)->render();
        return ['status' => 'success', 'content' => $content];
    }

    public function uploadAmtv(Request $request)
    {
        $amtv = new Amtv;
        $amtv->judul_amtv = $request->judul;
        $amtv->file = $request->youtube;
        $amtv->status_amtv = $request->status;
        $amtv->save();
        if($amtv){
            return Redirect::route('amtv')->with('title', 'Success !')->with('message', 'AMTV Successfully to Upload !!')->with('type', 'success');
        }else{
            return Redirect::route('amtv')->with('title', 'Success !')->with('message', 'AMTV Failed to Upload !!')->with('type', 'success');
        }
    }

    public function updateAmtv(Request $request)
    {
        $amtv = Amtv::find($request->id_amtv);
        $amtv->judul_amtv = $request->judul;
        $amtv->file = $request->youtube;
        $amtv->status_amtv = $request->status;
        $amtv->save();
        if($amtv){
            return Redirect::route('amtv')->with('title', 'Success !')->with('message', 'AMTV Successfully to Upload !!')->with('type', 'success');
        }else{
            return Redirect::route('amtv')->with('title', 'Success !')->with('message', 'AMTV Failed to Upload !!')->with('type', 'success');
        }
    }

    public function deleteAmtv(Request $request)
    {
        $amtv = Amtv::where('id_amtv',$request->id)->delete();
        if($amtv){
            return ['status' => 'success'];
        }
    }



    /* =========================================================
    ============================ GLERI ==========================
    ========================================================= */

    public function galeri(){
        $data['mn_active'] = 'amtv';
        $data['title'] = 'Galeri';
        return view('Admin.media.galeri.main', $data);
    }

    public function tampilGaleri(Request $request){
        $data = Galeri::getGaleri($request);
        return response()->json($data);
    }

    public function formAddGaleri(Request $request)
    {
        $content = view('Admin.media.galeri.formAdd')->render();
        return ['status' => 'success', 'content' => $content];
    }

    public function formUpdateGaleri(Request $request)
    {
        $data['id'] = $request->id;
        $data['galeri'] = Galeri::find($request->id);
        $content = view('Admin.media.galeri.formEdit',$data)->render();
        return ['status' => 'success', 'content' => $content];
    }

    public function uploadGaleri(Request $request)
    {
        // return $request->all();
        $galeri = new Galeri;
        $galeri->kategori_galeri = $request->kategori;
        $galeri->deskripsi_galeri = $request->deskripsi;
        $galeri->status_galeri = $request->status;

        if($request->kategori==1){
            $foto = date('YmdHis');
            if (!empty($request->file)) {
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
            $galeri->file_galeri = $request->file;
        }

        $galeri->save();
        if($galeri){
            return Redirect::route('galeri')->with('title', 'Success !')->with('message', 'Galeri Successfully to Upload !!')->with('type', 'success');
        }else{
            return Redirect::route('galeri')->with('title', 'Success !')->with('message', 'Galeri Failed to Upload !!')->with('type', 'success');
        }
    }

    public function updateGaleri(Request $request)
    {
        // return $request->all();
        $galeri = Galeri::find($request->id_galeri);

        if($request->kategori==1){
            $foto = date('YmdHis');
            if (!empty($request->file)) {
                if($galeri->file_galeri!=''){
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
                if($galeri->kategori_galeri=='1'){
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
        if($galeri){
            return Redirect::route('galeri')->with('title', 'Success !')->with('message', 'Galeri Successfully to Update !!')->with('type', 'success');
        }else{
            return Redirect::route('galeri')->with('title', 'Success !')->with('message', 'Galeri Failed to Update !!')->with('type', 'success');
        }
    }

    public function deleteGaleri(Request $request)
    {
        $gambar = Galeri::find($request->id);
        if($gambar->kategori_galeri=='1'){
            if($gambar->file_galeri!=''){
                if(file_exists('uploads/galeri/'.$gambar->file_galeri)){
                    unlink('uploads/galeri/'.$gambar->file_galeri);
                }
            }
        }
        $galeri = Galeri::where('id_galeri',$request->id)->delete();
        if($galeri){
            return ['status' => 'success'];
        }
    }
}
