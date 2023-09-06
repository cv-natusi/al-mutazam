<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\MstKelas;
use App\Models\MstPelajaran;
use Illuminate\Http\Request;
use DataTables, Validator, DB, Auth;

class DataPelajaranController extends Controller
{
    function __construct()
    {
        $this->title = 'Data Pelajaran';
    }

    public function main(Request $request)
    {
        if(request()->ajax()){
            $data = MstPelajaran::orderBy('id_pelajaran','ASC')->get();
			
			return DataTables::of($data)
				->addIndexColumn()
				->addColumn('actions', function($row){
					$txt = "
                    <button class='btn btn-sm btn-secondary' title='Edit' onclick='formAdd(`$row->id_pelajaran`)'><i class='fadeIn animated bx bxs-file' aria-hidden='true'></i></button>
                    <button class='btn btn-sm btn-danger' title='Hapus' onclick='hapusData(`$row->id_pelajaran`)'><i class='fadeIn animated bx bxs-trash' aria-hidden='true'></i></button>
					";
					return $txt;
				})
                ->addColumn('kelas', function($row){
                    $kelas = MstKelas::where('id_kelas', $row->kelas_id)->first();
                    $txt = "Kelas ".$kelas->kelas." ".$kelas->nama_kelas;
                    return $txt;
				})
                ->addColumn('guru', function($row){
					$txt = Guru::where('id_guru', $row->guru_id)->first()->nama;
                    return $txt;
				})
				->rawColumns(['actions'])
				->toJson();
		}

        $data['title'] = $this->title;
        return view('content.petugas.datapelajaran.main', $data);
    }

    public function form(Request $request)
    {
        if (empty($request->id)) {
            $data['title'] = "Tambah ".$this->title;
            $data['data'] = '';    
		}else{
            $data['title'] = "Edit ".$this->title;
            $data['data'] = MstPelajaran::where('id_pelajaran',$request->id)->first();
		}
        $data['kelas'] = MstKelas::all();
        $data['guru'] = Guru::all();
        $content = view('content.petugas.datapelajaran.form', $data)->render();
		return ['status' => 'success', 'content' => $content, 'data' => $data];
    }

    public function save(Request $request)
    {
        if (empty($request->id)) {
            $data = new MstPelajaran;
        } else {
            $data = MstPelajaran::find($request->id);
        }
        try {
            $data->nama_mapel = strtoupper($request->nama_mapel);
            $data->kelas_id = $request->kelas_id;
            $data->ta = $request->ta;
            $data->semester = $request->semester;
            $data->guru_id = $request->guru_id;
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
        $data = MstPelajaran::find($request->id);
        $data->delete();
        if ($data) {
            return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Dihapus.'];
        } else {
            return ['code'=>201,'status'=>'error','message'=>'Data Gagal Dihapus.'];
        }
    }
}
