<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;
    protected $table = 'galeri';
    protected $fillable = ['id_galeri','file_galeri','deskripsi_galeri','kategori_galeri'];
    protected $primaryKey = "id_galeri";
    public $timestamps = false;
}
