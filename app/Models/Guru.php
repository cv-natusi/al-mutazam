<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $fillable = [
        'id_guru',
        'id_user',
        'nik',
        'nip',
        'tanggal_lahir',
        'usia',
        'foto',
        'alamat',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'desa_kelurahan',
        'telepon',
        'tugas_utama',
        'tugas_tambahan',
        'subminkal',
        'tmta',
        'status'
    ];
}
