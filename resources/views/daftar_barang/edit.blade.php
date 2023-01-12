@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Edit Data
                    </div>
                    <div class="card-body">
                        <form action="{{ route('daftar_barang.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror" id="">
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
                            <div class="form-group">
                                <label for="">Daftar Ruangan</label>
                                <select name="id_daftar_ruangan" class="form-control @error('id_daftar_ruangan') is-invalid @enderror"
                                    id="">
                                    <option value="">Pilih</option>
                                    @foreach ($daftar_ruangan as $data)
                                        <option value="{{ $data->id }}">{{ $data->kategori }}</option>
                                    @endforeach
                                </select>
                                @error('id_daftar_ruangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                            </div>
                            <div class="form-group">
                                <label for="">Kondisi Barang</label>
                                <select name="id_kondisi_barang" c2wlass="form-control @error('id_daftar_ruangan') is-invalid @enderror"
                                    id="">
                                    <option value="">Pilih</option>
                                    @foreach ($kondisi_barang as $data)
                                        <option value="{{ $data->id }}">{{ $data->kategori }}</option>
                                    @endforeach
                                </select>
                                @error('id_kondisi_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Barang</label>
                                <select name="id_jenis_barang" c2wlass="form-control @error('id_daftar_ruangan') is-invalid @enderror"
                                    id="">
                                    <option value="">Pilih</option>
                                    @foreach ($jenis_barang as $data)
                                        <option value="{{ $data->id }}">{{ $data->kategori }}</option>
                                    @endforeach
                                </select>
                                @error('id_jenis_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection