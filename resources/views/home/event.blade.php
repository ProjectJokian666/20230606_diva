@extends('layouts.landingpage.app')
@section('title', 'Event')

@section('content')
<div class="container-fluid p-5">
	<div class="row gx-5">
		<div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
			<div class="position-relative h-100">
				<?php
				$isi = $data['event']->id%8<=8?$data['event']->id%8==0?1:$data['event']->id%8:1;
				?>
				<img class="position-absolute w-100 h-100 rounded" src="{{asset('Gambar_Senam/gam')}}{{$isi}}.jpeg" style="object-fit: cover;">
			</div>
		</div>
		<div class="col-lg-7">
			<div class="mb-4">
				<h5 class="text-primary text-uppercase">Daftar Event</h5>
				<h1 class="display-3 text-uppercase mb-0">EVENT {{$data['event']->nama_event}}</h1>
			</div>
			<div class="rounded bg-dark p-5">
				<ul class="nav nav-pills justify-content-between mb-3">
					<li class="nav-item w-50">
						<a class="nav-link text-uppercase text-center w-100 active btn-block" data-bs-toggle="pill" href="#belum">NON ANGGOTA</a>
					</li>
					<li class="nav-item w-50">
						<a class="nav-link text-uppercase text-center w-100 btn-block" data-bs-toggle="pill" href="#member">ANGGOTA</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade show active" id="belum">
						<div class="row g-3">
							<div class="col-12">
								<input type="number" name="cek_nomor" id="cek_nomor" oninput="cekNomor(this.value)" class="form-control bg-white border-0" placeholder="CEK NOMOR ( 08++ )">
							</div>
						</div>

						<p class="text-secondary text-center mt-2 mb-2" id="notif_non_anggota"></p>
						
						<form action="{{url('event')}}/{{$data['event']->id}}" enctype="multipart/form-data" autocomplete="off" method="POST" id="form_daftar_non_anggota">
							@csrf
							<div class="row g-3">
								<div class="col-12 col-sm-6">
									<input type="number" name="nomor" class="form-control bg-white border-0" placeholder="Nomor" style="height: 30px;">
								</div>
								<div class="col-12 col-sm-6">
									<input type="text" name="nama" class="form-control bg-white border-0" placeholder="Nama" style="height: 30px;">
								</div>
								<div class="col-12 col-sm-6">
									<input type="text" name="tempat" class="form-control bg-white border-0" placeholder="Tempat Lahir" style="height: 30px;">
								</div>
								<div class="col-12 col-sm-6">
									<input type="date" name="tanggal" class="form-control bg-white border-0" placeholder="Tanggal Lahir" style="height: 30px;">
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
						<div class="row g-3">
							<div class="col-12">
								<input type="number" name="cek_nomor" id="cek_nomor" oninput="cekMember(this.value)" class="form-control bg-white border-0" placeholder="CEK NOMOR MEMBER ( 08++ )">
							</div>
						</div>

						<p class="text-secondary text-center mb-2 mt-2" id="notif_anggota"></p>

						<form>
							<div class="row g-3">
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

@section('jss')
<script type="text/javascript">
	// console.log('aa')
	$('#form_daftar_non_anggota').hide()
	$('#form_daftar_nomor_non_anggota').hide()

	function cekNomor(nomor) {
		// console.log(nomor)
		if (nomor!='') {	
			$.ajax({
				url:"{{url('cek_nomor')}}",
				data:{
					nomor:nomor,
				},
				success:function(data) {
				// console.log(data)
					if (data.status=='tidak') {
						$('#notif_non_anggota').html("NOMOR ANDA BELUM PERNAH DIGUNAKAN DALAM MENDAFTAR EVENT ATAU KELAS");
						$('#form_daftar_non_anggota').show()
					}
					if (data.status=='ada') {
						$('#notif_non_anggota').html("NOMOR ANDA SUDAH PERNAH DIGUNAKAN DALAM MENDAFTAR EVENT ATAU KELAS");
						$('#form_daftar_nomor_non_anggota').show()
					}
				},
				error:function(data) {
				// console.log(data)
				}

			})
		}
		else{
			$('#notif_non_anggota').html("");
			$('#form_daftar_non_anggota').hide()
		}
	}
</script>
@endsection