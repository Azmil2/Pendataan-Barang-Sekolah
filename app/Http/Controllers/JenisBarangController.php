<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\jenis_barang;
use Illuminate\Http\Request;
use Validator;


class JenisBarangController extends Controller
{
    public function index()
    {
        {
            $jenis_barangs = jenis_barang::all();
            return view('jenis_barang.index', compact('jenis_barangs'));
        }
    }

    public function create()
    {
        return view('jenis_barang.create');
    }

    public function store(Request $request)
    {
         // validasi
         $validated = $request->validate([
            'jenis_barang' => 'required|unique:jenis_barangs',
        ]);
        $jenis_barangs = new jenis_barang();
        $jenis_barangs->jenis_barang = $request->jenis_barang;
        $jenis_barangs->save();
        Alert::success('Done', 'Data berhasil dibuat')->autoClose(2000);
        return redirect()->route('jenis_barang.index');   
    }

    public function show($id)
    {
        $jenis_barangs = jenis_barang::findOrFail($id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'jenis_barang' => 'required|',
        ]);
        $jenis_barangs = jenis_barang::findOrFail($id);
        $jenis_barangs->jenis_barang = $request->jenis_barang;
        $jenis_barangs->save();
        Alert::success('Done', 'Data berhasil diedit');
        return redirect()->route('jenis_barang.index');   
    }

    public function destroy($id)
    {
        if(jenis_barang::destroy( $id)) {
            return redirect()->back();
        }
        return redirect()->route('jenis_barang.index');
        $jenis_barangs = jenis_barang::findOrFail($id);
        $jenis_barangs->delete();
        Alert::success('Done', 'Data berhasil dIhapus');
        return redirect()->route('jenis_barang.index');

    }
}

