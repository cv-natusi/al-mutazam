<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BerbagiDokumen;
use Illuminate\Support\Facades\Storage;
use DataTables,Validator,DB,Auth,PDF;

class BerbagiDokumenController extends Controller
{
    function __construct()
	{
		$this->title = 'Berbagi Dokumen';
	}

    public function main(Request $request) {
        if(request()->ajax()){
            // return $request->all();
            if (!empty($request->tahun) && !empty($request->semester)) {
                $data = BerbagiDokumen::where('tahun_ajaran',$request->tahun)->where('semester',$request->semester)->orderBy('id_berbagi_dokumen','ASC')->get();
            } else {
                $data = BerbagiDokumen::orderBy('id_berbagi_dokumen','ASC')->get();
            }
			
			return DataTables::of($data)
				->addIndexColumn()
				->addColumn('actions', function($row){
					$txt = "
                    <button class='btn btn-sm btn-secondary' title='Edit' onclick='formAdd(`$row->id_berbagi_dokumen`)'><i class='fadeIn animated bx bxs-edit' aria-hidden='true'></i></button>
                    <button class='btn btn-sm btn-danger' title='Hapus' onclick='hapusData(`$row->id_berbagi_dokumen`)'><i class='fadeIn animated bx bxs-trash' aria-hidden='true'></i></button>
					";
					return $txt;
				})
                ->addColumn('status', function($row){
					$txt = 'STATUS';
					return $txt;
				})
				->rawColumns(['actions'])
				->toJson();
		}

        $data['title'] = $this->title;
        return view('content.petugas.berbagiDokumen.main', $data);
    }

    public function modalForm(Request $request)
    {
        if (empty($request->id)) {
            $data['title'] = "Tambah ".$this->title;
            $data['data'] = '';    
		}else{
            $data['title'] = "Edit ".$this->title;
            $data['data'] = BerbagiDokumen::where('id_berbagi_dokumen',$request->id)->first();
		}
        $content = view('content.petugas.berbagiDokumen.modal', $data)->render();
		return ['content'=>$content];
    }

    public function save(Request $request)
    {
        try {
            if(empty($request->id)) {
                $request->validate([
                    'file_dokumen' => 'required|mimes:pdf|max:2048',
                ]);
                $data = new BerbagiDokumen;
            } else {
                $data = BerbagiDokumen::where('id_berbagi_dokumen',$request->id)->first();
            }
            $data->tahun_ajaran = $request->tahun_ajaran;
            $data->semester     = $request->semester;
            $data->nama_dokumen = $request->nama_dokumen;
            if ($request->file_dokumen) {
                $fileName = $request->file_dokumen->getClientOriginalName();
                $filePath = 'uploads/berbagiDokumen/' . $fileName;
                $path = Storage::disk('public')->put($filePath, file_get_contents($request->file_dokumen));
                $path = Storage::disk('public')->url($path);
                $data->file_dokumen = $fileName;
            }
            $data->save(); 
            if($data){
                return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Disimpan.'];
            } else{
                return ['code'=>201,'status'=>'success','message'=>'Data gagal Disimpan.'];
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function delete(Request $request) {
        $data = BerbagiDokumen::find($request->id);
        $data->delete();
        if ($data) {
            return ['code'=>200,'status'=>'success','message'=>'Data Berhasil Dihapus.'];
        } else {
            return ['code'=>201,'status'=>'error','message'=>'Data Gagal Dihapus.'];
        }
    }
}
