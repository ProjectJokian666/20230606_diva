@extends('layouts.app')
@section('title', 'Pelatih')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pelatih</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Pelatih</li>
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
                            <h5 class="card-title">Data Pelatih</h5>
                            @if(Auth::user()->role_id == 2)
                            <div class="card-tools">
                                <a href="{{ route('a.pelatih.add') }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-plus"></i> Tambah Data
                                </a>
                            </div>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="tbl_kain_roll_wrapper"
                            class="dataTables_wrapper dt-bootstrap4 table-responsive text-nowrap">
                            <table id="dataTable" class="table table-bordered table-striped dataTable" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th width="5%" style="text-align: center;">No</th>
                                        <th>Nama</th>
                                        <th>Asal Kota</th>
                                        <th>TTL</th>
                                        <th>Telepon</th>
                                        <th>Jenis Pelatih</th>
                                        @if(Auth::user()->role_id == 2)
                                        <th width="10%">Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelatih as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->asal_kota }}</td>
                                        <td>{{ $data->tempat_lahir.', '.$data->tgl_lahir }}</td>
                                        <td>{{ $data->no_telp }}</td>
                                        <td>{{ $data->jenis_pelatih }}</td>
                                        @if(Auth::user()->role_id == 2)
                                        <td>
                                            <a href="{{ route('a.pelatih.edit', $data->id) }}"> <button class="btn btn-warning btn-sm"><i class="fa fa-pen"></i></button></a>
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
                        url: "{{url('Admin/Pelatih/delete')}}/"+id,
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
