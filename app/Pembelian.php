<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = "pembelians";
    protected $guarded = [];
    public $timestamps = false;
    
    public function pemasok(){
        return $this->belongsTo('App\Pemasok', 'id_pemasok');
    }

    // public function beli_barang(){
    //     return $this->hasMany('App\Barang','id');
    // }
}
