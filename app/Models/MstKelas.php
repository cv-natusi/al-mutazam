<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstKelas extends Model
{
    use HasFactory;
    protected $table = 'mst_kelas';
    protected $primaryKey = 'id_kelas';
}
