<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Libraries\Datagrid;
use Sentinel;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'slider';
    protected $fillable = ['id_slider','gambar'];
    protected $primaryKey = "id_slider";
    public $timestamps = false;
}
