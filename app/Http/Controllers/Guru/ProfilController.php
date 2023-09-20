<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Guru;
use App\Models\TugasPegawai;
use App\Models\MstPelajaran;
use Auth;

class ProfilController extends Controller
{
    function __construct()
    {
        $this->title = 'Profil Guru';
    }

    public function form()
    {
		$checkGuru = Guru::where('id_guru',Auth::User()->guru_id)->first();
        if ($checkGuru) {
			$data['data'] = $checkGuru;
		} else {
			$data['data'] = '';
		}
        $data['title'] = "Edit ".$this->title;
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
			$data['dataTugas'] = '';
			$data['detailTugas'] = [];
		}
		$data['tugas'] = TugasPegawai::all();
		$data['pelajaran'] = MstPelajaran::where('guru_id',Auth::User()->guru_id)->get();
		return view('content.guru.dataguru.form', $data);
    }
}
