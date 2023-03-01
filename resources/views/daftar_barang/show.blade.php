@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Show Data
                    <a href="{{ route('daftar_barang.index') }}" class="btn btn-sm btn-outline-primary" style="float: right">
                        Kembali
                    </a>
                </div>
                  
                    <div class="card-body">
                       
                            @csrf
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" value="{{ $daftar_barang->nama }}"
                                    class="form-control" readonly>
                            </div>  
                            <div class="form-group">
                                <label for="">Foto</label>
                                <p>
                                     <img src="{{ asset('/images/daftar_barang/' . $daftar_barang->foto) }}" 
                                    class="img-rounded img-responsive" style="width: 175px; height:175px;" alt="">
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea name="" id="sinopsis" cols="30" rows="10"  class="form-control" readonly>{{ $daftar_barang->deskripsi }}</textarea>
                               
                            </div>
                            <div class="form-group">
                                <label for="">Merek</label>
                                <input type="text" name="merek" value="{{ $daftar_barang->merek }}"
                                    class="form-control" readonly>

                            </div>  
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" min="0" name="harga" value="{{ $daftar_barang->harga }}"
                                    class="form-control" readonly>
                               
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" name="tanggal" value="{{ $daftar_barang->tanggal }}"
                                    class="form-control" readonly>
                               
                            </div>
                            <div class="form-group">
                                <label for="">jumlah</label>
                                {{-- @if($daftar_barang->daftar_ruangans) --}}
                                    <input type="text" name="jumlah" value="{{ $daftar_barang->jumlah }}"
                                    class="form-control" readonly>
                                {{-- @else
                                    <input type="text" name="jumlah" value="" class="form-control" readonly>
                                @endif --}}
                            </div>
                            <div class="form-group">
                                <label for="">Kondisi Barang</label>
                                {{-- @if($daftar_barang->kondisi_barangs) --}}
                                    <input type="text" name="kondisi_barang" value="{{ $daftar_barang->kondisi }}"
                                    class="form-control" readonly>
                                {{-- @else --}}
                                    {{-- <input type="text" name="kondisi_barang" value="" class="form-control" readonly>
                                @endif --}}
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Barang</label>
                                {{-- @if(isset($jenis_barang) && $jenis_barang->jenis_barangs) --}}
                                    <input type="text" name="jenis_barang" value="{{ $daftar_barang->jenis_barang->jenis_barang }}"
                                    class="form-control" readonly>
                                {{-- @else --}}
                                    {{-- <input type="text" name="jenis_barang" value="" class="form-control" readonly> --}}
                                {{-- @endif --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection