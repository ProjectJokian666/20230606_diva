@extends('layouts.app')
@section('title', 'Tambah Event')

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
                    <h1 class="m-0">Tambah Event</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item">Event</li>
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
                        <h3 class="card-title">Tambah Event</h3>
                        <div class="card-tools">
                            @if (Auth::user()->role_id == 2)
                                <a href="{{ route('a.event') }}" class="btn btn-warning btn-sm">Kembali</a>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('a.event.store')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kode">Tanggal Event</label>
                                <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" placeholder="Ketik Nama Sesi"  value="{{ old('tanggal') }}">
    
                                @error('tanggal')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kode">Jam Event</label>
                                <input type="time" name="jam" class="form-control @error('jam') is-invalid @enderror" id="jam" placeholder="Ketik Nama Sesi"  value="{{ old('jam') }}">
    
                                @error('jam')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kode">Nama Event</label>
                                <input type="text" name="nama_event" class="form-control @error('nama_event') is-invalid @enderror" id="nama_event" placeholder="Ketik Nama Sesi"  value="{{ old('nama_event') }}">
    
                                @error('nama_event')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Detail Event</label>
                                <textarea name="detail_event" id="detail_event" cols="30" rows="3" class="form-control @error('nama_event') is-invalid @enderror" placeholder="Deail Event"></textarea>

                                @error('detail_event')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kode">Diskon Event</label>
                                <input type="number" name="diskon_event" class="form-control @error('diskon_event') is-invalid @enderror" id="diskon_event" placeholder="Diskon Event" min="0" max="100" value="{{ old('diskon_event') }}">
    
                                @error('diskon_event')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kode">Harga</label>
                                <input type="number" name="harga_event" class="form-control @error('harga_event') is-invalid @enderror" id="harga_event" placeholder="Harga Event" value="{{ old('harga_event') }}">
    
                                @error('harga_event')
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