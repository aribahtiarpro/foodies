<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama',100);
            $table->string('detail');
            $table->string('slug')->nullable();
            $table->string('img')->nullable();
            $table->integer('harga');
            $table->integer('stok');
             // Foreign Keys
            $table->unsignedBigInteger('kat_id');
            $table->foreign('kat_id')
                    ->references('id')->on('kategoris')
                    ->onDelete('cascade');
              // Foreign Keys
            $table->unsignedBigInteger('warung_id');
            $table->foreign('warung_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('produks');
    }
}
