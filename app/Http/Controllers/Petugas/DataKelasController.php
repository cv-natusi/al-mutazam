<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\MstKelas;
use Illuminate\Http\Request;
use DataTables, Validator, DB, Auth;

class DataKelasController extends Controller
{
    function __construct()
	{
		$this->title = 'Data Kelas';
	}

    public function main(Request $request) {
        if(request()->ajax()){
            $data = MstKelas::orderBy('id_kelas','ASC')->get();
			
			return DataTables::of($data)
				->addIndexColumn()
				->addColumn('actions', function($row){
					$txt = "
                    <button class='btn btn-sm btn-secondary' title='Edit' onclick='editData(`$row->id_kelas`)'><i class='fadeIn animated bx bxs-file' aria-hidden='true'></i></button>
                    <button class='btn btn-sm btn-danger' title='Hapus' onclick='hapusData(`$row->id_kelas`)'><i class='fadeIn animated bx bxs-trash' aria-hidden='true'></i></button>
					";
					return $txt;
				})
                ->addColumn('guru', function($row){
					return "Testinggg";
				})
				->rawColumns(['actions'])
				->toJson();
		}

        $data['title'] = $this->title;
        return view('content.petugas.datakelas.main', $data);
    }

    public function tambahDataKelas() {
        if (empty($request->id)) {
            $data['title'] = "Tambah ".$this->title;
            $data['data'] = '';    
		}else{
            $data['title'] = "Edit ".$this->title;
            $data['data'] = MstKelas::where('id_kelas',$request->id)->first();
		}
        $content = view('content.petugas.datakelas.form', $data)->render();
		return ['status' => 'success', 'content' => $content, 'data' => $data];
    }

    public function save(Request $request) {
        
    }

}
