<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\daftar_ruangan;
use Illuminate\Http\Request;
use Validator;

class DaftarRuanganController extends Controller
{
    public function index()
    {
        {
            $daftar_ruangans = daftar_ruangan::all();
            return view('daftar_ruangan.index', compact('daftar_ruangans'));
        }
    }

    public function create()
    {
        return view('daftar_ruangan.create');
    }

    public function store(Request $request)
    {
         // validasi
         $validated = $request->validate([
            'ruangan' => 'required|unique:daftar_ruangans',
        ]);
        $daftar_ruangans = new daftar_ruangan();
        $daftar_ruangans->ruangan = $request->ruangan;
        $daftar_ruangans->save();
        Alert::success('Done', 'Data berhasil dibuat')->autoClose(2000);
        return redirect()->route('daftar_ruangan.index');   
    }

    public function show($id)
    {
        $daftar_ruangans = ruangan::findOrFail($id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'ruangan' => 'required|',
        ]);
        $daftar_ruangans = daftar_ruangan::findOrFail($id);
        $daftar_ruangans->ruangan = $request->ruangan;
        $daftar_ruangans->save();
        Alert::success('Done', 'Data berhasil diedit');
        return redirect()->route('daftar_ruangan.index');   
    }

    public function destroy($id)
    {
        if(daftar_ruangan::destroy( $id)) {
            return redirect()->back();
        }
        return redirect()->route('daftar_ruangan.index');
        $daftar_ruangans = ruangan::findOrFail($id);
        $daftar_ruangans->delete();
        
        Alert::success('Done', 'Data berhasil dIhapus');
        return redirect()->route('daftar_ruangan.index');

    }
}
