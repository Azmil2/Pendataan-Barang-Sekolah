<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daftar_barang extends Model
{
    public $table = "daftar_barangs";
    use HasFactory; 
    public $fillable = ['nama', 'foto', 'deskripsi',
        'merek', 'konisi', 'harga', 'jumlah', 'tanggal'];
    public $timestamps = true;

    public function kondisi_barang()
    {
       
        return $this->belongsTo(kondisi_barang::class, 'id_kondisi_barang');
    }

    public function daftar_ruangan()
    {
       
        return $this->belongsTo(daftar_ruangan::class,
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
        if ($this->foto && file_exists(public_path('images/daftar_barang/'
            . $this->foto))) {
            return asset('images/daftar_barang/' . $this->foto);
        } else {
            return asset('images/no_image.jpg');
        }
    }
    // mengahupus image(foto) di storage(penyimpanan) public
    public function deleteImage()
    {
        if ($this->foto && file_exists(public_path('images/daftar_barang'
            . $this->foto))) {
            return unlink(public_path('images/daftar_barang' . $this->foto));
        }
    }

   
}
