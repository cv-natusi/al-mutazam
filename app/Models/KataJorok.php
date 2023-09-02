<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KataJorok extends Model
{
    use HasFactory;
    protected $table = 'kata_jorok';
    protected $fillable = ['id_kata_jorok','kata_asli','diganti'];
    protected $primaryKey = "id_kata_jorok";
    public $timestamps = false;
}
