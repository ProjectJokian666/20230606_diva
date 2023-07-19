@extends('layouts.app')
@section('title', 'Edit Anggota')

@section('content')
<div class="content-wrapper">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Anggota</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item">Anggota</li>
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
                        <h3 class="card-title">Edit Anggota</h3>
                        <div class="card-tools">
                            @if (Auth::user()->role_id == 2)
                                <a href="{{ route('a.anggota') }}" class="btn btn-warning btn-sm">Kembali</a>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('a.anggota.update', $anggota->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kode">Nama</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Ketik Nama Anggota"  value="{{ (old('nama')) ? old('nama') : $anggota->nama }}">
    
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kode">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Ketik Email Anggota"  value="{{ (old('email')) ? old('email') : $user->email }}">
    
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="plant">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="10" rows="3" class="form-control @error('alamat') is-invalid @enderror" placeholder="Ketik Alamat Anggota">{{ (old('alamat')) ? old('email') : $anggota->alamat }}</textarea>
    
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Ketik Asal Kota" value="{{ (old('tempat_lahir')) ? old('tempat_lahir') : $anggota->tempat_lahir }}">
    
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" placeholder="Ketik Asal Kota" value="{{ (old('tgl_lahir')) ? old('tgl_lahir') : $anggota->tgl_lahir }}">
    
                                @error('tgl_lahir')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki" @if($anggota->jenis_kelamin == 'Laki-Laki') selected @endif>Laki-Laki</option>
                                    <option value="Perempuan" @if($anggota->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                                </select>
    
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="no_telp">No Telepon</label>
                                <input type="number" name="no_telp" id="no_telp" class="form-control @error('no_telp') is-invalid @enderror" placeholder="Ketik Nomor Telepon" value="{{ (old('no_telp')) ? old('no_telp') : $anggota->no_telp }}">
    
                                @error('no_telp')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status_anggota">Status Anggota</label>
                                <select name="status_anggota" id="status_anggota" class="form-control @error('status_anggota') is-invalid @enderror">
                                    <option value="" selected disabled>Pilih Status Anggota</option>
                                    <option value="1" @if($anggota->status_anggota == 1) selected @endif>Member</option>
                                    <option value="0" @if($anggota->status_anggota == 0) selected @endif>Non Member</option>
                                </select>
    
                                @error('status_anggota')
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