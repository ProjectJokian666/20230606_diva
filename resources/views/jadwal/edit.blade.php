@extends('layouts.app')
@section('title', 'Tambah Jadwal')

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
                    <h1 class="m-0">Tambah Jadwal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item">Jadwal</li>
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
                            <h3 class="card-title">Tambah Pelatih</h3>
                            <div class="card-tools">
                                @if (Auth::user()->role_id == 2)
                                <a href="{{ route('a.jadwal') }}" class="btn btn-warning btn-sm">Kembali</a>
                                @endif
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('a.jadwal.edit', $data['jadwal']->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kode">Kelas Senam</label>
                                    <select name="senam" id="senam" class="form-control @error('senam') is-invalid @enderror">
                                        <option value="" selected disabled>Pilih Kelas</option>
                                        @foreach($data['senam'] as $key => $value)
                                        <option value="{{$value->id}}" <?= $data['jadwal']->senam_id==$value->id? 'selected':'' ?>>{{$value->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('senam')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kode">Pelatih</label>
                                    <select name="pelatih" id="pelatih" class="form-control @error('pelatih') is-invalid @enderror">
                                        <option value="" selected disabled>Pilih Pelatih</option>
                                        @foreach($data['pelatih'] as $key => $value)
                                        <option value="{{$value->id}}" <?= $data['jadwal']->user_id==$value->id? 'selected':'' ?>>{{$value->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('pelatih')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kode">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" placeholder="Ketik Nama Sesi"  value="{{ $data['jadwal']->hari }}">

                                    @error('tanggal')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
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