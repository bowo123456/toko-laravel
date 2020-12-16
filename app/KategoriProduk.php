<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriProduk extends Model
{
    //
    protected $table ='kategori_produk';
    protected $primaryKey ='id_kategori';
    protected $fillable = ['nama_kategori'];
}
