@extends('layouts.app')
@section('title', 'Edit Kelas Senam')

@section('content')
<div class="content-wrapper">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Jenis Senam</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item">Jenis Senam</li>
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
                            <h3 class="card-title">Edit Jenis Senam</h3>
                            <div class="card-tools">
                                @if (Auth::user()->role_id == 2)
                                <a href="{{ route('a.kelassenam') }}" class="btn btn-warning btn-sm">Kembali</a>
                                @endif
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('a.kelassenam.edit', $kelassenam->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kode">Nama Senam</label>
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Ketik Nama"  value="{{ (old('nama')) ? old('nama') : $kelassenam->nama  }}">
                                    
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kode">Harga</label>
                                    <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" min="1" value="{{ (old('harga')) ? old('harga') : $kelassenam->harga }}">
                                    
                                    @error('harga')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kode">Diskon</label>
                                    <input type="number" name="diskon" class="form-control @error('diskon') is-invalid @enderror" id="diskon" min="0" max="100" value="{{ (old('diskon')) ? old('diskon') : $kelassenam->diskon }}">
                                    
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
@endsection

@section('footer')
<script>
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
    $(document).ready(function(){
        $('#hari').select2();
    })
</script>
@endsection