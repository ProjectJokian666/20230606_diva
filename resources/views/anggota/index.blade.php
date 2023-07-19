@extends('layouts.app')
@section('title', 'Anggota')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Anggota</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Anggota</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Data Anggota</h5>
                            @if(Auth::user()->role_id == 2)
                            <div class="card-tools">
                                <a href="{{ route('a.anggota.add') }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-plus"></i> Tambah Data
                                </a>
                            </div>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="tbl_kain_roll_wrapper" class="dataTables_wrapper dt-bootstrap4 table-responsive text-nowrap">
                            <table id="dataTable" class="table table-bordered table-striped dataTable" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th width="5%" style="text-align: center;">No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>TTL</th>
                                        <th>Telepon</th>
                                        @if(Auth::user()->role_id == 3)
                                        <th>Kelas Senam Diikuti</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Sesi Kelas</th>
                                        @endif
                                        <th>Status Akun</th>
                                        @if(Auth::user()->role_id == 2)
                                        <th width="10%">Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($anggota as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->tempat_lahir.', '.$data->tgl_lahir }}</td>
                                        <td>{{ $data->no_telp }}</td>
                                        @if(Auth::user()->role_id == 3)
                                        <td>{{ $data->nama_kelas }}</td>
                                        <td>{{ $data->paket_mulai }}</td>
                                        <td>{{ $data->paket_selesai }}</td>
                                        <td>{{ $data->start.' - '.$data->finish }}</td>
                                        @endif
                                        <td>
                                            @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
                                            @if($data->status_anggota == 0)
                                            <button type="button" class="btn btn-sm btn-warning disabled">Non Member</button>
                                            @else
                                            <button type="button" class="btn btn-sm btn-light disabled">Member Aktif</button>
                                            @endif
                                            @elseif(Auth::user()->role_id == 2)
                                            @if($data->status_anggota == 0)
                                            <button type="button" class="btn btn-sm btn-warning" onclick="aktifAnggota($data->id)">Non Member</button>
                                            @else
                                            <button type="button" class="btn btn-sm btn-light" onclick="aktifAnggota($data->id)">Member Aktif</button>
                                            @endif
                                            @endif
                                        </td>
                                        @if(Auth::user()->role_id == 2)
                                        <td>
                                            <a href="{{ route('a.anggota.edit', $data->id) }}"> <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button></a>
                                            <button type="button" class="btn btn-danger btn-sm" onClick="deleteData({{$data->id}})"><i class="fa fa-trash"></i></button>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- ./card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
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
@if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
<script>
    var dtTableOption = {
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "buttons": [{
            text: "<i class='fas fa-copy' title='Copy Table to Clipboard'></i>",
            className: "btn btn-outline-secondary",
            extend: 'copy'
        },
        {
            text: "<i class='fas fa-file-excel' title='Download File Excel'></i>",
            className: "btn btn-outline-success",
            extend: 'excel'
        },
        {
            text: "<i class='fas fa-file-pdf' title='Download File PDF'></i>",
            className: "btn btn-outline-danger",
            extend: 'pdf'
        },
        {
            text: "<i class='fas fa-print' title='Print Table'></i>",
            className: "btn btn-outline-primary",
            extend: 'print'
        },
        ]
    };

    $("#dataTable").DataTable(dtTableOption).buttons().container().appendTo(
        '#tbl_kain_roll_wrapper .col-md-6:eq(0)')
    </script>

    <script type="text/javascript">
        function deleteData(id){
            new swal({
                title: "Anda Yakin?",
                text: "Untuk menghapus data ini?",
                icon: 'warning',
                showCancelButton:true,
                confirmButtonText: "Oke",
                cancelButtonText: "Tidak",
            })
            .then((willDelete) => {
                if(willDelete.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{url('Admin/Anggota/delete')}}/"+id,
                        method: 'DELETE',
                        success: function (results) {
                            new swal("Berhasil!", "Data Berhasil Dihapus!", "success");
                            setTimeout(() => {
                                window.location.reload();
                            }, 1500);
                        },
                        error: function (results) {
                            new swal("GAGAL!", "Gagal Menghapus Data!", "error");
                        }
                    });
                }
            })
        }
    </script>
    @else
    <script>
        var dtTableOption = {
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        };

        $("#dataTable").DataTable(dtTableOption)
    </script>
    @endif
    @endsection
