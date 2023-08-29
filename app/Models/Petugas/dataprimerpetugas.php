<?php

namespace App\Models\Petugas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataprimerpetugas extends Model
{
    use HasFactory;
    protected $table = "dataprimerguru";
    protected $fillable = [
        'namadataprimer_guru',
        'tahun',
        'batas_upload',
        'keterangan',
        'status',
        'tgl_upload',
        'file'
    ];
}
