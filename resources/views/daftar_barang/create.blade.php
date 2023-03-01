@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Tambah Data
                    </div>
                    <div class="card-body">
                        <form action="{{ route('daftar_barang.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror" id="">
                                    {{-- value="{{ old('nama', $daftar_barang->nama) }}"> --}}
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>  
                            <div class="form-group">
                                <label for="">Foto</label>
                                <input type="file" name="foto"
                                    class="form-control @error('foto') is-invalid @enderror" id="">
                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id=""></textarea>
                                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Merek</label>
                                <input type="text" name="merek"
                                    class="form-control @error('merek') is-invalid @enderror" id="">
                                @error('merek')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>  
                            <div class="form-group">
                                <label for="">Kondisi</label>
                                <input type="text" name="kondisi"
                                    class="form-control @error('kondisi') is-invalid @enderror" id="">
                                @error('kondisi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>  
                            

                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" min="0" name="harga"
                                    class="form-control @error('harga') is-invalid @enderror" id="">
                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah</label>
                                <input type="number" min="0" name="jumlah"
                                    class="form-control @error('jumlah') is-invalid @enderror" id="">
                                @error('jumlah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                                 <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" name="tanggal"
                                    class="form-control @error('tanggal') is-invalid @enderror" id="">
                                @error('tanggal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="">Daftar Ruangan</label>
                                <select name="id_jenis_barang" class="form-control @error('id_jenis_barang') is-invalid @enderror"
                                    id="">
                                    <option value="">Pilih</option>
                                    @foreach ($daftar_ruangans as $data)
                                        <option value="{{ $data->id }}">{{ $data->ruangan }}</option>
                                    @endforeach
                                </select>
                                @error('id_jenis_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                            </div> --}}
                           
                            <div class="form-group">
                                <label for="">Jenis Barang</label>
                                <select name="id_jenis_barang" class="form-control @error('id_jenis_barang') is-invalid @enderror"
                                    id="">
                                    <option value="">Pilih</option>
                                    @foreach ($jenis_barangs as $data)
                                        <option value="{{ $data->id }}">{{ $data->jenis_barang }}</option>
                                    @endforeach
                                </select>
                                @error('id_jenis_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-outline-primary">
                                    Tambah
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection