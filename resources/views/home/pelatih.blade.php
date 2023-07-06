@extends('layouts.landingpage.app')
@section('title', 'Pelatih')

@section('content')
<div class="container-fluid p-5">
	<div class="row gx-5">
		<div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
			<div class="position-relative h-100">
				<img class="position-absolute w-100 h-100 rounded" src="{{ $data['pelatih']->image == null ? asset('Gambar_Senam/gam4.jpeg') : asset('foto_pelatih/'.$data['pelatih']->image) }}" style="object-fit: cover;">
			</div>
		</div>
		<div class="col-lg-7">
			<div class="mb-4">
				<h5 class="text-primary text-uppercase">Data Diri Pelatih</h5>
				<h4 class="text-uppercase mb-0">{{$data['pelatih']->name}}</h4>
				<h5 class="text-uppercase mb-0">{{$data['pelatih']->jenis_kelamin}}</h5>
			</div>
			<div class="rounded bg-dark p-5">
				<div class="tab-content">
					<div class="row g-3">
						<div class="col-12 col-sm-3">
							<h5 class="text-uppercase text-light">EMAIL</h5>
						</div>
						<div class="col-12 col-sm-9">
							<h5 class="text-uppercase text-light">{{ $data['pelatih']->email }}</h5>
						</div>
						<div class="col-12 col-sm-3">
							<h5 class="text-uppercase text-light">ASAL</h5>
						</div>
						<div class="col-12 col-sm-9">
							<h5 class="text-uppercase text-light">{{ $data['pelatih']->asal_kota }}</h5>
						</div>
						<div class="col-12 col-sm-3">
							<h5 class="text-uppercase text-light">ALAMAT</h5>
						</div>
						<div class="col-12 col-sm-9">
							<h5 class="text-uppercase text-light">{{ $data['pelatih']->alamat }}</h5>
						</div>
						<div class="col-12 col-sm-3">
							<h5 class="text-uppercase text-light">TTL</h5>
						</div>
						<div class="col-12 col-sm-9">
							<h5 class="text-uppercase text-light">{{ $data['pelatih']->tempat_lahir }}, {{DATE('d M Y',strtotime($data['pelatih']->tgl_lahir))}}</h5>
						</div>
						<div class="col-12 col-sm-3">
							<h5 class="text-uppercase text-light">No. Telp</h5>
						</div>
						<div class="col-12 col-sm-9">
							<h5 class="text-uppercase text-light">{{ $data['pelatih']->no_telp }}</h5>
						</div>
						<div class="col-12 col-sm-3">
							<h5 class="text-uppercase text-light">Pelatih</h5>
						</div>
						<div class="col-12 col-sm-9">
							<h5 class="text-uppercase text-light">{{ $data['pelatih']->jenis_pelatih }}</h5>
						</div>
						<div class="col-12 d-flex flex-column align-items-center justify-content-center">
							<div>	
								<a class="btn btn-primary" href="{{url('/')}}">KEMBALI</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- <h4 class="text-body mb-4">Diam dolor diam ipsum tempor sit. Clita erat ipsum et lorem stet no labore lorem sit clita duo justo magna dolore</h4> -->
		</div>
	</div>
</div>
@endsection