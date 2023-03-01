<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('foto');
            $table->string('deskripsi');
            $table->string('merek');
            $table->string('kondisi');
            $table->integer('harga');
            $table->integer('jumlah');
            $table->date('tanggal');

            $table->unsignedBigInteger('id_jenis_barang');
            $table->foreign('id_jenis_barang')->references('id')->on('jenis_barangs');
            
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
        Schema::dropIfExists('daftar_barangs');
    }
}