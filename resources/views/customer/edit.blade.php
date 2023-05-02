@extends('customer.template')
@section('konten')
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="card-title">Edit Data Customer</h3>
                        </div>
                        <div class="col-auto">
                            {{-- <button class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i><b>Tambah Data Customer</b></button> --}}
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('customer.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="jd">Nama Lengkap</label>
                                                <input type="text" name="nama" value="{{ $edit['nama']}}" class="form-control {{ $errors->first('judul') ? "is-invalid":""}}" id="jd">
     
                                                @error('judul')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                                @enderror
     
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jd">Alamat Email</label>
                                                <input type="text" value="{{ $edit['email']}}" name="email" class="form-control {{ $errors->first('email') ? "is-invalid":""}}" id="jd" >
    
                                                @error('email')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                                @enderror
     
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jd">Nomor Handphone</label>
                                                <input type="text" value="{{ $edit['hp']}}" name="hp" class="form-control {{ $errors->first('hp') ? "is-invalid":""}}" id="jd" >
    
                                                @error('hp')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                                @enderror
     
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Alamat Lengkap</label>
                                        <textarea class="form-control {{ $errors->first('alamat') ? "is-invalid":""}}" name="alamat" rows="5">{{ $edit['alamat']}}</textarea>
                                        @error('alamat')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jd">Asal Kota</label>
                                                <input type="text" value="{{ $edit['kota']}}" name="kota" class="form-control {{ $errors->first('kota') ? "is-invalid":""}}" id="jd" >
    
                                                @error('kota')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                                @enderror
     
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jd">Nama Perusahaan</label>
                                                <input type="text" value="{{ $edit['perusahaan']}}" name="perusahaan" class="form-control {{ $errors->first('perusahaan') ? "is-invalid":""}}" id="jd" >
    
                                                @error('perusahaan')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                                @enderror
     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <center>
                            <button type="submit" class="btn btn-primary">Update</button>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection