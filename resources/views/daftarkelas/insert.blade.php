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
                        <form action="{{url('Member/Daftar-Kelas-Senam')}}/{{$data['jadwal_kelas']->id}}/tambah" class="form-profile" method="POST" enctype="multipart/form-data" autocomplete="off" id="formTambahData">
                            @method('patch')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="nama">Nama Kelas</label>
                                            <input type="text" class="form-control" name="nama_kelas" id="nama" value="{{$data['jadwal_kelas']->senam->nama}}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga">Harga Kelas</label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <div class="btn btn-sm input-group-text">Rp</div>
                                                </div>
                                                <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga" value="{{number_format($data['jadwal_kelas']->senam->harga,0,',','.')}}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga">Diskon</label>
                                            <div class="input-group">
                                                <input type="text" name="diskon" class="form-control" id="diskon" placeholder="diskon" value="{{$data['jadwal_kelas']->senam->diskon}} %" readonly>
                                                <div class="input-group-append">
                                                    <div class="btn btn-sm input-group-text">%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="hari">Hari</label>
                                            <div class="input-group">
                                                <?php $hari = ['SENIN','SELASA','RABU','KAMIS',"JUM'AT",'SABTU','MINGGU']; ?>
                                                <input type="text" name="hari" class="form-control" id="hari" placeholder="hari" value="{{$hari[DATE('N',strtotime($data['jadwal_kelas']->hari))-1]}}, {{DATE('d m Y',strtotime($data['jadwal_kelas']->hari))}}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga">Jam</label>
                                            <div class="input-group">
                                                <input type="text" name="jam" class="form-control" id="harga" placeholder="Harga" value="{{DATE('H:i',strtotime($data['jadwal_kelas']->jam))}} WIB" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <button type="submit" class="btn btn-primary col-6" style="width: 50%">Daftar Kelas</button>
                                    <a href="{{route('m.daftarKelas')}}" class="btn btn-danger col-6" style="width: 50%">Kembali</a>
                                </div>
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
