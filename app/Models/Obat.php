<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Obat extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'obat';
    protected $primaryKey = 'idobat';

    public function kunjungan()
    {
        return $this->belongsToMany(Kunjungan::class, 'resep_stock_out', 'obat_idobat', 'kunjungan_idkunjungan')->withPivot('harga', 'jumlah', 'keterangan');
    }
    public function stokin(){
        return $this->belongsToMany(Stockin::class, 'obat_has_stok_in', 'obat_idobat', 'stok_in_idstok_in')->withPivot('jumlah','harga');
    }
}
