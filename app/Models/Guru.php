<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DataPenugasanGuru;
use App\Models\DetailDataPendidikanGuru;
use App\Models\MstPelajaran;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'data_guru';
    protected $primaryKey = 'id_guru';

    public static function getStrukturalPaginate()
    {
        return Guru::orderBy('id_guru')->orderBy('id_guru', 'DESC')->paginate(12);
    }
    public static function filterStrukturalById($param) {
        $guru = Guru::where('id_guru',$param->id)->first();
        $jabatan = DataPenugasanGuru::select(
                'data_penugasan_guru.tugas_utama',
                'data_penugasan_guru.guru_id',
                'tp.id_tugas_pegawai',
                'tp.nama_tugas'
            )
            ->leftJoin('tugas_pegawai as tp','tp.id_tugas_pegawai','data_penugasan_guru.tugas_utama')
            ->where('data_penugasan_guru.guru_id',$param->id)->first();
        $mapel = DetailDataPendidikanGuru::leftJoin('mst_pelajaran as mp','mp.id_pelajaran','detail_data_pendidikan_guru.mata_pelajaran')
            ->where('detail_data_pendidikan_guru.guru_id',$param->id)->get();
        return ['guru'=>$guru,'jabatan'=>$jabatan,'mapel'=>$mapel];
    }
}
