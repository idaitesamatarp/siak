<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('barang', 10);
            $table->unsignedBigInteger('id_pemasok');
            $table->foreign('id_pemasok')->references('id')->on('pemasoks');
            $table->string('harga', 12);
            $table->string('jumlah', 5);
            $table->string('satuan', 12);
            $table->string('total', 12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelians');
        $table->dropForeign('id_pemasok');
    }
}
