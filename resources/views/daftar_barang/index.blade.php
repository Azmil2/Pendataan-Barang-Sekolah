@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Daftar Barang
                        <a href="{{ route('daftar_barang.create') }}" class="btn btn-sm btn-outline-primary" style="float:right">
                            Tambah Data
                        </a>    

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>No</th>
           
                                        <th>Nama</th>
                                        <th>Foto</th>
                                        {{-- <th>Deskripsi</th>
                                        <th>Merek</th>  --}}
                                        <th>kondisi</th> 
                                        {{-- <th>harga</th>
                                        <th>jumlah</th> --}}
                                        <th>tanggal</th>
                                        <th>Jenis Barang</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        @php $no =1; @endphp
                                        @foreach ($daftar_barangs as $daftar_barang)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $daftar_barang->nama }}</td>
                                                {{-- <td>{{ $daftar_barang->foto }}</td> --}}
                                                <td><img src="{{ $daftar_barang->image() }}" style="height:50px; width: 45px" alt=""></td>
                                                {{-- <td>{{ $daftar_barang->deskripsi }}</td> 
                                                <td>{{ $daftar_barang->merek }}</td>  --}}
                                                <td>{{ $daftar_barang->kondisi }}</td> 
                                                {{-- <td>{{ $daftar_barang->harga }}</td>
                                                <td>{{ $daftar_barang->jumlah }}</td> --}}
                                               
                                                <td>{{ $daftar_barang->tanggal }}</td>
                                               
                                                <td>{{ $daftar_barang->jenis_barang->jenis_barang }}</td>
                                                <td>
                                                    <form action="{{ route('daftar_barang.destroy', $daftar_barang->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="{{ route('daftar_barang.edit', $daftar_barang->id) }}"
                                                            class="btn btn-sm btn-outline-warning">
                                                            Edit
                                                        </a>
                                                        <a href="{{ route('daftar_barang.show', $daftar_barang->id) }}"
                                                            class="btn btn-sm btn-outline-info">
                                                            Show
                                                        </a>
                                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                                            onclick="return confirm('apakah anda yakin?')"> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection