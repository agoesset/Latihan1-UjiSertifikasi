@extends('customer.template')
@section('konten')
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="card-title">Data Customer</h3>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('customer.create') }}">
                                <button class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i><b>Tambah Data Customer</b></button></a>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th scope="col" >#</th>
                                <th scope="col" >Nama</th>
                                <th scope="col" >Telepon</th>
                                <th scope="col" >Kota</th>
                                <th scope="col" >Perusahaan</th>
                                <th scope="col" >Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($index as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->hp}}</td>
                                <td>{{$item->kota}}</td>
                                <td>{{$item->perusahaan}}</td>
                                <td>
                                    <a href="{{ route('customer.edit', $item->id) }}" style="text-decoration: none; color: white">
                                        <button type="button" class="btn btn-icon btn-round btn-secondary">
                                            <i class="fas fa-edit"></i>
                                    </a>
                                    </button> &nbsp;
                                    <a href="{{ route('customer.delete', $item->id) }}">
                                        <button onclick="return confirm('Yakin data ingin dihapus?')" type="button" class="btn btn-icon btn-round btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </a>
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

@endsection