<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\MstSIM;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class MasterSIMController extends Controller
{
    public function __construct()
    {
        $this->title = 'Master SIM';
    }
    public function main(Request $request)  {
        if(request()->ajax()){
            $data = MstSIM::latest();
            
            return DataTables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('images', function($row){
                    $check = Storage::disk('public')->exists("/uploads/MstSIM/$row->gambar");
                    if($check   ){
                        $image = "<img src='" . asset('storage/uploads/MstSIM/' . $row->gambar)  . "' style='height:75px'/>";
                    }else{
                        $image = '';
                    }
                    return $image;
                })
                ->addColumn('actions', function($row){
                    $txt = "
                    <button class='btn btn-sm btn-secondary' title='Edit' onclick='formAdd(`$row->id_mst_sim`)'><i class='fadeIn animated bx bxs-file' aria-hidden='true'></i></button>
                    <button class='btn btn-sm btn-danger' title='Hapus' onclick='hapusData(`$row->id_mst_sim`)'><i class='fadeIn animated bx bxs-trash' aria-hidden='true'></i></button>
					";
					return $txt;
                })
                
                ->rawColumns(['actions','images'])
                ->toJson();
        }

        $data['title'] = $this->title;
        return view('content.petugas.masterSim.main', $data);
    }
    public function modalForm(Request $request)
    {
        // return $request->all(); 
        if (empty($request->id)) {
            $data['title'] = "Tambah ".$this->title;
            $data['data'] = '';    
		}else{
            $data['title'] = "Edit ".$this->title;
            $data['data'] = MstSIM::find($request->id);
		}
        $content = view('content.petugas.masterSim.modal', $data)->render();
		return ['content'=>$content];
    }
    public function save(Request $request)
    {
        try {
            $rules = array(
                'gambar' => 'required|mimes:jpeg,png,jpg|max:2048',
            );
            $messages = array(
                'required'  => 'harus diisi',
                'mimes'  => 'format file tidak diperbolehkan',
                'max' => 'ukuran file terlalu besar'
            );
            $validator = Validator::make($request->all(), $rules, $messages);
            if (!$validator->fails()) {
                if(empty($request->id)) {
                    $data = new MstSIM;
                } else {
                    $data = MstSIM::find($request->id);
                }
                $data->nama = $request->nama;
                $data->link_url     = $request->link_url;
                if ($request->gambar) {
                    //REMOVE PREV IMAGE
                    if (isset($data->gambar)) {
                        $check = Storage::disk('public')->exists("/uploads/MstSIM/$data->gambar");
                        if($check == 1 || $check == true){
                            Storage::disk('public')->delete("uploads/MstSIM/$data->gambar");
                        }
                    }
                    $fileName = date('YmdHis') .'.'.$request->gambar->getClientOriginalExtension();
                    $filePath = 'uploads/MstSIM/' . $fileName;
                    $path = Storage::disk('public')->put($filePath, file_get_contents($request->gambar));
                    $path = Storage::disk('public')->url($path);
                    $data->gambar = $fileName;
                }
                $data->save(); 
                return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Disimpan.'];
                
            }else{
                return ['code'=>403,'status'=>'failed','message'=> $validator->messages()];
            }
           
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function delete(Request $request) {
        $data = MstSIM::find($request->id);
        //DELETE IMAGE IF HAS IMAGE
        if (isset($data->gambar)) {
            $check = Storage::disk('public')->exists("/uploads/MstSIM/$data->gambar");
            if($check == 1 || $check == true){
                Storage::disk('public')->delete("uploads/MstSIM/$data->gambar");
            }
        }
        
        $data->delete();
        if ($data) {
            return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Dihapus.'];
        } else {
            return ['code'=>201,'status'=>'error','message'=>'Data Gagal Dihapus.'];
        }
    }
}
