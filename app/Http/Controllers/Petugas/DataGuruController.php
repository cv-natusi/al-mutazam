<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Petugas\DataGuru;
use App\Models\Provinsi;
use App\Models\Petugas\DataPrimerGuru;
use App\Models\Petugas\DataSekunderGuru;
use Illuminate\Http\Request;
use DataTables, Validator, DB, Auth;

class DataGuruController extends Controller
{
    function __construct()
	{
		$this->title = 'Data Guru';
	}

    public function dataGuru() {
        if(request()->ajax()){
            $data = DataGuru::orderBy('id_guru','ASC')->get();
			
			return DataTables::of($data)
				->addIndexColumn()
				->addColumn('actions', function($row){
					$txt = "
                      <button class='btn btn-sm btn-info' title='Detail' onclick='Edit(`$row->id_guru`)'><i class='fadeIn animated bx bx-show' aria-hidden='true'></i></button>
                      <button class='btn btn-sm btn-primary' title='Edit' onclick='Detail(`$row->id_guru`)'><i class='fadeIn animated bx bxs-file' aria-hidden='true'></i></button>
					";
					return $txt;
				})
				->rawColumns(['actions'])
				->toJson();
		}

        $data['title'] = $this->title;
        return view('content.petugas.dataguru.main', $data);
    }
    
    public function tambahGuru() {
        $data['title'] = "Tambah ".$this->title;
        $data['provinsi'] = Provinsi::all();
        if (empty($request->id)) {
            $data['page'] = 'Tambah';
            $data['guru'] = '';
		}else{
            $data['page'] = 'Edit';
			$data['guru'] = DataGuru::where('id_guru',$request->id)->first();
		}
        $content = view('content.petugas.dataguru.form', $data)->render();
		return ['status' => 'success', 'content' => $content, 'data' => $data];
    }
    
    public function editGuru() {
        $data['title'] = $this->title;
        return view('content.petugas.dataguru.updateguru', $data);
    }

    public function detailGuru() {
        $data['title'] = $this->title;
        $guru = DataGuru::all();
        return view('content.petugas.dataguru.detail', compact('guru'), $data);
    }

    public function primerGuru() {
        $data['title'] = $this->title;
        $guru = DataGuru::all();
        $primerguru = DataPrimerGuru::all();
        return view('content.petugas.dataguru.dataprimer', compact('primerguru','guru'), $data);
    }

    public function sekunderGuru() {
        $data['title'] = $this->title;
        $guru = DataGuru::all();
        $sekunderguru = DataSekunderGuru::all();
        return view('content.petugas.dataguru.datasekunder', compact('sekunderguru','guru'), $data);
    }
    
}
