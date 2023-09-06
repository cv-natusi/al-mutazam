<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\TugasPegawai;
use Illuminate\Http\Request;
use DataTables, Validator, DB, Auth;

class DataTugasPegawaiController extends Controller
{
    function __construct()
	{
		$this->title = 'Data Tugas Pegawai';
	}

    public function main(Request $request) {
        if(request()->ajax()){
            $data = TugasPegawai::orderBy('id_tugas_pegawai','ASC')->get();
			
			return DataTables::of($data)
				->addIndexColumn()
				->addColumn('actions', function($row){
					$txt = "
                    <button class='btn btn-sm btn-secondary' title='Edit' onclick='formAdd(`$row->id_tugas_pegawai`)'><i class='fadeIn animated bx bxs-edit' aria-hidden='true'></i></button>
                    <button class='btn btn-sm btn-danger' title='Hapus' onclick='hapusData(`$row->id_tugas_pegawai`)'><i class='fadeIn animated bx bxs-trash' aria-hidden='true'></i></button>
					";
					return $txt;
				})
				->rawColumns(['actions'])
				->toJson();
		}

        $data['title'] = $this->title;
        return view('content.petugas.datatugaspegawai.main', $data);
    }

    public function modalForm(Request $request)
    {
        if (empty($request->id)) {
            $data['title'] = "Tambah ".$this->title;
            $data['data'] = '';    
		}else{
            $data['title'] = "Edit ".$this->title;
            $data['data'] = TugasPegawai::where('id_tugas_pegawai',$request->id)->first();
		}
        $content = view('content.petugas.datatugaspegawai.modal', $data)->render();
		return ['content'=>$content];
    }

    public function save(Request $request) {
        if (empty($request->id)) {
            $data = new TugasPegawai;
        } else {
            $data = TugasPegawai::find($request->id);
        }
        $data->nama_tugas = $request->nama_tugas;
        $data->save();
        if ($data) {
            return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Disimpan.'];
        } else {
            return ['code'=>201,'status'=>'error','message'=>'Data Gagal Disimpan.'];
        }
    }

    public function delete(Request $request) {
        $data = TugasPegawai::find($request->id);
        $data->delete();
        if ($data) {
            return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Dihapus.'];
        } else {
            return ['code'=>201,'status'=>'error','message'=>'Data Gagal Dihapus.'];
        }
    }
}
