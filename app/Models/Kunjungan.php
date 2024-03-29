<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;
    protected $table = 'kunjungan';
    protected $primaryKey = 'idkunjungan';
    protected $fillable = ['poli_idpoli','status_bayar'];
    public function pasien(){
        return $this->belongsTo(Pasien::class, 'pasien_idpasien');
    }

    public function dokter(){
        return $this->belongsTo(Dokter::class,'dokter_iddokter');
    }
    public function obat(){
        return $this->belongsToMany(Obat::class, 'resep_stock_out', 'kunjungan_idkunjungan', 'obat_idobat')->withPivot('harga','jumlah','keterangan');
    }
    public function Poli(){
        return $this->belongsTo(Poli::class, 'poli_idpoli', 'idpoli','poli');
    }
}
