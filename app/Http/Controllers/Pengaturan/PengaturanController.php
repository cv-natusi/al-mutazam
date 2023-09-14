<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Auth, DB, DataTables;

class PengaturanController extends Controller
{
    #Pengaturan
    public function form(){
        $data['data']  = Users::where('id',Auth::User()->id)->first();
        $data['title'] = "Pengaturan";
        return view('content.petugas.pengaturan.form', $data);
    }
    public function save(Request $request) {
        $data = Users::find($request->id);
        $data->password = bcrypt($request->password_baru);
        $data->lihat_password = $request->password_baru;
        $data->save();
        if ($data) {
            return ['code'=>200,'status'=>'success','message'=>'Update Berhasil.'];
        } else {
            return ['code'=>201,'status'=>'error','message'=>'Update Gagal.'];
        }
    }

    #Reset Akun
    public function main(Request $request) {
        if(request()->ajax()){
            $data = Users::where('active', 'active')->orderBy('id','ASC')->get();
            
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function($row){
                    $txt = "
                    <button style='color: #fff' class='btn btn-sm btn-secondary' title='Reset' onclick='resetData(`$row->id`)'>Reset</button>
                    <button style='color: #fff' class='btn btn-sm btn-danger' title='Non Aktifkan' onclick='nonActiveData(`$row->id`)'>Non-Aktifkan</button>
                    ";
                    return $txt;
                })
                ->rawColumns(['actions'])
                ->toJson();
        }

        $data['title'] = "Reset Akun";
        return view('content.petugas.resetAkun.main', $data);
    }

    public function reset(Request $request){
        return 'Maintenance';
    }

    public function remove(Request $request){
        $data = Users::find($request->id);
        $data->active = 'non active';
        $data->save();
        if ($data) {
            return ['code'=>200,'status'=>'success','message'=>'Berhasil.'];
        } else {
            return ['code'=>201,'status'=>'error','message'=>'Gagal.'];
        }
    }
}
