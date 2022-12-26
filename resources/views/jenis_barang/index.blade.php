@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Jenis Barang 
                        <button type="button" class="btn btn-sm btn-outline-primary" style="float:right" data-toggle="modal"
                            data-target="#addjenis_barang">
                            Tambah Data    
                        </button>
                        @include('jenis_barang.create')
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
                                    <th>Jumlahh Jenis Barang</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @php $no =1; @endphp
                                    @foreach ($jenis_barangs as $jenis_barang)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $jenis_barang->jenis_barang }}</td>
                                            {{-- <td>{{ $jenis_barang->->count() }}</td> --}}
                                            <td></td>
                                            <td>
                                                <form action="{{ route('jenis_barang.destroy', $jenis_barang->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="btn btn-sm btn-outline-warning"
                                                        data-toggle="modal"
                                                        data-target="#editjenis_barang-{{ $jenis_barang->id }}">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-outline-info"
                                                        data-toggle="modal"
                                                        data-target="#showjenis_barang-{{ $jenis_barang->id }}">
                                                        Show
                                                    </button>
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('apakah anda yakin?')"> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        @include('jenis_barang.edit')
                                        @include('jenis_barang.show')
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