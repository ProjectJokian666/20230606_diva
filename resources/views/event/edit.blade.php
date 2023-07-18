@extends('layouts.app')
@section('title', 'Edit Event')

@section('content')
<div class="content-wrapper">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Event</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item">Event</li>
                        <li class="breadcrumb-item active">Edit Data</li>
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
                        <h3 class="card-title">Edit Event</h3>
                        <div class="card-tools">
                            @if (Auth::user()->role_id == 2)
                                <a href="{{ route('a.event') }}" class="btn btn-warning btn-sm">Kembali</a>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('a.event.update', $event->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kode">Tanggal Event</label>
                                <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" placeholder="Ketik Nama Sesi"  value="{{ $event->tanggal }}">
    
                                @error('tanggal')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jam">Jam Event</label>
                                <input type="time" name="jam" class="form-control @error('jam') is-invalid @enderror" id="jam" placeholder="Ketik Nama Sesi"  value="{{ $event->jam }}">
    
                                @error('jam')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kode">Nama Event</label>
                                <input type="text" name="nama_event" class="form-control @error('nama_event') is-invalid @enderror" id="nama_event" placeholder="Ketik Nama Sesi"  value="{{ $event->nama_event }}">
    
                                @error('nama_event')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Detail Event</label>
                                <textarea name="detail_event" id="detail_event" cols="30" rows="3" class="form-control @error('nama_event') is-invalid @enderror" placeholder="Deail Event" >{{ $event->detail_event }}</textarea>

                                @error('detail_event')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kode">Diskon Event</label>
                                <input type="number" name="diskon_event" class="form-control @error('diskon_event') is-invalid @enderror" id="diskon_event" placeholder="Diskon Event" min="0" max="100" value="{{ $event->diskon_event }}">
    
                                @error('diskon_event')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kode">Harga</label>
                                <input type="number" name="harga_event" class="form-control @error('harga_event') is-invalid @enderror" id="harga_event" placeholder="Harga Event" value="{{ $event->harga_event }}">
    
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
@endsection

@section('footer')

<script type="text/javascript">
    @if(Session::has('alert'))
    @if(Session::get('sweetalert')=='success')
    Swal.fire('', '{{Session::get('alert')}}', 'warning');
    new swal("SUKSES!", '{{Session::get('alert')}}', "success");
    @elseif(Session::get('sweetalert')=='error')
    new swal("BAHAYA!", '{{Session::get('alert')}}', "error");
    @elseif(Session::get('sweetalert')=='warning')
    new swal("PERINGATAN!", '{{Session::get('alert')}}', "warning");
    @endif
    @endif
</script>
@endsection