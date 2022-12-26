<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alert;

class kondisi_barang extends Model
{
    use HasFactory;
    use HasFactory;
    public $fillable = ['kondisi_barang'];
    public $timestamps = true;

    public function daftar_barang()
    {
        return $this->hasMany(Daftar_barang::class, 'id_kondisi_barang');
    }
    public static function boot()
    {
        parent::boot();

        self::deleting(function($kondisi_barang){
            if ($kondisi_barang->daftar_barang->count() > 0) {
                Alert::error('Gagal Menghapus', 'Kondisi Barang : ' .$kondisi_barang->tahun);
                return false;
            }
            Alert::success('Done', 'Data berhasil dihapus')->autoClose(2000);         
        });
    }  
}
