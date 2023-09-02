<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstPelajaran extends Model
{
    use HasFactory;
    protected $table = 'mst_pelajaran';
    protected $primaryKey = 'id_pelajaran';
}
