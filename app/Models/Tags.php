<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    protected $table = 'tag';
    protected $fillable = ['nama_tag'];
    protected $primaryKey = "nama_tag";
    public $timestamps = false;
}
