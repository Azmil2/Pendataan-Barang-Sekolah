<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daftar_barang extends Model
{
    use HasFactory;
    public $fillable = ['nama', 'foto', 'deskripsi',
        'merek', 'jumlah', 'tanggal', 'id_daftar_ruangan', 'id_kondisi_barang', 'id_jenis_barang'];
    public $timestamps = true;

    public function kondisi_barang()
    {
        // data model Movie dimiliki oleh Model kondisi_barang
        // melalui fk id_kondisi_barang    
        return $this->belongsTo(kondisi_barang::class, 'id_kondisi_barang');
    }

    public function daftar_ruangan()
    {
        // model Movie bisa memiliki banyak data (n to n)
        // dari model id_daftar_ruangan melalui table pivot(bantuan)
        // yang bernama 'movie_id_daftar_ruangan' dengan masing-masing
        // fk id movie dan id_id_daftar_ruangan 
        return $this->belongsToMany(daftar_ruangan::class,
            'id_daftar_ruangan');
    }

    public function jenis_barang()
    
    {
        // data model Movie dimiliki oleh Model jenis_barang
        // melalui fk id_jenis_barang
        return $this->belongsTo(jenis_barang::class, 'id_jenis_barang');
    }

    public function image()
    {
        if ($this->foto && file_exists(public_path('images/'
            . $this->foto))) {
            return asset('images/' . $this->foto);
        } else {
            return asset('images/no_image.jpg');
        }
    }
    // mengahupus image(foto) di storage(penyimpanan) public
    public function deleteImage()
    {
        if ($this->foto && file_exists(public_path('images/'
            . $this->foto))) {
            return unlink(public_path('images/' . $this->foto));
        }
    }

   
}
