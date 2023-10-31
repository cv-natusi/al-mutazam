<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Guru;
use DataTables, Auth;

class PenggunaController extends Controller
{
    function __construct()
    {
        $this->title = 'Data Pengguna';
    }

    public function main(Request $request)
    {
        if(request()->ajax()){
            $data = Users::where('active', 'active')->orderBy('id','ASC')->get();
			
			return DataTables::of($data)
				->addIndexColumn()
				->addColumn('actions', function($row){
                    $txt = "<button class='btn btn-sm btn-secondary' title='Reset' onclick='resetData(`$row->id`)'>Reset</button>";
					$txt .= "<button class='btn btn-sm btn-danger' style='margin-left: 5px' title='Hapus' onclick='hapusData(`$row->id`)'>Non-Aktifkan</button>";
					return $txt;
				})
                ->addColumn('sebagai', function($row){
					if ($row->level=='1') {
                        $txt = 'Administrator';
                    } else if($row->level=='2'){
                        $txt = 'Petugas Madrasah';
                    } else{
                        $txt = 'Guru';
                    }
					return $txt;
				})
				->rawColumns(['actions', 'btnStatus'])
				->toJson();
		}

        $data['title'] = $this->title;
        return view('content.petugas.pengguna.main', $data);
    }

    public function modalForm(Request $request)
    {
        if (empty($request->id)) {
            $data['title'] = "Tambah ".$this->title;
            $data['data'] = '';    
		}else{
            $data['title'] = "Edit ".$this->title;
            $data['data'] = Users::where('id',$request->id)->first();
		}
        $data['guru'] = Guru::all();
        $content = view('content.petugas.pengguna.modal', $data)->render();
		return ['content'=>$content];
    }

    public function save(Request $request) {
        try {
            $data = new Users;
            $data->level = $request->level;
            if ($request->level=='3') {
                $guru = Guru::where('id_guru',$request->guru_id)->first();
                $data->guru_id = $request->guru_id; 
            }
            $data->email = ($request->level==3)?$guru->nik:$request->nik;
            $data->name_user = ($request->level==3)?$guru->nama:$request->nama; 
            $data->password = ($request->level==3)?bcrypt($guru->nik):bcrypt($request->nik);
            $data->lihat_password = ($request->level==3)?$guru->nik:$request->nik;
            $data->active = 'active';
            $data->nik_user = ($request->level==3)?$guru->nik:$request->nik;
            $data->save();
            if ($data) {
                return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Disimpan.'];
            }
            return ['code'=>201,'status'=>'error','message'=>'Data Gagal Disimpan.'];
        } catch (\Throwable $th) {
           return $th->getMessage();
        }
    }

    public function delete(Request $request) {
        $data = Users::find($request->id);
        $data->active = 'non active';
        $data->save();
        if ($data) {
            return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Dinonaktifkan.'];
        } else {
            return ['code'=>201,'status'=>'error','message'=>'Data Gagal Dinonaktifkan.'];
        }
    }
    public function reset(Request $request) {
        $data = Users::find($request->id);
        $data->email = $data->nik_user;
        $data->password = bcrypt($data->nik_user);
        $data->lihat_password = $data->nik_user;
        $data->save();
        if ($data) {
            return ['code'=>200,'status'=>'success','message'=>'Berhasil.'];
        } else {
            return ['code'=>201,'status'=>'error','message'=>'Ada kesalahan.'];
        }
    }
}
