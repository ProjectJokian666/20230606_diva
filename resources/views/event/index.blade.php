@extends('layouts.app')
@section('title', 'Master Event')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Master Event</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Event</li>
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
                            <h5 class="card-title">Data Master Event</h5>
                            @if(Auth::user()->role_id == 2)
                            <div class="card-tools">
                                <a href="{{ route('a.event.add') }}" class="btn btn-success btn-sm">
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
                                        <th>Waktu</th>
                                        <th>Nama Event</th>
                                        <th>Detail</th>
                                        <th>Harga</th>
                                        <th>Diskon</th>
                                        <th>Harga Bayar</th>
                                        @if(Auth::user()->role_id == 2||Auth::user()->role_id == 4)
                                        <th width="10%">Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['event'] as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ DATE('d m Y',strtotime($data->tanggal)) }}, {{ DATE('H:i',strtotime($data->jam)) }} WIB</td>
                                        <td>{{ $data->nama_event }}</td>
                                        <td>{{ $data->detail_event }}</td>
                                        <td>Rp. {{ number_format($data->harga_event,0,',','.') }}</td>
                                        <td>{{ $data->diskon_event }} %</td>
                                        <td>Rp. {{ number_format(round($data->harga_event*(100-$data->diskon_event)/100,2),0,',','.') }} %</td>
                                        @if(Auth::user()->role_id == 2)
                                        <td>
                                            <a href="{{ route('a.event.edit', $data->id) }}"> <button class="btn btn-warning btn-sm"><i class="fa fa-pen"></i></button></a>
                                            <button type="button" class="btn btn-danger btn-sm" onClick="deleteData({{$data->id}})"><i class="fa fa-trash"></i></button>
                                        </td>
                                        @elseif(Auth::user()->role_id == 4)
                                        @if($data->cek_event($data->id,auth()->user()->anggota->id))
                                        <td class="text-center">
                                            <form action="{{url('Member/Event/')}}/{{$data->id}}/batal" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="" class="btn btn-sm btn-success">BAYAR</a>
                                                <button type="submit" class="btn btn-danger btn-sm">BATAL</i></button>
                                            </form>
                                        </td>
                                        @else
                                        <td class="text-center">
                                            <form action="{{url('Member/Event/')}}/{{$data->id}}/tambah" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-info btn-sm">Ikut Event <i class="fa fa-arrow-right"></i></button>
                                            </form>
                                        </td>
                                        @endif
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

    $("#dataTable").DataTable(dtTableOption).buttons().container().appendTo('#tbl_kain_roll_wrapper .col-md-6:eq(0)')
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
                    url: "{{url('Admin/Event/delete')}}/"+id,
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
                // console.log('hapus')
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
