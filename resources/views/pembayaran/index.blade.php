@extends('layouts.app')
@section('title', 'Pembayaran')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Pembayaran</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Pembayaran</li>
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
                                <h5 class="card-title">Data Pembayaran</h5>
                                @if(Auth::user()->role_id == 4 || Auth::user()->role_id == 5)
                                <div class="card-tools">
                                    <select name="status" id="status" class="form-control float-right">
                                        <option value="1">Sudah Dibayar</option>
                                        <option value="0">Belum Dibayar</option>
                                    </select>
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
                                                <th>Nama Pemesan</th>
                                                <th>Pendaftaran Kelas</th>
                                                <th>Total Pembayaran</th>
                                                <th>Bukti Pembayaran</th>
                                                <th>Konfirmasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <table id="dataTable2" class="table table-bordered table-striped dataTable" style="width: 100%; display:none">
                                        <thead>
                                            <tr>
                                                <th width="5%" style="text-align: center;">No</th>
                                                <th>Nama Kelas</th>
                                                <th>Harga Kelas</th>
                                                <th>Jam Kelas</th>
                                                <th>Nama Pelatih</th>
                                                <th>Kelas Dimulai</th>
                                                <th>Kelas Selesai</th>
                                                <th>Diskon</th>
                                                <th>Total Dibayar</th>
                                                <th>Konfirmasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
    function tolakPembayaran(id){
        new Swal({
            title: 'Anda yakin tolak pembayaran ini?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Ya',
            denyButtonText: `Tidak`,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{url('Admin/Pembayaran/penolakan')}}/"+id,
                    method: 'PUT',
                    success: function (results) {
                        new swal("Success!", "Pembayaran Ditolak!", "warning");
                        setTimeout(() => {
                            window.location.reload();
                        }, 1500);
                    },
                    error: function (results) {
                        new swal("GAGAL!", "Gagal Konfirmasi Data!", "error");
                    }
                });
                
            } else if (result.isDenied) {
                Swal.fire('Batal Konfirmasi', '', 'info')
            }
        })
    }

    function terimaPembayaran(id){
        new Swal({
            title: 'Anda yakin untuk konfirmasi pembayaran?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Ya',
            denyButtonText: `Tidak`,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{url('Admin/Pembayaran/konfirmasi')}}/"+id,
                    method: 'PUT',
                    success: function (results) {
                        new swal("Success!", "Pembayaran Diterima!", "success");
                        setTimeout(() => {
                            window.location.reload();
                        }, 1500);
                    },
                    error: function (results) {
                        new swal("GAGAL!", "Gagal Konfirmasi Data!", "error");
                    }
                });

            } else if (result.isDenied) {
                Swal.fire('Konfirmasi Dibatalkan!', '', 'info')
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
