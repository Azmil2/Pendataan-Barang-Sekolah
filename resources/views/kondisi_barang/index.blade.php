@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Kondisi Barang 
                        <button type="button" class="btn btn-sm btn-outline-primary" style="float:right" data-toggle="modal"
                            data-target="#addkondisi_barang">
                            Tambah Data    
                        </button>
                        @include('kondisi_barang.create')
                        {{-- <a href="{{ route('data_ruangan.create') }}" class="btn btn-sm-btn-primary" style="float-right"> 
                        Tambah Data
                    </a> --}}
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>No</th>
                                    <th>Jenis Barang</th>                                
                                    <th>Jumlahh Kondisi Barang</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @php $no =1; @endphp
                                    @foreach ($kondisi_barangs as $kondisi_barang)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $kondisi_barang->kondisi_barang }}</td>
                                            <td>{{ $kondisi_barang->daftar_barang->count() }}</td>
                                            <td></td>
                                            <td>
                                                <form action="{{ route('kondisi_barang.destroy', $kondisi_barang->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="btn btn-sm btn-outline-warning"
                                                        data-toggle="modal"
                                                        data-target="#editkondisi_barang-{{ $kondisi_barang->id }}">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-outline-info"
                                                        data-toggle="modal"
                                                        data-target="#showkondisi_barang-{{ $kondisi_barang->id }}">
                                                        Show
                                                    </button>
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('apakah anda yakin?')"> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        @include('kondisi_barang.edit')
                                        @include('kondisi_barang.show')
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