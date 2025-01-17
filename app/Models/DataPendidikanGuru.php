<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPendidikanGuru extends Model
{
    use HasFactory;
    protected $table = 'data_pendidikan_guru';
    protected $primaryKey = 'id_data_pendidikan';

    public static function store($param) {
        $dataPendidikanGuru = DataPendidikanGuru::where('guru_id',$param->id)->first();
        $save = ($dataPendidikanGuru) ? $dataPendidikanGuru : new DataPendidikanGuru;
		$save->guru_id = $param->id;
		$save->potensi_bidang = $param->potensi_bidang;
		$save->no_sertifikat_pendidik = $param->no_sertifikat_pendidik;
		$save->sertifikasi = $param->sertifikasi;
		$save->save();
		return ($save) ? $save : false;
    }
}
