<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockin extends Model
{
    use HasFactory;
    protected $table = 'stok_in';
    protected $primaryKey = 'idstok_in';

    public function obat()
    {
        return $this->belongsToMany(Obat::class, 'obat_has_stok_in', 'stok_in_idstok_in', 'obat_idobat')->withPivot('jumlah', 'harga');
    }
}
