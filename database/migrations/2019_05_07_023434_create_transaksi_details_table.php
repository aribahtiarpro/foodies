<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_details', function (Blueprint $table) {
            $table->bigIncrements('id');
               // Foreign Keys
            $table->unsignedBigInteger('transaksi_id');
            $table->foreign('transaksi_id')
                    ->references('id')->on('transaksis')
                    ->onDelete('cascade');
               // Foreign Keys
            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id')
                    ->references('id')->on('produks')
                    ->onDelete('cascade');
            $table->string('catatan')->nullable();
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
        Schema::dropIfExists('transaksi_details');
    }
}
