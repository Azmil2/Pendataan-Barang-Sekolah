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
        Schema::create('inventaris_ruangans', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah');
            $table->date('tanggal_masuk');

            $table->unsignedBigInteger('id_daftar_ruangan');
            $table->foreign('id_daftar_ruangan')->references('id')->on('daftar_ruangans')->onDelete('cascade');

            $table->unsignedBigInteger('id_daftar_barang');
            $table->foreign('id_daftar_barang')->references('id')->on('daftar_barangs')->onDelete('cascade');
            
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
        Schema::dropIfExists('inventaris_ruangans');
    }
};
