<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\kondisi_barang;
use Illuminate\Http\Request;
use Validator;

class KondisiBarangController extends Controller
{
   
    public function index()
    {
        {
            $kondisi_barangs = kondisi_barang::all();
            return view('kondisi_barang.index', compact('kondisi_barangs'));
        }
    }

    public function create()
    {
        return view('kondisi_barang.create');
    }

    public function store(Request $request)
    {
         // validasi
         $validated = $request->validate([
            'kondisi_barang' => 'required|unique:kondisi_barangs',
        ]);
        $kondisi_barangs = new kondisi_barang();
        $kondisi_barangs->kondisi_barang = $request->kondisi_barang;
        $kondisi_barangs->save();
        Alert::success('Done', 'Data berhasil dibuat')->autoClose(2000);
        return redirect()->route('kondisi_barang.index');   
    }

    public function show($id)
    {
        $kondisi_barangs = kondisi_barang::findOrFail($id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kondisi_barang' => 'required|',
        ]);
        $kondisi_barangs = kondisi_barang::findOrFail($id);
        $kondisi_barangs->kondisi_barang = $request->kondisi_barang;
        $kondisi_barangs->save();
        Alert::success('Done', 'Data berhasil diedit');
        return redirect()->route('kondisi_barang.index');   
    }

    public function destroy($id)
    {
        if(kondisi_barang::destroy( $id)) {
            return redirect()->back();
        }
        return redirect()->route('kondisi_barang.index');
        $kondisi_barangs = kondisi_barang::findOrFail($id);
        $kondisi_barangs->delete();
        Alert::success('Done', 'Data berhasil dIhapus');
        return redirect()->route('kondisi_barang.index');

    }
}
