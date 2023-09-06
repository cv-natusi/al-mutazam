<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\TugasPegawai;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Petugas\DataPrimerGuru;
use App\Models\Petugas\DataSekunderGuru;
use Illuminate\Http\Request;
use DataTables, Validator, DB, Auth;

class DataGuruController extends Controller
{
    function __construct()
	{
		$this->title = 'Data Guru';
	}

    public function main(Request $request) {
        if(request()->ajax()){
            $data = Guru::orderBy('id_guru','ASC')->get();
			
			return DataTables::of($data)
				->addIndexColumn()
				->addColumn('actions', function($row){
					$txt = "
                    <button style='color: #fff' class='btn btn-sm btn-secondary' title='Detail' onclick='formAdd(`$row->id_guru`)'><i class='fadeIn animated bx bxs-file-find' aria-hidden='true'></i></button>
                    <button style='color: #fff' class='btn btn-sm btn-danger' title='Delete' onclick='Delete(`$row->id_guru`)'><i class='fadeIn animated bx bxs-trash' aria-hidden='true'></i></button>
					";
					return $txt;
				})
				->rawColumns(['actions'])
				->toJson();
		}

        $data['title'] = $this->title;
        return view('content.petugas.dataguru.main', $data);
    }
    
    public function form(Request $request) {
        if (empty($request->id)) {
            $data['data'] = '';
		}else{
            $data['data'] = Guru::where('id_guru',$request->id)->first();
		}
        $data['title'] = "Tambah ".$this->title;
        $data['tugas'] = TugasPegawai::all();
        $content = view('content.petugas.dataguru.form', $data)->render();
		return ['status' => 'success', 'content' => $content, 'data' => $data];
    }

    public function saveDataDiri(Request $request) {
        // return $request->all();
        if (empty($request->id)) {
            $data = new Guru;
        } else {
            $data = Guru::find($request->id);
        }
        try {
            $data->nama = strtoupper($request->nama);
            $data->nik = $request->nik;
            $data->nip = $request->nip;
            $data->nuptk = $request->nuptk;
            $data->ptkid = $request->ptkid;
            $data->nrg_npk = $request->nrg_npk;
            $data->tmt_pegawai = $request->tmt_pegawai;
            $data->tmt_guru = $request->tmt_guru;
            $data->email = $request->email;
            $data->email_madrasah = $request->email_madrasah;
            $data->tempat_lahir = $request->tempat_lahir;
            $data->tanggal_lahir = date('Y-m-d',strtotime($request->tanggal_lahir));
            $data->alamat = $request->alamat;
            if ($image = $request->file('foto')) {
                $destinationPath = 'images/guru';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $data->foto = "$profileImage";
            }
            $data->save();
            if ($data) {
                return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Disimpan.'];
            } else {
                return ['code'=>201,'status'=>'error','message'=>'Data Gagal Disimpan.'];
            }
        } catch (\Throwable $th) {
           return $th->getMessage();
        }
    }
    // public function save(Request $request){
    //     if (empty($request->id)) {
    //         $data = new Guru;
    //     } else {
    //         $data = Guru::find($request->id);
    //     }
    //     try {
    //         $data->nik = $request->nik;
    //         $data->nip = $request->nip;
    //         $data->nama = strtoupper($request->nama);
    //         $data->tanggal_lahir = date('Y-m-d',strtotime($request->tgl_lahir));
    //         if ($image = $request->file('foto')) {
    //             $destinationPath = 'images/guru';
    //             $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
    //             $image->move($destinationPath, $profileImage);
    //             $data->foto = "$profileImage";
    //         }
    //         $data->alamat = $request->alamat;
    //         $data->provinsi_id = $request->provinsi_id;
    //         $data->kabupaten_id = $request->kabupaten_id;
    //         $data->kecamatan_id = $request->kecamatan_id;
    //         $data->desa_id = $request->desa_id;
    //         $data->telepon = $request->telepon;
    //         $data->email = $request->email;
    //         $data->tugas_utama = $request->tugas_utama;
    //         $data->tugas_tambahan = implode(';', $request->tugas_tambahan ?? []);;
    //         $data->subminkal = $request->subminkal;
    //         $data->tmta_awal = $request->tmta;
    //         $data->status_guru = $request->status_guru=='aktif'?true:false;
    //         $data->save();
    //         if ($data) {
    //             return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Disimpan.'];
    //         } else {
    //             return ['code'=>201,'status'=>'error','message'=>'Data Gagal Disimpan.'];
    //         }
    //     } catch (\Throwable $th) {
    //        return $th->getMessage();
    //     }
    // }
    public function detailGuru() {
        $data['title'] = $this->title;
        $guru = Guru::all();
        return view('content.petugas.dataguru.detail', compact('guru'), $data);
    }

    public function primerGuru() {
        $data['title'] = $this->title;
        $guru = Guru::all();
        $primerguru = DataPrimerGuru::all();
        return view('content.petugas.dataguru.dataprimer', compact('primerguru','guru'), $data);
    }

    public function sekunderGuru() {
        $data['title'] = $this->title;
        $guru = Guru::all();
        $sekunderguru = DataSekunderGuru::all();
        return view('content.petugas.dataguru.datasekunder', compact('sekunderguru','guru'), $data);
    }
    
}
