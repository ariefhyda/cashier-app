<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $primaryKey = 'id';
    public $incrementing = false; // Since 'id' is a string
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'nama_barang',
        'harga_beli',
        'harga_jual',
        'stok',
        'satuan_id',
        'created_by',
        'updated_by'
    ];

}
