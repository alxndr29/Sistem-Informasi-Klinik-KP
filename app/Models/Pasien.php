<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Pasien extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'pasien';
    protected $primaryKey = 'idpasien';
    protected $fillable = ['nama_lengkap','tempat_lahir','umur','jenis_kelamin','no_telp','tanggal_lahir'];
    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class);
    }
}
