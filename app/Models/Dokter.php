<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dokter extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'dokter';
    protected $primaryKey = 'iddokter';
    protected $fillable = ['nama_lengkap','jenis_kelamin','tempat_lahir','tanggal_lahir','alamat'];
    public function kunjungan(){
        return $this->hasMany(Kunjungan::class);
    }
    public function poli(){
        return $this->belongsTo(Poli::class);
    }
}
