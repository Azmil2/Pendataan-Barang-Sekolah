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
                        <form action="{{ route('daftar_barang.update',$daftar_barang->id) }}) }}" method="post" enctype="multipart/form-data">
                            @method('put')
                             @csrf
                            <div class="form-group">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror" >
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>  
                            <div class="form-group">
                                <label for="">Foto</label>
                                @if (isset($daftar_barang) && $daftar_barang->foto)
                                <p>
                                    <img src="{{ asset('images/daftar_barang/' . $daftar_barang->foto) }}"
                                        class="img-rounded img-responsive" style="width: 75px; height:75px;"
                                        alt="">
                                </p>
                            @endif
                            <input type="file" name="foto" value="{{ $daftar_barang->foto }}"
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
                                <label for="">Ruangan</label>
                                <input type="text" name="ruangan"
                                    class="form-control @error('ruangan') is-invalid @enderror" id="">
                                @error('ruangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            {{-- <div class="form-group">
                                <label for="">Daftar Ruangan</label>
                                <select name="id_daftar_ruangan" class="form-control @error('id_daftar_ruangan') is-invalid @enderror"
                                    id="">
                                    <option value="">Pilih</option>
                                    @if ($daftar_ruangans->count())
                                      @foreach ($daftar_ruangans as $data)
                                      <option value="{{ $data->id }}"
                                        {{ $data->id == old('id_daftar_ruangan', $daftar_barang->id_daftar_ruangan) ? 'selected' : '' }}>
                                        {{ $data->ruangan }}
                                      </option>                                    
                                      @endforeach
                                    @endif
                                </select>
                                @error('id_daftar_ruangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                            </div> --}}
                            
                            {{-- <div class="form-group">
                                <label for="">Kondisi</label>
                                <select name="id_kondisi_barang" class="form-control @error('id_daftar_ruangan') is-invalid @enderror"
                                    id="">
                                    <option value="">Pilih</option>
                                    @if ($kondisi_barang->count())
                                    @foreach ($kondisi_barang as $data)
                                      <option value="{{ $data->id }}"
                                        {{ $data->id == old('id_kondisi_barang', $daftar_barang->id_kondisi_barang) ? 'selected' : '' }}>
                                        {{ $data->kondisi_barang }}
                                      </option>                                    
                                      @endforeach
                                    @endif
                                </select>
                                @error('id_daftar_ruangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                            </div> --}}

                            <div class="form-group">
                                <label for="">Jumlah</label>
                                <input type="number" name="jumlah"
                                    class="form-control @error('jumlah') is-invalid @enderror" id="">
                                @error('jumlah')
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
                                <label for="">Jenis Barang</label>
                                <select name="id_jenis_barang" class="form-control @error('id_daftar_ruangan') is-invalid @enderror"
                                    id="">
                                    <option value="">Pilih</option>
                                    @if ($jenis_barang->count())
                                    @foreach ($jenis_barang as $data)
                                      <option value="{{ $data->id }}"
                                        {{ $data->id == old('id_jenis_barang', $daftar_barang->id_jenis_barang) ? 'selected' : '' }}>
                                        {{ $data->jenis_barang }}
                                      </option>                                    
                                      @endforeach
                                    @endif
                                </select>
                                @error('id_daftar_ruangan')
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