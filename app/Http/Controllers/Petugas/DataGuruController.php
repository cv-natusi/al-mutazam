<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\TugasPegawai;
use App\Models\MstPelajaran;
use App\Models\DataPendidikanGuru;
use App\Models\DetailDataPendidikanGuru;
use App\Models\DataPenugasanGuru;
use App\Models\DetailDataPenugasanGuru;
use App\Models\DataPendukungGuru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use DataTables, Validator, DB, Auth, Help;

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
					'ddpg.guru_id',
					'ddpg.mata_pelajaran',
					'ddpg.jumlah_jam',
					'mp.id_pelajaran',
					'mp.nama_mapel'
				)->leftJoin('data_pendidikan_guru as dpg','dpg.guru_id','data_guru.id_guru')
				->leftJoin('detail_data_pendidikan_guru as ddpg','ddpg.guru_id','data_guru.id_guru')
				->leftJoin('mst_pelajaran as mp','mp.id_pelajaran','ddpg.mata_pelajaran')
				->where('data_guru.id_guru', $data['data']->id_guru)->get();
			$data['dataTugas'] = Guru::select(
					'data_guru.id_guru',
					'dpg.id_data_penugasan',
					'dpg.guru_id',
					'dpg.tugas_utama',
					'tp.id_tugas_pegawai',
					'tp.nama_tugas'
				)
				->leftJoin('data_penugasan_guru as dpg','dpg.guru_id','data_guru.id_guru')
				->leftJoin('tugas_pegawai as tp','tp.id_tugas_pegawai','dpg.tugas_utama')
				->where('data_guru.id_guru', $data['data']->id_guru)->first();
			$data['detailTugas'] = Guru::select(
					'data_guru.id_guru',
					'ddpg.id_detail_data_penugasan',
					'ddpg.guru_id',
					'ddpg.tugas_tambahan',
					'tp.id_tugas_pegawai',
					'tp.nama_tugas'
				)
				->leftJoin('detail_data_penugasan_guru as ddpg','ddpg.guru_id','data_guru.id_guru')
				->leftJoin('tugas_pegawai as tp','tp.id_tugas_pegawai','ddpg.tugas_tambahan')
				->where('data_guru.id_guru', $data['data']->id_guru)->get();
		} else {
			$data['dataMapel'] = [];
			$data['detailTugas'] = [];
			$data['dataTugas'] = '';
		}
		$data['tugas'] = TugasPegawai::all();
		$data['pelajaran'] = MstPelajaran::where('guru_id',$request->id)->get();
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
		
		try {
				$rules = [
					'nama' => 'required',
					'nik' => 'required',
					'no_telp' => 'required',
					'tempat_lahir' => 'required',
					'tanggal_lahir' => 'required',
					'foto' => 'mimes:jpeg,png,jpg|max:2048',
				];
				if ($request->tmt_pegawai) {
					$rules['file_tmt_pegawai'] = 'required|mimes:jpeg,png,jpg,pdf,docx|max:2048';
					//JIKA EDIT DAN SEBELUMNYA SUDAH ADA FILE
					if ($request->id) {
						$guru = Guru::find($request->id);
						if (!empty($guru->file_tmt_petugas)) {
							$rules['file_tmt_pegawai'] = 'mimes:jpeg,png,jpg,pdf,docx|max:2048';
						}
					}
				}
				if ($request->tmt_guru) {
					$rules['file_tmt_guru'] = 'required|mimes:jpeg,png,jpg,pdf,docx|max:2048';
					//JIKA EDIT DAN SEBELUMNYA SUDAH ADA FILE
					if ($request->id) {
						$guru = Guru::find($request->id);
						if (!empty($guru->file_tmt_guru)) {
							$rules['file_tmt_guru'] = 'mimes:jpeg,png,jpg,pdf,docx|max:2048';
						}
					}
				}
            $messages = array(
                'required'  => 'harus diisi',
                'mimes'  => 'format file tidak diperbolehkan',
                'max' => 'ukuran file terlalu besar'
            );
            $validator = Validator::make($request->all(), $rules, $messages);
            if (!$validator->fails()) {
				if (empty($request->id)) {
					$data = new Guru;
				} else {
					$data = Guru::find($request->id);
				}
				$data->nama = strtoupper($request->nama);
				$data->nik = $request->nik;
				$data->nip = $request->nip;
				$data->no_telp = $request->no_telp;
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
				if ($image_tmt_pegawai = $request->file('file_tmt_pegawai')) {
					$destinationPath = 'images/guru/TMTPegawai';
					$profileImageTmtPegawai = date('YmdHis') . "." . $image_tmt_pegawai->getClientOriginalExtension();
					$image_tmt_pegawai->move($destinationPath, $profileImageTmtPegawai);
					$data->file_tmt_petugas = "$profileImageTmtPegawai";
				}
				if ($image_tmt_guru = $request->file('file_tmt_guru')) {
					$destinationPath = 'images/guru/TMTGuru';
					$profileImage = date('YmdHis') . "." . $image_tmt_guru->getClientOriginalExtension();
					$image_tmt_guru->move($destinationPath, $profileImage);
					$data->file_tmt_guru = "$profileImage";
				}
				if ($image = $request->file('foto')) {
					$destinationPath = 'images/guru';
					$profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
					$image->move($destinationPath, $profileImage);
					$data->foto = "$profileImage";
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
	public function saveDataPendidikan(Request $request){
		try {
			DB::beginTransaction();
			$rules = [
				'file_sertifikat_pendidik' => 'mimes:jpeg,png,jpg|max:2048',
			];
			if ($request->potensi_bidang) {
				$rules['no_sertifikat_pendidik'] = 'required';
				$rules['sertifikasi'] = 'required';
				$rules['file_sertifikat_pendidik'] = 'required|mimes:jpeg,png,jpg,pdf,docx|max:2048';

				if ($request->id) {
					$dt_pendidikan = DataPendidikanGuru::where('guru_id',$request->id)->first();
					if(!empty($dt_pendidikan->file_sertifikasi)){
						$rules['file_sertifikat_pendidik'] = 'mimes:jpeg,png,jpg,pdf,docx|max:2048';
					}
				}
			}
			$messages = array(
				'required'  => 'harus diisi',
				'mimes'  => 'format file tidak diperbolehkan',
				'max' => 'ukuran file terlalu besar'
			);
			$validator = Validator::make($request->all(), $rules, $messages);
            if (!$validator->fails()) {
				$save = DataPendidikanGuru::store($request);
				if (!$save) {
					DB::rollback();
					return Help::resAjax(['message'=>'Data pendidikan guru gagal disimpan','code'=>500]);
				}
				foreach($request->mata_pelajaran as $k => $v){
					$detailDataPendidikanGuru = DetailDataPendidikanGuru::where([
						['mata_pelajaran',$v],
						['guru_id',$request->id],
					])->first();
					$store = $detailDataPendidikanGuru ? $detailDataPendidikanGuru : new DetailDataPendidikanGuru;
					$store->guru_id = $request->id;
					$store->mata_pelajaran = $v;
					$store->jumlah_jam = $request->jumlah_jam[$k];
					$store->save();
					if(!$store){
						DB::rollback();
						return Help::resAjax(['message'=>'Mapel gagal disimpan','code'=>500]);
					}
				}
				$checkDelete = DetailDataPendidikanGuru::where('guru_id',$request->id)->whereNotIn('mata_pelajaran',$request->mata_pelajaran);
				if($checkDelete->count()>0 && !$checkDelete->delete()){
					DB::rollback();
					return Help::resAjax(['message'=>'Mapel gagal dihapus','code'=>500]);
				}
				DB::commit();
				return Help::resAjax(['message'=>'Data berhasil disimpan','code'=>200,'response'=>$store]);
			}else{
				return ['code'=>403,'status'=>'failed','message'=> $validator->messages()];
			}
		} catch (\Throwable $e) {
			Log::error('Terjadi kesalahan sistem: ' . $e->getMessage());
		}
	}
	public function saveDataPenugasan(Request $request){
		return $request->all();
		try {
			DB::beginTransaction();
			$save = DataPenugasanGuru::store($request);
			if (!$save) {
				DB::rollback();
				return Help::resAjax(['message'=>'Data penugasan gagal disimpan','code'=>500]);
			}
			foreach($request->tugasTambahan as $k => $v){
				$detailPenugasan = DetailDataPenugasanGuru::where([
					['tugas_tambahan',$v],
					['guru_id',$request->id],
				])->first();
				$store = $detailPenugasan ? $detailPenugasan : new DetailDataPenugasanGuru;
				$store->guru_id = $request->id;
				$store->tugas_tambahan = $v;
				$store->save();
				if(!$store){
					DB::rollback();
					return Help::resAjax(['message'=>'Tugas tambahan gagal disimpan','code'=>500]);
				}
			}
			$checkDelete = DetailDataPenugasanGuru::where('guru_id',$request->id)->whereNotIn('tugas_tambahan',$request->tugasTambahan);
			if($checkDelete->count()>0 && !$checkDelete->delete()){
				DB::rollback();
				return Help::resAjax(['message'=>'Data penugasan gagal dihapus','code'=>500]);
			}
			DB::commit();
			return Help::resAjax(['message'=>'Data berhasil disimpan','code'=>200,'response'=>$store]);
		} catch (\Throwable $e) {
			Log::error('Terjadi kesalahan sistem: ' . $e->getMessage());
		}
	}
	public function saveDataPendukung(Request $request){
		// return $request->all();
		
		try {
			DB::beginTransaction();
			$rules = [
				'file_ktp' => 'required|image|mimes:jpeg,png,jpg,gif,pdf|max:2048',
				'file_kk' => 'required|image|mimes:jpeg,png,jpg,gif,pdf|max:2048',
				'file_sk' => 'required|image|mimes:jpeg,png,jpg,gif,pdf|max:2048',
				'ijazah_terakhir' => 'required|image|mimes:jpeg,png,jpg,gif,pdf|max:2048',
				];
			$data_pendukung = DataPendukungGuru::where('guru_id',$request->id)->first();
			if (!empty($data_pendukung->file_ktp)) {
				$rules['file_ktp'] = 'image|mimes:jpeg,png,jpg,gif,pdf|max:2048';
			}
			if (!empty($data_pendukung->file_kk)) {
				$rules['file_kk'] = 'image|mimes:jpeg,png,jpg,gif,pdf|max:2048';
			}
			if (!empty($data_pendukung->file_sk)) {
				$rules['file_sk'] = 'image|mimes:jpeg,png,jpg,gif,pdf|max:2048';
			}
			if (!empty($data_pendukung->ijazah_terakhir)) {
				$rules['ijazah_terakhir'] = 'image|mimes:jpeg,png,jpg,gif,pdf|max:2048';
			}

			$messages = array(
				'required'  => 'harus diisi',
				'mimes'  => 'format file tidak diperbolehkan',
				'max' => 'ukuran file terlalu besar'
			);
			$validator = Validator::make($request->all(), $rules, $messages);
			if (!$validator->fails()) {
			$dataPendukung = DataPendukungGuru::where('guru_id', $request->id)->first();
			$data = ($dataPendukung) ? $dataPendukung : new DataPendukungGuru;
			$data->guru_id = $request->id;
			if ($request->file_ktp) {
				if (isset($data->file_ktp)) {
					$check = Storage::disk('public')->exists("/uploads/dokumenGuru/$data->file_ktp");
					if($check == 1 || $check == true){
						Storage::disk('public')->delete("uploads/dokumenGuru/$data->file_ktp");
					}
				}
				$fileName =  date('YmdHis') . ".". $request->file_ktp->getClientOriginalName();
				$filePath = 'uploads/dokumenGuru/' . $fileName;
				$path = Storage::disk('public')->put($filePath, file_get_contents($request->file_ktp));
				$path = Storage::disk('public')->url($path);
				$data->file_ktp = $fileName;
			}
			if ($request->file_kk) {
				if (isset($data->file_kk)) {
					$check = Storage::disk('public')->exists("/uploads/dokumenGuru/$data->file_kk");
					if($check == 1 || $check == true){
						Storage::disk('public')->delete("uploads/dokumenGuru/$data->file_kk");
					}
				}
				$fileNameKK =  date('YmdHis') . ".".  $request->file_kk->getClientOriginalName();
				$filePath = 'uploads/dokumenGuru/' . $fileNameKK;
				$path = Storage::disk('public')->put($filePath, file_get_contents($request->file_kk));
				$path = Storage::disk('public')->url($path);
				$data->file_kk = $fileNameKK;
			}
			if ($request->file_sk) {
				if (isset($data->file_sk)) {
					$check = Storage::disk('public')->exists("/uploads/dokumenGuru/$data->file_sk");
					if($check == 1 || $check == true){
						Storage::disk('public')->delete("uploads/dokumenGuru/$data->file_sk");
					}
				}
				$fileNameSertifikat =  date('YmdHis') . ".". $request->file_sk->getClientOriginalName();
				$filePath = 'uploads/dokumenGuru/' . $fileNameSertifikat;
				$path = Storage::disk('public')->put($filePath, file_get_contents($request->file_sk));
				$path = Storage::disk('public')->url($path);
				$data->file_sk = $fileNameSertifikat;
			}
			if ($request->ijazah_terakhir) {
				if (isset($data->ijazah_terakhir)) {
					$check = Storage::disk('public')->exists("/uploads/dokumenGuru/$data->ijazah_terakhir");
					if($check == 1 || $check == true){
						Storage::disk('public')->delete("uploads/dokumenGuru/$data->ijazah_terakhir");
					}
				}
				$fileNameIjazah =  date('YmdHis') . ".". $request->ijazah_terakhir->getClientOriginalName();
				$filePath = 'uploads/dokumenGuru/' . $fileNameIjazah;
				$path = Storage::disk('public')->put($filePath, file_get_contents($request->ijazah_terakhir));
				$path = Storage::disk('public')->url($path);
				$data->ijazah_terakhir = $fileNameIjazah;
			}
			$data->save();
			if (!$data) {
				DB::rollback();
				return Help::resAjax(['message'=>'Data pendukung gagal disimpan','code'=>500]);
			}
			DB::commit();
			return Help::resAjax(['message'=>'Data berhasil disimpan','code'=>200,'response'=>$data]);
		}else{
			return ['code'=>403,'status'=>'failed','message'=> $validator->messages()];
		}
		} catch (\Throwable $e) {
			Log::error('Terjadi kesalahan sistem: ' . $e->getMessage());
		}
	}
	public function guruFind(Request $request) {
		$text_search = $request->q ?? '....';
		$data = Guru::where('nama_guru', 'ilike', "%$text_search%")->orWhere('nip',  'ilike', "%$text_search%")
			->get();
		return response()->json($data, 200);
	}
}
