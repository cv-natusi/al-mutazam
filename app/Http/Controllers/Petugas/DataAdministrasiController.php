<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\DataAdministrasi;
use DataTables;

class DataAdministrasiController extends Controller
{
    function __construct()
    {
        $this->title = 'Data Administrasi';
    }

    public function main(Request $request)
    {
        if(request()->ajax()){
            $data = DataAdministrasi::orderBy('id_administrasi','ASC')->get();
			
			return DataTables::of($data)
				->addIndexColumn()
				->addColumn('actions', function($row){
					$txt = "
                    <button class='btn btn-sm btn-secondary' title='Edit' onclick='formAdd(`$row->id_administrasi`)'><i class='fadeIn animated bx bxs-file' aria-hidden='true'></i></button>
                    <button class='btn btn-sm btn-danger' title='Hapus' onclick='hapusData(`$row->id_administrasi`)'><i class='fadeIn animated bx bxs-trash' aria-hidden='true'></i></button>
					";
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
}
