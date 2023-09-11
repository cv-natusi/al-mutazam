<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\DataAdministrasi;
Use App\Models\Guru;
use DataTables, Auth;

class DataAdministrasiController extends Controller
{
    function __construct()
    {
        $this->title = 'Data Administrasi';
    }

    # Data Administrasi guru
    public function main(Request $request)
    {
        if(request()->ajax()){
            $data = DataAdministrasi::where('guru_id', Auth::User()->guru_id)->orderBy('id_administrasi','ASC')->get();
			
			return DataTables::of($data)
				->addIndexColumn()
				->addColumn('actions', function($row){
					if ($row->status=='1' || $row->status=='2') {
                        $txt = "
                        <button class='btn btn-sm btn-secondary disabled' title='Edit' onclick='formAdd(`$row->id_administrasi`)'><i class='fadeIn animated bx bxs-file' aria-hidden='true'></i></button>
                        <button class='btn btn-sm btn-danger disabled' title='Hapus' onclick='hapusData(`$row->id_administrasi`)'><i class='fadeIn animated bx bxs-trash' aria-hidden='true'></i></button>
                        ";
                    } else {
                        $txt = "
                        <button class='btn btn-sm btn-secondary' title='Edit' onclick='formAdd(`$row->id_administrasi`)'><i class='fadeIn animated bx bxs-file' aria-hidden='true'></i></button>
                        <button class='btn btn-sm btn-danger' title='Hapus' onclick='hapusData(`$row->id_administrasi`)'><i class='fadeIn animated bx bxs-trash' aria-hidden='true'></i></button>
                        ";
                    }
					return $txt;
				})
                ->addColumn('btnStatus', function($row){
					if ($row->status=='0') {
                        $txt = "<div style='width: 28px; height: 28px; background-color: red; border-radius: 50%;'></div>";
                    } else if($row->status=='1'){
                        $txt = "<div style='width: 28px; height: 28px; background-color: green; border-radius: 50%;'></div>";
                    } else {
                        $txt = "<div style='width: 28px; height: 28px; background-color: blue; border-radius: 50%;'></div>";
                    }
					return $txt;
				})
				->rawColumns(['actions', 'btnStatus'])
				->toJson();
		}

        $data['title'] = $this->title;
        return view('content.guru.dataAdministrasi.main', $data);
    }

    public function modalForm(Request $request)
    {
        if (empty($request->id)) {
            $data['title'] = "Tambah ".$this->title;
            $data['data'] = '';    
		}else{
            $data['title'] = "Edit ".$this->title;
            $data['data'] = DataAdministrasi::where('id_administrasi',$request->id)->first();
		}
        $content = view('content.guru.dataAdministrasi.modal', $data)->render();
		return ['content'=>$content];
    }

    public function save(Request $request) {
        if (empty($request->id)) {
            $data = new DataAdministrasi;
        } else {
            $data = DataAdministrasi::find($request->id);
        }
        try {
            $data->guru_id = Auth::User()->guru_id;
            $data->nama_berkas = $request->nama_berkas;
            $data->keterangan = $request->keterangan;
            $data->tanggal_upload = date('Y-m-d');
            if ($image = $request->file('file')) {
                $destinationPath = 'images/administrasi';
                $fileUpload = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $fileUpload);
                $data->file = "$fileUpload";
            }
            $data->status = '1'; # Berhasil dibuat / menunggu verif
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

    public function delete(Request $request) {
        $data = DataAdministrasi::find($request->id);
        $data->delete();
        if ($data) {
            return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Dihapus.'];
        } else {
            return ['code'=>201,'status'=>'error','message'=>'Data Gagal Dihapus.'];
        }
    }

    # Data Administrasi Petugas
    public function mainPetugas(Request $request)
    {
        if(request()->ajax()){
            $data = DataAdministrasi::whereIn('status', ['1','2'])->orderBy('id_administrasi','ASC')->get();
			
			return DataTables::of($data)
				->addIndexColumn()
				->addColumn('nip', function($row){
					$txt = Guru::where('id_guru', $row->guru_id)->first()->nip;
					return $txt;
				})
				->addColumn('guru', function($row){
					$txt = $txt = Guru::where('id_guru', $row->guru_id)->first()->nama;
					return $txt;
				})
                ->addColumn('verifikasi', function($row){
					if($row->status=='1'){
                        $txt = "
                        <button class='btn btn-sm btn-primary' title='verifikasi' onclick='verifikasi(`$row->id_administrasi`)'>Verifikasi</button>
                        <button class='btn btn-sm btn-danger' title='tolak' onclick='tolak(`$row->id_administrasi`)'>Tolak</button>
                        ";
                        return $txt;
                    }else{
                        $txt = "
                        <button class='btn btn-sm btn-primary disabled' title='verifikasi' onclick='verifikasi(`$row->id_administrasi`)'>Verifikasi</button>
                        <button class='btn btn-sm btn-danger disabled' title='tolak' onclick='tolak(`$row->id_administrasi`)'>Tolak</button>
                        ";
                        return $txt;
                    }
				})
                ->addColumn('btnStatus', function($row){
					if ($row->status=='1') {
                        $txt = "<p class='disabled'>Menunggu</p>";
                    } else if($row->status=='2'){
                        $txt = "<p style='color: #blue'>Terverifikasi</p>";
                    }
					return $txt;
				})
				->addColumn('actions', function($row){
                    if ($row->status=='1') {
                        $txt = "
                        <button class='btn btn-sm btn-success text-center' title='lihat' onclick='lihat(`$row->id_administrasi`)'><i class='bx bxs-bullseye'></i> Lihat</button>
                        ";
                    } else {
                        $txt = "
                        <button class='btn btn-sm btn-success text-center disabled' title='lihat' onclick='lihat(`$row->id_administrasi`)'><i class='bx bxs-bullseye'></i> Lihat</button>
                        ";  
                    }
					return $txt;
				})
				->rawColumns(['actions', 'btnStatus', 'verifikasi'])
				->toJson();
		}

        $data['title'] = $this->title;
        return view('content.petugas.dataAdministrasi.main', $data);
    }

    public function modalFormPetugas(Request $request)
    {
        $data['title'] = "Lihat ".$this->title;
        $data['data'] = DataAdministrasi::where('id_administrasi',$request->id)->first();
        $data['guru'] = Guru::find($data['data']->guru_id);
        $content = view('content.petugas.dataAdministrasi.modal', $data)->render();
		return ['content'=>$content];
    }

    public function verifikasi(Request $request)
    {
        $data = DataAdministrasi::find($request->id);
        $data->status = '2';
        $data->save();
        if ($data) {
            return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Diverifikasi.'];
        } else {
            return ['code'=>201,'status'=>'error','message'=>'Data Gagal Diverifikasi.'];
        }
    }

    public function tolak(Request $request)
    {
        $data = DataAdministrasi::find($request->id);
        $data->status = '0';
        $data->save();
        if ($data) {
            return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Ditolak.'];
        } else {
            return ['code'=>201,'status'=>'error','message'=>'Data Gagal Ditolak.'];
        }
    }
}
