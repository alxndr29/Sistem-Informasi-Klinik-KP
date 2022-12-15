<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockin extends Model
{
    use HasFactory;
    protected $table = 'stok_in';
    protected $primaryKey = 'idstok_in';

}
