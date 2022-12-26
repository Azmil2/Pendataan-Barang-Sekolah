@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Daftar Ruangan 
                        <button type="button" class="btn btn-sm btn-outline-primary" style="float:right" data-toggle="modal"
                            data-target="#addRuangan">
                            Tambah Data    
                        </button>
                        @include('daftar_ruangan.create')
                        {{-- <a href="{{ route('data_ruangan.create') }}" class="btn btn-sm-btn-primary" style="float-right"> 
                        Tambah Data
                    </a> --}}
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>No</th>
                                    <th>Nama Ruangan</th>                                
                                    <th>Jumlahh Ruangan</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @php $no =1; @endphp
                                    @foreach ($daftar_ruangans as $daftar_ruangan)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $daftar_ruangan->ruangan }}</td>
                                            {{-- <td>{{ $daftar_ruangan->->count() }}</td> --}}
                                            <td></td>
                                            <td>
                                                <form action="{{ route('daftar_ruangan.destroy', $daftar_ruangan->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="btn btn-sm btn-outline-warning"
                                                        data-toggle="modal"
                                                        data-target="#editdaftar_ruangan-{{ $daftar_ruangan->id }}">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-outline-info"
                                                        data-toggle="modal"
                                                        data-target="#showdaftar_ruangan-{{ $daftar_ruangan->id }}">
                                                        Show
                                                    </button>
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('apakah anda yakin?')"> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        @include('daftar_ruangan.edit')
                                        @include('daftar_ruangan.show')
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