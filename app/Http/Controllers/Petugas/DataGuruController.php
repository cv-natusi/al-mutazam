<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Petugas\DataGuru;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Desa;
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
                      <button class='btn btn-sm btn-secondary' title='Detail' onclick='Edit(`$row->id_guru`)'><i class='fadeIn animated bx bx-show' aria-hidden='true'></i></button>
                      <button class='btn btn-sm btn-info' title='Edit' onclick='Detail(`$row->id_guru`)'><i class='fadeIn animated bx bxs-file' aria-hidden='true'></i></button>
					";
					return $txt;
				})
                ->addColumn('bankData', function($row){
					$txt = "
                      <button class='btn btn-sm btn-info' title='Bank Primer'><i class='fadeIn animated bx bx-credit-card' aria-hidden='true'></i></button>
                      <button class='btn btn-sm btn-primary' title='Bank Sekunder'><i class='fadeIn animated bx-credit-card' aria-hidden='true'></i></button>
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
        if (empty($request->id)) {
            $data['data'] = '';
		}else{
            $data['data'] = DataGuru::where('id_guru',$request->id)->first();
		}
        $data['title'] = "Tambah ".$this->title;
        $data['data_provinsi'] = Provinsi::all();
        if(!empty($data['data'])){
            $namaProv = !empty(Provinsi::where('id', $data['data']->provinsi)->first()) ? Provinsi::where('id', $data['data']->provinsi)->first()->name : "";
            $namaKab = !empty(Kabupaten::where('id', $data['data']->kabupaten)->first()) ? Kabupaten::where('id', $data['data']->kabupaten)->first()->id : "";
            $namaKec = !empty(Kecamatan::where('id', $data['data']->kecamatan)->first()) ? Kecamatan::where('id', $data['data']->kecamatan)->first()->id : "";
            $namaKel = !empty(Desa::where('id', $data['data']->kelurahan)->first()) ? Desa::where('id', $data['data']->kelurahan)->first()->id : "";
            $this->data['prov'] = $namaProv;
            $this->data['kab'] = $namaKab;
            $this->data['kec'] = $namaKec;
            $this->data['kel'] = $namaKel;
        }else{
            $this->data['prov'] = "";
            $this->data['kab'] = "";
            $this->data['kec'] = "";
            $this->data['kel'] = "";
        }
        $content = view('content.petugas.dataguru.form', $data)->render();
		return ['status' => 'success', 'content' => $content, 'data' => $data];
    }

    public function save(Request $request){
        return $request->all();        
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
