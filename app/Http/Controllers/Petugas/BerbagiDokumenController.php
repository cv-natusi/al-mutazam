<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BerbagiDokumen;
use DataTables,Validator,DB,Auth;

class BerbagiDokumenController extends Controller
{
    function __construct()
	{
		$this->title = 'Berbagi Dokumen';
	}

    public function main(Request $request) {
        if(request()->ajax()){
            $data = BerbagiDokumen::orderBy('id_berbagi_dokumen','ASC')->get();
			
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
        $request->validate([
            'file_dokumen' => 'required|mimes:pdf|max:2048',
        ]);
        if ($image = $request->file('foto')) {
            $destinationPath = 'images/guru';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data->foto = "$profileImage";
        }
        $file = $request->file('file_dokumen');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('uploads/pdf', $filename, 'public');
            $pdf = PDF::loadView('pdf.invoice', $data);
        Storage::put('public/pdf/invoice.pdf', $pdf->output());
        try {
            if(empty($request->id)) {
                $data = new BerbagiDokumen;
            } else {
                $data = BerbagiDokumen::where('id_berbagi_dokumen',$request->id)->first();
            }
            $data->tahun_ajaran = $request->tahun_ajaran;
            $data->semester     = $request->semester;
            $data->nama_dokumen = $request->nama_dokumen;
            $data->file_dokumen = $filename;
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
}
