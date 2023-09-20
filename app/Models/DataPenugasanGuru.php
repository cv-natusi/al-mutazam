<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenugasanGuru extends Model{
	use HasFactory;
	protected $table = 'data_penugasan_guru';
	
	public static function store($param) {
		$data = DataPenugasanGuru::where('guru_id',$param->id)->first();
        $save = ($data) ? $data : new DataPenugasanGuru;
		$save->guru_id = $param->id;
		$save->tugas_utama = $param->tugas_utama;
		$save->save();
		return ($save) ? $save : false;
	}
}
