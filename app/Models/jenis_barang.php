<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alert;

class jenis_barang extends Model
{
    use HasFactory;
    use HasFactory;
    public $fillable = ['jenis_barang'];
    public $timestamps = true;

    public function daftar_barang()
    {
        return $this->hasMany(Daftar_barang::class, 'id_jenis_barang');
    }
    public static function boot()
    {
        parent::boot();

        self::deleting(function($jenis_barang){
            if ($jenis_barang->daftar_barang->count() > 0) {
                Alert::error('Gagal Menghapus', 'Jenis Barang : ' .$jenis_barang->tahun);
                return false;
            }
            Alert::success('Done', 'Data berhasil dihapus')->autoClose(2000);         
        });
    }  
}
