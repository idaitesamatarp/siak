<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = "barangs";
    protected $guarded = [];
    public $timestamps = false;

    public function penjualan(){
        return $this->hasMany('App\Penjualan', 'id_barang', 'id');
    }
}
