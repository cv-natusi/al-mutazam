<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasPegawai extends Model
{
    use HasFactory;
    protected $table = 'tugas_pegawai';
    protected $primaryKey = 'id_tugas_pegawai';
}
