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
        Schema::create('penggunas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_inventaris_ruangan');
            $table->date('tanggal_penggunaan');
            $table->integer('jumlah_digunakan');
            $table->timestamps();
            $table->foreign('id_inventaris_ruangan')->references('id')->on('inventaris_ruangans')->onDelete('cascade');
        });

        Schema::table('penggunas', function (Blueprint $table) {
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penggunas', function (Blueprint $table) {
            $table->dropForeign(['id_inventaris_ruangan']);
        });
        Schema::dropIfExists('penggunas');
    }
};