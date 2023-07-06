@extends('layouts.landingpage.app')
@section('title', 'Kelas')

@section('content')
<div class="container-fluid p-5">
	<div class="row gx-5">
		<div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
			<div class="position-relative h-100">
				<?php
				$isi = $data['kelas']->id%8<=8?$data['kelas']->id%8==0?1:$data['kelas']->id%8:1;
				?>
				<img class="position-absolute w-100 h-100 rounded" src="{{asset('Gambar_Senam/gam')}}{{$isi}}.jpeg" style="object-fit: cover;">
			</div>
		</div>
		<div class="col-lg-7">
			<div class="mb-4">
				<h5 class="text-primary text-uppercase">Daftar Kelas</h5>
				<h1 class="display-3 text-uppercase mb-0">KELAS {{$data['kelas']->senam->nama}}</h1>
			</div>
			<div class="rounded bg-dark p-5">
				<ul class="nav nav-pills justify-content-between mb-3">
					<li class="nav-item w-30">
						<a class="nav-link text-uppercase text-center w-100 active" data-bs-toggle="pill" href="#belum">UMUM ( BELUM PERNAH )</a>
					</li>
					<li class="nav-item w-30">
						<a class="nav-link text-uppercase text-center w-100" data-bs-toggle="pill" href="#sudah">UMUM ( SUDAH PERNAH ) </a>
					</li>
					<li class="nav-item w-30">
						<a class="nav-link text-uppercase text-center w-100" data-bs-toggle="pill" href="#member">MEMBER</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade show active" id="belum">
						<form>
							<div class="row g-3">
								<div class="col-12 col-sm-6">
									<input type="text" name="nama" class="form-control bg-white border-0" placeholder="Nama" style="height: 30px;">
								</div>
								<div class="col-12 col-sm-6">
									<input type="text" name="email" class="form-control bg-white border-0" placeholder="Email" style="height: 30px;">
								</div>
								<div class="col-12">
									<textarea name="alamat" class="form-control bg-white border-0" rows="5" placeholder="Alamat" style="height: 70px;"></textarea>
								</div>
								<div class="col-12 col-sm-6">
									<input type="text" name="tempat" class="form-control bg-white border-0" placeholder="Tempat Lahir" style="height: 30px;">
								</div>
								<div class="col-12 col-sm-6">
									<input type="date" name="tanggal" class="form-control bg-white border-0" placeholder="Tanggal Lahir" style="height: 30px;">
								</div>
								<div class="col-12 col-sm-6">
									<select name="jenis_kelamin" class="form-select bg-white border-0" style="height: 30px;">
										<option value="" selected disabled>Pilih Jenis Kelamin</option>
										<option value="Laki-Laki">Laki-Laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
								<div class="col-12 col-sm-6">
									<input type="number" name="tempat" class="form-control bg-white border-0" placeholder="Nomor" style="height: 30px;">
								</div>
								<div class="col-12 d-flex flex-column align-items-center justify-content-center">
									<div>	
										<button class="btn btn-primary" type="submit">Daftar</button>
										<a class="btn btn-primary" href="{{url('/')}}">KEMBALI</a>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane fade" id="sudah">
						<form>
							<div class="row g-3">
								<div class="col-12 col-sm-6">
									<input type="number" name="tempat" class="form-control bg-white border-0" placeholder="Nomor" style="height: 30px;">
								</div>
								<div class="col-12 col-sm-6">
									<input type="text" name="nama" class="form-control bg-white border-0" placeholder="Nama" style="height: 30px;">
								</div>
								<div class="col-12 col-sm-6">
									<input type="text" name="tempat" class="form-control bg-white border-0" placeholder="Tempat Lahir" style="height: 30px;">
								</div>
								<div class="col-12 col-sm-6">
									<input type="date" name="tempat" class="form-control bg-white border-0" placeholder="Tanggal Lahir" style="height: 30px;">
								</div>
								<div class="col-12 col-sm-6">
									<input type="text" name="email" class="form-control bg-white border-0" placeholder="Email" style="height: 30px;">
								</div>
								<div class="col-12 col-sm-6">
									<select name="jenis_kelamin" class="form-select bg-white border-0" style="height: 30px;">
										<option value="" selected disabled>Pilih Jenis Kelamin</option>
										<option value="Laki-Laki">Laki-Laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
								<div class="col-12">
									<textarea name="alamat" class="form-control bg-white border-0" rows="5" placeholder="Alamat" style="height: 70px;"></textarea>
								</div>
								<div class="col-12 d-flex flex-column align-items-center justify-content-center">
									<div>	
										<button class="btn btn-primary" type="submit">Daftar</button>
										<a class="btn btn-primary" href="{{url('/')}}">KEMBALI</a>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane fade" id="member">
						<form>
							<div class="row g-3">
								<div class="col-12 col-sm-6">
									<input type="number" name="tempat" class="form-control bg-white border-0" placeholder="Nomor" style="height: 30px;">
								</div>
								<div class="col-12 col-sm-6">
									<input type="text" name="nama" class="form-control bg-white border-0" placeholder="Nama" style="height: 30px;">
								</div>
								<div class="col-12 col-sm-6">
									<input type="text" name="tempat" class="form-control bg-white border-0" placeholder="Tempat Lahir" style="height: 30px;">
								</div>
								<div class="col-12 col-sm-6">
									<input type="date" name="tempat" class="form-control bg-white border-0" placeholder="Tanggal Lahir" style="height: 30px;">
								</div>
								<div class="col-12 col-sm-6">
									<input type="text" name="email" class="form-control bg-white border-0" placeholder="Email" style="height: 30px;">
								</div>
								<div class="col-12 col-sm-6">
									<select name="jenis_kelamin" class="form-select bg-white border-0" style="height: 30px;">
										<option value="" selected disabled>Pilih Jenis Kelamin</option>
										<option value="Laki-Laki">Laki-Laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
								<div class="col-12">
									<textarea name="alamat" class="form-control bg-white border-0" rows="5" placeholder="Alamat" style="height: 70px;"></textarea>
								</div>
								<div class="col-12 d-flex flex-column align-items-center justify-content-center">
									<div>	
										<button class="btn btn-primary" type="submit">Daftar</button>
										<a class="btn btn-primary" href="{{url('/')}}">KEMBALI</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- <h4 class="text-body mb-4">Diam dolor diam ipsum tempor sit. Clita erat ipsum et lorem stet no labore lorem sit clita duo justo magna dolore</h4> -->
		</div>
	</div>
</div>
@endsection