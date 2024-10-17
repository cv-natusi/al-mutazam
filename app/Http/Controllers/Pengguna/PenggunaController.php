<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Guru;
use DataTables, Auth, Storage;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class PenggunaController extends Controller
{
    function __construct() {
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
                        $txt = 'ADMIN';
                    } else if($row->level=='2'){
                        $txt = 'PETUGAS';
                    } else{
                        $txt = 'GURU';
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
        $data['guru'] = Guru::whereDoesntHave('users')->get();
        $content = view('content.petugas.pengguna.modal', $data)->render();
		return ['content'=>$content];
    }

    public function save(Request $request) {
        if (isset($request->nik)) {#pengecekan agar user tidak dobel
            if ($checkUser = Users::where('nik_user',$request->nik)->first()) {
                return ['code'=>400,'status'=>'error','message'=>'User sudah terdaftar.'];
            }
        }
        try {
            $rules = array(
                'foto' => 'required|mimes:jpeg,png,jpg|max:2048',
            );
            $messages = array(
                'required'  => 'harus diisi',
                'mimes'  => 'format file tidak diperbolehkan',
                'max' => 'ukuran file terlalu besar'
            );
            $validator = FacadesValidator::make($request->all(), $rules, $messages);
            if (!$validator->fails()) {
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
                if ($request->foto) {
                    $fileName = $request->foto->getClientOriginalName();
                    $filePath = 'uploads/pengguna/' . $fileName;
                    $path = Storage::disk('public')->put($filePath, file_get_contents($request->foto));
                    $path = Storage::disk('public')->url($path);
                    $data->foto = $fileName;
                }   
                $data->save();
                if ($data) {
                    return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Disimpan.'];
                }
                return ['code'=>204,'status'=>'error','message'=>'Data Gagal Disimpan.'];
            }else{
                return ['code'=>400,'status'=>'failed','message'=> $validator->messages()];
            }
        } catch (\Throwable $th) {
           return $th->getMessage();
        }
    }

    public function delete(Request $request) {
        $data = Users::find($request->id);
        // $data->active = 'non active';
        $data->delete();
        if ($data) {
            return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Dinonaktifkan.'];
        } else {
            return ['code'=>201,'status'=>'error','message'=>'Data Gagal Dinonaktifkan.'];
        }
    }
    public function reset(Request $request) {
        $data = Users::find($request->id);
        $guru = Guru::where('id_guru', $data->guru_id)->first();
        if($guru){
            $data->email = $guru->nik;
            $data->password = bcrypt($guru->nik);
            $data->lihat_password = $guru->nik;
        } else {
            $data->email = $data->nik_user;
            $data->password = bcrypt($data->nik_user);
            $data->lihat_password = $data->nik_user;
        }
        $data->save();
        if ($data) {
            return ['code'=>200,'status'=>'success','message'=>'Berhasil.'];
        } else {
            return ['code'=>201,'status'=>'error','message'=>'Ada kesalahan.'];
        }
    }
}
