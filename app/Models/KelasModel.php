<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasModel extends Model
{
    use HasFactory;
    protected $table='kelas';
    protected $primaryKey = 'kode_kelas'; // Menggunakan post_id sebagai primary key
    public $incrementing = false; // Non-increment karena bukan integer
    protected $keyType = 'string'; // Tipe data primary key adalah string
    public $timestamps=false;
    protected $fillable=[
        'kode_kelas',
        'nama_kelas'
    ];
}
