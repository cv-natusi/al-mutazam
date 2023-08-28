<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    use HasFactory;
    protected $table = 'datapelajaran';
    protected $fillable = [
        'id',
        'id_kelas',
        'id_guru',
        'mapel',
        'ta',
        'semester'
    ];
}
