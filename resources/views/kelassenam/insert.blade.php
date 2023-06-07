@extends('layouts.app')
@section('title', 'Tambah Kelas Senam')

@section('content')
<div class="content-wrapper">
    @if(Session::has('alert'))
      @if(Session::get('sweetalert')=='success')
        <div class="swalDefaultSuccess">
        </div>
      @elseif(Session::get('sweetalert')=='error')
        <div class="swalDefaultError">
        </div>
        @elseif(Session::get('sweetalert')=='warning')
        <div class="swalDefaultWarning">
        </div>
      @endif
    @endif
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Kelas Senam</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item">Kelas Senam</li>
                        <li class="breadcrumb-item active">Tambah Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Kelas Senam</h3>
                        <div class="card-tools">
                            @if (Auth::user()->role_id == 2)
                                <a href="{{ route('a.kelassenam') }}" class="btn btn-warning btn-sm">Kembali</a>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('a.kelassenam.store')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kode">Nama Kelas</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Ketik Nama"  value="{{ old('nama') }}">
    
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kode">Harga</label>
                                <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" min="1" placeholder="Harga Kelas" value="{{ old('harga') }}">
    
                                @error('harga')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kode">Diskon</label>
                                <input type="number" name="diskon" class="form-control @error('diskon') is-invalid @enderror" id="diskon" min="0" max="100" placeholder="Diskon" value="{{ old('diskon') }}">
    
                                @error('diskon')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
    
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop

@section('footer')
@stop