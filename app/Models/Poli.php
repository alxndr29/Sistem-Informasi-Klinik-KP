<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Poli extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'poli';
    protected $primaryKey = 'idpoli';
    protected $fillable = ['nama_lengkap'];
    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class);
    }
    public function dokter(){
        return $this->hasMany(Dokter::class);
    }
}
