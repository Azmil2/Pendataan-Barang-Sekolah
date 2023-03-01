<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\daftar_ruangan;
use App\Models\jenis_barang;
use App\Models\daftar_barang;
use Illuminate\Http\Request;
use Validator;

class DaftarBarangController extends Controller
{
    public function index()
    {
        $daftar_barangs = daftar_barang::orderBy('id', 'desc')->get();
        return view('daftar_barang.index', compact('daftar_barangs'));
    }

    public function create()
    {
        $daftar_ruangans = daftar_ruangan::all();
        $jenis_barangs = jenis_barang::all();
        // $kondisi_barangs = kondisi_barang::all();
        return view('daftar_barang.create', compact('daftar_ruangans', 'jenis_barangs'));
        // return view('daftar_barang.create', compact('daftar_ruangan', 'jenis_barang', 'kondisi_barang'));
    }

    public function store(Request $request)
    {
        // $rules = [
        //     'nama' => 'required|unique:daftar_barangs',
        //     'foto' => 'required|image|max:1024',
        //     'deskripsi' => 'required',
        //     'harga' =>  'required',
        //     'merek' =>  'required',
        //     'tanggal' =>  'required',
        //     'daftar_ruangan' => 'required',
        //     'jenis_barang' => 'required',
        //     'kondisi_barang' => 'required',
        // ];

        // $messages = [
        //     'nama.required' => 'nama harus di isi!',
        //     'nama.unique' => 'Judul tidak boleh sama!',
        //     'foto.required' => 'foto harus di isi!',
        //     'foto.image' => 'foto harus berjenis jpg & png!',
        //     'foto.max' => 'foto harus dibawah kapasitas 1024kb!',
        //     'deskripsi.required' => 'deskripsi harus di isi!',
        //     'merek' =>  'merek harus di isi!',
        //     'tanggal' =>  'tanggal harus di isi!',
        //     // 'harga.required' => 'harga harus di isi!',
        //     'daftar_ruangan.required' => 'Daftar Barang harus di isi!',
        //     'jenis_barang.required' => 'Jenis Barang harus di isi!',
        //     'kondisi_barang.required' => 'Kondisi Barang harus di isi!',
        // ];

        // $validation = Validator::make($request->all(), $rules, $messages);
        // if ($validation->fails()) {
        //     Alert::error('data yang anda input ada kesalahan', 'Oops!')->persistent("Ok");
        //     return back()->withErrors($validation)->withInput();
        // }

        $daftar_barang = new daftar_barang();

        $daftar_barang->nama = $request->nama;
        $daftar_barang->foto = $request->foto;
        $daftar_barang->deskripsi = $request->deskripsi;
        $daftar_barang->merek = $request->merek;
        $daftar_barang->kondisi = $request->kondisi;
        $daftar_barang->harga = $request->harga;  
        $daftar_barang->jumlah = $request->jumlah;  
        $daftar_barang->tanggal = $request->tanggal;
        $daftar_barang->id_jenis_barang = $request->id_jenis_barang;
       
      
        // $daftar_barang->id_daftar_ruangan = $request->id_daftar_ruangan;
        

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $name = rand(1000, 9999) . $foto->getClientOriginalName();
            $foto->move('images/daftar_barang/', $name);
            $daftar_barang->foto = $name;
        }
        // if ($request->hasFile('foto')) {
        //     $foto = $request->file('foto');
        //     $name = rand(1000, 9999) . $foto->getClientOriginalName();
        //     $foto->move('images/daftar_barang/', $name);
        //     $daftar_barang->foto = $name;
        // }
        // dd($daftar_barang);
        $daftar_barang->save();
        // $daftar_barang->daftar_barang()->attach($request->daftar_barang);
        Alert::success('Done', 'Data berhasil dibuat')->autoClose(2000);
        return redirect()->route('daftar_barang.index');
    }

    public function show($id)
    {
        $daftar_barang = daftar_barang::findOrFail($id);
        return view('daftar_barang.show', compact('daftar_barang'));
    }

    public function edit($id)
    {
        $daftar_ruangans = daftar_ruangan::findOrFail($id);
        $jenis_barang = jenis_barang::all();
        // $kondisi_barang = kondisi_barang::all();
        $daftar_barang = daftar_barang::findOrFail($id);
        return view('daftar_barang.edit', compact('daftar_barang', 'daftar_ruangans', 'jenis_barang'));
    }


    // public function edit($id)
    // {
    //     $daftar_ruangans = daftar_ruangan::all();
    //     $jenis_barangs = jenis_barang::all();
    //     $kondisi_barangs = kondisi_barang::all();
    //     $daftar_barangs = daftar_barang::all();
    //     return view('daftar_barang.edit', compact('daftar_ruangan', 'jenis_barang', 'kondisi_barang', 'daftar_barang '));
    // }

    public function update(Request $request, $id)
    {
        $rules = [
            'nama' => 'required|unique:daftar_barang',
            'foto' => 'required|image|max:1024',
            'deskripsi' => 'required',
            'harga' =>  'required',
            'merek' =>  'required',
            'jumlah' =>  'required',
            'tanggal' =>  'required',
            'daftar_ruangan' => 'required',
            'jenis_barang' => 'required',
            'kondisi_barang' => 'required',
        ];



        $messages = [
            'nama.required' => 'nama harus di isi!',
            'nama.unique' => 'Judul tidak boleh sama!',
            'foto.required' => 'foto harus di isi!',
            'foto.image' => 'foto harus berjenis jpg & png!',
            'foto.max' => 'foto harus dibawah kapasitas 1024kb!',
            'deskripsi.required' => 'deskripsi harus di isi!',
            'harga.required' => 'harga harus di isi!',
            'merek' =>  'merek harus di isi!',
            'tanggal' =>  'tanggal harus di isi!',
            'daftar_ruangan.required' => 'Daftar Barang harus di isi!',
            'jenis_barang.required' => 'Jenis Barang harus di isi!',
            'kondisi_barang.required' => 'Kondisi Barang harus di isi!',
        ];

        $daftar_barang = daftar_barang::findOrFail($id);

        $daftar_barang->nama = $request->nama;
        $daftar_barang->foto = $request->foto;
        $daftar_barang->deskripsi = $request->deskripsi;
        $daftar_barang->merek = $request->merek;
        $daftar_barang->kondisi = $request->kondisi;
        $daftar_barang->harga = $request->harga;  
        $daftar_barang->jumlah = $request->jumlah;  
        $daftar_barang->tanggal = $request->tanggal;
        $daftar_barang->id_jenis_barang = $request->id_jenis_barang;
       
      
        // $daftar_barang->id_daftar_ruangan = $request->id_daftar_ruangan;
        

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $name = rand(1000, 9999) . $foto->getClientOriginalName();
            $foto->move('images/daftar_barang/', $name);
            $daftar_barang->foto = $name;
        }
        // if ($request->hasFile('foto')) {
        //     $foto = $request->file('foto');
        //     $name = rand(1000, 9999) . $foto->getClientOriginalName();
        //     $foto->move('images/daftar_barang/', $name);
        //     $daftar_barang->foto = $name;
        // }
        // dd($daftar_barang);
        $daftar_barang->save();
        Alert::success('Done', 'Data berhasil diedit')->autoClose(2000);
        return redirect()->route('daftar_barang.index');
    }

    public function destroy($id)
    {
        $daftar_barangs = daftar_barang::findOrFail($id);
        $daftar_barangs->deleteImage();
        $daftar_barangs->delete();   

        Alert::success('Done', 'Data berhasil dihapus')->autoClose(2000);
        return redirect()->route('daftar_barang.index');
    }
}
