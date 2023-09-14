<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstPengembanganDiri extends Model
{
    use HasFactory;
    protected $table = 'mst_pengembangan_diri';
    protected $primaryKey = "id_mst_pengembangan_diri";
}
