<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengembanganDiri extends Model
{
    use HasFactory;
    protected $table = 'pengembangan_diri';
    protected $primaryKey = "id_pengembangan_diri";
}
