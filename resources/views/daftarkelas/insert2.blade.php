@extends('layouts.app')
@section('title', 'Master Kelas Senam')

@section('content')
    <!-- Content Wrapper. Contains page content -->
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
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Daftar Kelas Senam</h1>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->

                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div class="card">
                            @if(Auth::user()->role_id == 4)
                                <form action="{{ route('m.daftarKelas.store') }}" class="form-profile" method="POST" enctype="multipart/form-data" autocomplete="off" id="formTambahData">
                            @elseif(Auth::user()->role_id == 5)
                                <form action="{{ route('nm.daftarKelas.store') }}" class="form-profile" method="POST" enctype="multipart/form-data" autocomplete="off" id="formTambahData">
                            @endif
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama">Nama Kelas</label>
                                                <input type="text" class="form-control" name="kelas_senam_id" id="kelas_senam_id" value="{{ $kelasSenam->id_kelas_senam }}" hidden>
                                                
                                                <input type="text" class="form-control" name="nama_kelas" id="nama" value="{{ $kelasSenam->nama_kelas }}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="harga">Harga (Per Hari)</label>
                                                <div class="input-group">
                                                    <div class="input-group-append">
                                                        <div class="btn btn-sm input-group-text">Rp</div>
                                                    </div>
                                                    <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga" value="{{ $kelasSenam->harga }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="harga">Diskon</label>
                                                <div class="input-group">
                                                    <input type="text" name="diskon" class="form-control" id="diskon" placeholder="diskon" value="{{ $kelasSenam->diskon }}" readonly>
                                                    <div class="input-group-append">
                                                        <div class="btn btn-sm input-group-text">%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="hari">Hari</label>
                                                <?php $hari = json_decode($kelasSenam->hari); ?>
                                                <div class="input-group">
                                                    <input type="text" name="hari" class="form-control" id="hari" placeholder="hari" value=" @foreach($hari as $hr) {{$hr}} @endforeach" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="harga">Jam Start</label>
                                                <div class="input-group">
                                                    <input type="text" name="start" class="form-control" id="harga" placeholder="Harga" value="{{ $kelasSenam->start }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="harga">Jam Finish</label>
                                                <div class="input-group">
                                                    <input type="text" name="finish" class="form-control" id="harga" placeholder="Harga" value="{{ $kelasSenam->finish }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="media align-items-center mb-4">
                                                            <img class="mr-3 img-circle" src="{{  ($kelasSenam->image == null) ? asset('landingpage/img/about.jpg') : asset('img/profile/'.$kelasSenam->image)  }}" width="80" height="80" alt="">
                                                            <div class="media-body">
                                                                <h3 class="mb-0">{{$kelasSenam->nama}}</h3>
                                                                <p class="text-muted mb-0">{{$kelasSenam->jenis_pelatih}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="paket_mulai">Kelas Mulai</label>
                                                <div class="input-group">
                                                    <input type="datetime-local" name="paket_mulai" class="form-control @error('paket_mulai') is-invalid @enderror" id="paket_mulai" placeholder="Paket Mulai" value="{{ old('paket_mulai') }}">

                                                    @error('paket_mulai')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="paket_selesai">Kelas Selesai</label>
                                                <div class="input-group">
                                                    <input type="datetime-local" name="paket_selesai" class="form-control @error('paket_selesai') is-invalid @enderror" id="paket_selesai" placeholder="Paket Selesai" value="{{ old('paket_selesai') }}">

                                                    @error('paket_selesai')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" style="width: 100%">Daftar Kelas</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('footer')
@endsection
