<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iklan extends Model
{
    use HasFactory;
    protected $table = 'iklan';
    protected $fillable = ['id_iklan','judul_iklan','tgl_iklan','posisi','gambar_iklan','url','aktif'];
    protected $primaryKey = "id_iklan";
    public $timestamps = false;
}
