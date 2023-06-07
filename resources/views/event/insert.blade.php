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
                                <textarea name="detail_event" id="detail_event" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kode">Start</label>
                                        <input type="datetime-local" name="event_start" class="form-control @error('event_start') is-invalid @enderror" id="event_start"  value="{{ old('event_start') }}">
            
                                        @error('event_start')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="finish">Finish</label>
                                        <input type="datetime-local" name="event_finish" class="form-control @error('event_finish') is-invalid @enderror" id="event_finish"  value="{{ old('event_finish') }}">
            
                                        @error('event_finish')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
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