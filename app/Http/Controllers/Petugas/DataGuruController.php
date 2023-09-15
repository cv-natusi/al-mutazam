<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\TugasPegawai;
use App\Models\MstPelajaran;
use App\Models\Petugas\DataPrimerGuru;
use App\Models\Petugas\DataSekunderGuru;
use Illuminate\Http\Request;
use DataTables, Validator, DB, Auth;

class DataGuruController extends Controller{
	function __construct(){
		$this->title = 'Data Guru';
	}
	
	public function main(Request $request) {
		if(request()->ajax()){
			$data = Guru::orderBy('id_guru','ASC')->get();
			return DataTables::of($data)
				->addIndexColumn()
				->addColumn('actions', function($row){
					$txt = "
						<button style='color: #fff' class='btn btn-sm btn-secondary' title='Detail' onclick='formAdd(`$row->id_guru`)'><i class='fadeIn animated bx bxs-file-find' aria-hidden='true'></i></button>
						<button style='color: #fff' class='btn btn-sm btn-danger' title='Delete' onclick='Delete(`$row->id_guru`)'><i class='fadeIn animated bx bxs-trash' aria-hidden='true'></i></button>
					";
					return $txt;
				})
				->rawColumns(['actions'])
				->toJson();
		}
		$data['title'] = $this->title;
		return view('content.petugas.dataguru.main', $data);
	}
	
	public function form(Request $request) {
		if (empty($request->id)) {
			$data['data'] = '';
			$data['title'] = "Tambah ".$this->title;
		}else{
			$data['data'] = Guru::where('id_guru',$request->id)->first();
			$data['title'] = "Edit ".$this->title;
		}
		if (!empty($data['data'])) {
			$data['dataMapel'] = Guru::select(
				'data_guru.id_guru',
				'dpg.id_data_pendidikan',
				'dpg.guru_id',
				'dpg.potensi_bidang',
				'dpg.no_sertifikat_pendidik',
				'dpg.sertifikasi',
				'ddpg.id_detail_data_pendidikan',
				'ddpg.data_pendidikan_id',
				'ddpg.mata_pelajaran',
				'ddpg.jumlah_jam',
				'mp.id_pelajaran',
				'mp.nama_mapel'
			)->leftJoin('data_pendidikan_guru as dpg','dpg.guru_id','data_guru.id_guru')
			->leftJoin('detail_data_pendidikan_guru as ddpg','ddpg.data_pendidikan_id','dpg.id_data_pendidikan')
			->leftJoin('mst_pelajaran as mp','mp.id_pelajaran','ddpg.mata_pelajaran')
			->where('data_guru.id_guru', $data['data']->id_guru)
			->get();
		} else {
			$data['dataMapel'] = [];
		}
		$data['tugas'] = TugasPegawai::all();
		$data['pelajaran'] = MstPelajaran::all();
		$content = view('content.petugas.dataguru.form', $data)->render();
		return ['status' => 'success', 'content' => $content, 'data' => $data];
	}
	
	public function cariMapel(Request $request) {
		$data = MstPelajaran::whereRaw("UPPER(nama_mapel) like '%".strtoupper($request->nama_mapel)."%'")
			->where('guru_id','=',$request->guru_id)
			->limit(5)->get();

		if (count($data) > 0) {
			$return = ['status'=>'success', 'code'=>200, 'message'=>'Berhasil', 'data'=>$data];
		}else{
			$return = ['status'=>'warning', 'code'=>500, 'message'=>'Data tidak ditemukan', 'data'=>""];
		}
		return response()->json($return);
	}
	
	public function saveDataDiri(Request $request) {
		if (empty($request->id)) {
			$data = new Guru;
		} else {
			$data = Guru::find($request->id);
		}
		try {
			$data->nama = strtoupper($request->nama);
			$data->nik = $request->nik;
			$data->nip = $request->nip;
			$data->nuptk = $request->nuptk;
			$data->ptkid = $request->ptkid;
			$data->nrg_npk = $request->nrg_npk;
			$data->tmt_pegawai = $request->tmt_pegawai;
			$data->tmt_guru = $request->tmt_guru;
			$data->email = $request->email;
			$data->email_madrasah = $request->email_madrasah;
			$data->tempat_lahir = $request->tempat_lahir;
			$data->tanggal_lahir = date('Y-m-d',strtotime($request->tanggal_lahir));
			$data->alamat = $request->alamat;
			if ($image = $request->file('foto')) {
				$destinationPath = 'images/guru';
				$profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
				$image->move($destinationPath, $profileImage);
				$data->foto = "$profileImage";
			}
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
	public function saveDataPendidikan(Request $request){
		return $request->all();
	}
	public function saveDataPenugasan(Request $request){
		return $request->all();
	}
	public function saveDataPendukung(Request $request){
		return $request->all();
	}
}
