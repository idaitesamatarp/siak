<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = "penjualans";
    protected $guarded = [];
    public $timestamps = false;
    
    public function barang()
    {
        return $this->belongsTo('App\Barang', 'id_barang');
    }

    public function pelanggan(){
        return $this->belongsTo('App\Pelanggan', 'id_pelanggan');
    }

    public function total()
    {
        
    }
}
