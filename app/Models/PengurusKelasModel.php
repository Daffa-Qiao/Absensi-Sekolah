<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengurusKelasModel extends Model
{
    use HasFactory;
    protected $table='pengurus_kelas';
    protected $primaryKey='id_pengurus_kelas';
    public $timestamps=false;
    protected $fillable=['jabatan'];
}
