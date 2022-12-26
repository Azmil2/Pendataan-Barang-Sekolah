<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->text('deskripsi');
            $table->string('merek');
            $table->integer('jumlah');
            $table->date('tanggal');

            $table->unsignedBigInteger('id_daftar_ruangan');
            $table->unsignedBigInteger('id_kondisi_barang');
            $table->unsignedBigInteger('id_jenis_barang');

            $table->foreign('id_jenis_barang')->references('id')->on('jenis_barangs');
            $table->foreign('id_daftar_ruangan')->references('id')->on('daftar_ruangans');
            $table->foreign('id_kondisi_barang')->references('id')->on('kondisi_barangs');

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
};