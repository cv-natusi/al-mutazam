<?php

namespace App\Models\Petugas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datasekunderpetugas extends Model
{
    use HasFactory;
    protected $table = "datasekunderguru";
    protected $fillable = [
        'namadatasekunder_guru',
        'tahun',
        'batas_upload',
        'keterangan',
        'status',
        'tgl_upload',
        'file'
    ];
}
