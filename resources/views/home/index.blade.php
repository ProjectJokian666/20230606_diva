@extends('layouts.landingpage.app')
@section('title', 'Home Page')

@section('content')
<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5" id="home">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{asset('Gambar_Senam/gam5.jpeg')}}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h5 class="text-white text-uppercase">Sanggar Senam Terbaik</h5>
                        <h1 class="display-2 text-white text-uppercase mb-md-4">Bentuk Tubuh Yang ideal Bersama Sanggar Senam Atheena</h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="{{asset('Gambar_Senam/gam7.jpeg')}}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h5 class="text-white text-uppercase">Sanggar Senam Terbaik</h5>
                        <h1 class="display-2 text-white text-uppercase mb-md-4">Mari Hidup Sehat Bersama Kami</h1>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->


<!-- About Start -->
<div class="container-fluid p-5" id="tentangkami">
    <div class="row gx-5">
        <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
            <div class="position-relative h-100">
                <img class="position-absolute w-100 h-100 rounded" src="{{asset('Gambar_Senam/gam4.jpeg')}}" style="object-fit: cover;">
            </div>
        </div>
        <div class="col-lg-7">
            <div class="mb-4">
                <h5 class="text-primary text-uppercase">Tentang Kami</h5>
                <h1 class="display-3 text-uppercase mb-0">Selamat Datang Di Sanggar Senam Atheena</h1>
            </div>
            <!-- <h4 class="text-body mb-4">Diam dolor diam ipsum tempor sit. Clita erat ipsum et lorem stet no labore lorem sit clita duo justo magna dolore</h4> -->
            <p class="mb-4" style="text-indent: 45px;">Sanggar Senam Atheena Kertosono adalah sebuah pusat senam dan kebugaran yang terletak di Jalan Kertosono – Lengkong dengan pemilik atas nama Ibu Titin. Sanggar Senam Atheena ini telah beroperasi pada tahun 2022 hingga saat ini. Sanggar ini telah menjadi tempat yang cukup populer bagi masyarakat setempat yang ingin meningkatkan kesehatan, dan meraih keseimbangan hidup yang lebih baik.</p>
            <p class="mb-4" style="text-indent: 45px;">Salah satu keunggulan utama dari Sanggar Senam Atheena Kertosono adalah jenis senam yang beragam, sehingga mampu memberikan banyak variasi yang bisa dipilih. Mereka menawarkan berbagai jenis senam seperti aerobic pemula, aerobic koreo, aerobic Zumba, dan yoga. Dimana setiap gerakan senam dirancang secara khusus untuk memberikan kesan yang menyenangkan dengan manfaat kesehatan yang optimal. Selain itu, Sanggar Senam Atheena ini juga menyediakan ruang latihan yang cukup luas, bersih dan terorganisir dengan baik sehingga mampu menciptakan suasana yang menyenangkan dan memotivasi bagi peserta untuk berlatih secara teratur. </p>
            <p class="mb-4" style="text-indent: 45px;">Tidak hanya itu, di Sanggar Senam Atheena juga menghadirkan instruktur yang berpengalaman dan berdedikasi dalam membantu peserta dalam melakukan setiap gerakan. Tidak hanya memiliki pengetahuan yang mendalam tentang berbagai teknik senam, instruktur, mereka juga selalu memberikan dukungan yang positif untuk mendorong peserta agar tetap termotivasi untuk mengikuti kegiatan senam dengan rutin. </p>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Programe Start -->
<div class="container-fluid programe position-relative px-5 mt-5" style="margin-bottom: 135px;">
    <div class="row g-5 gb-5">
        <div class="col-lg-4 col-md-6">
            <div class="bg-light rounded text-center p-5">
                <i class="flaticon-six-pack display-1 text-primary"></i>
                <h3 class="text-uppercase my-4">Aerobic Pemula</h3>
                <p>Aerobik pemula adalah bentuk latihan aerobik yang dirancang khusus untuk pemula yang baru memulai atau memiliki tingkat kebugaran yang lebih rendah. </p>
                <a class="text-uppercase" href="">Read More <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="bg-light rounded text-center p-5">
                <i class="flaticon-barbell display-1 text-primary"></i>
                <h3 class="text-uppercase my-4"> Aerobic Koreo</h3>
                <p>Aerobik pemula adalah bentuk latihan aerobik yang dirancang khusus untuk pemula yang baru memulai atau memiliki tingkat kebugaran yang lebih rendah.</p>
                <a class="text-uppercase" href="">Read More <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="bg-light rounded text-center p-5">
                <i class="flaticon-barbell display-1 text-primary"></i>
                <h3 class="text-uppercase my-4">Zumba</h3>
                <p>Senam Zumba adalah sebuah jenis latihan fisik yang menggabungkan gerakan tari dengan musik berirama.</p>
                <a class="text-uppercase" href="">Read More <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="bg-light rounded text-center p-5">
                <i class="flaticon-bodybuilding display-1 text-primary"></i>
                <h3 class="text-uppercase my-4">Yoga</h3>
                <p>oga adalah bentuk senam atau latihan fisik yang menggabungkan gerakan tubuh, pose, pernapasan, meditasi, dan teknik relaksasi yang berasal dari tradisi yoga India kuno.</p>
                <a class="text-uppercase" href="">Read More <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-lg-12 col-md-6 text-center">
            <h1 class="text-uppercase text-light mb-4">Nikmati Berbagai Diskon Untuk Member</h1>
            <a href="{{route('register')}}" class="btn btn-primary py-3 px-5">Daftar Member</a>
        </div>
    </div>
</div>
<!-- Programe Start -->


<!-- Class Timetable Start -->
<div class="container-fluid p-5" id="kelas">
    <div class="mb-5 text-center">
        <h5 class="text-primary text-uppercase">Jadwal Kelas</h5>
        <h1 class="display-3 text-uppercase mb-0">Waktu Kerja</h1>
    </div>
    <div class="tab-class text-center">
        <ul class="nav nav-pills d-inline-flex justify-content-center bg-dark text-uppercase rounded-pill mb-5">
            <li class="nav-item">
                <a class="nav-link rounded-pill text-white active" data-bs-toggle="pill" href="#tab-1">Senin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-pill text-white" data-bs-toggle="pill" href="#tab-2">Selasa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-pill text-white" data-bs-toggle="pill" href="#tab-3">Rabu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-pill text-white" data-bs-toggle="pill" href="#tab-4">Kamis</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-pill text-white" data-bs-toggle="pill" href="#tab-5">Jumat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-pill text-white" data-bs-toggle="pill" href="#tab-6">Sabtu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-pill text-white" data-bs-toggle="pill" href="#tab-7">Minggu</a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-5">
                    @foreach($data['senin'] as $key => $value)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-dark rounded text-center py-5 px-3">
                            <h6 class="text-uppercase text-light mb-3">{{date('d M Y',strtotime($value['tanggal']))}}</h6>
                            <h6 class="text-uppercase text-light mb-3">{{date('H:i',strtotime($value['jam']))}} WIB</h6>
                            <h5 class="text-uppercase text-primary">{{$value['pelatih']}}</h5>
                            <p class="text-uppercase text-secondary mb-0">{{$value['kelas']}}</p>
                            <a href="{{url('kelas',$value['id'])}}" class="btn btn-sm btn-primary">IKUTI KELAS <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div id="tab-2" class="tab-pane fade p-0">
                <div class="row g-5">
                    @foreach($data['selasa'] as $key => $value)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-dark rounded text-center py-5 px-3">
                            <h6 class="text-uppercase text-light mb-3">{{date('d M Y',strtotime($value['tanggal']))}}</h6>
                            <h6 class="text-uppercase text-light mb-3">{{date('H:i',strtotime($value['jam']))}} WIB</h6>
                            <h5 class="text-uppercase text-primary">{{$value['pelatih']}}</h5>
                            <p class="text-uppercase text-secondary mb-0">{{$value['kelas']}}</p>
                            <a href="{{url('kelas',$value['id'])}}" class="btn btn-sm btn-primary">IKUTI KELAS <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div id="tab-3" class="tab-pane fade p-0">
                <div class="row g-5">
                    @foreach($data['rabu'] as $key => $value)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-dark rounded text-center py-5 px-3">
                            <h6 class="text-uppercase text-light mb-3">{{date('d M Y',strtotime($value['tanggal']))}}</h6>
                            <h6 class="text-uppercase text-light mb-3">{{date('H:i',strtotime($value['jam']))}} WIB</h6>
                            <h5 class="text-uppercase text-primary">{{$value['pelatih']}}</h5>
                            <p class="text-uppercase text-secondary mb-0">{{$value['kelas']}}</p>
                            <a href="{{url('kelas',$value['id'])}}" class="btn btn-sm btn-primary">IKUTI KELAS <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div id="tab-4" class="tab-pane fade p-0">
                <div class="row g-5">
                    @foreach($data['kamis'] as $key => $value)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-dark rounded text-center py-5 px-3">
                            <h6 class="text-uppercase text-light mb-3">{{date('d M Y',strtotime($value['tanggal']))}}</h6>
                            <h6 class="text-uppercase text-light mb-3">{{date('H:i',strtotime($value['jam']))}} WIB</h6>
                            <h5 class="text-uppercase text-primary">{{$value['pelatih']}}</h5>
                            <p class="text-uppercase text-secondary mb-0">{{$value['kelas']}}</p>
                            <a href="{{url('kelas',$value['id'])}}" class="btn btn-sm btn-primary">IKUTI KELAS <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div id="tab-5" class="tab-pane fade p-0">
                <div class="row g-5">
                    @foreach($data['jumat'] as $key => $value)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-dark rounded text-center py-5 px-3">
                            <h6 class="text-uppercase text-light mb-3">{{date('d M Y',strtotime($value['tanggal']))}}</h6>
                            <h6 class="text-uppercase text-light mb-3">{{date('H:i',strtotime($value['jam']))}} WIB</h6>
                            <h5 class="text-uppercase text-primary">{{$value['pelatih']}}</h5>
                            <p class="text-uppercase text-secondary mb-0">{{$value['kelas']}}</p>
                            <a href="{{url('kelas',$value['id'])}}" class="btn btn-sm btn-primary">IKUTI KELAS <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div id="tab-6" class="tab-pane fade p-0">
                <div class="row g-5">
                    @foreach($data['sabtu'] as $key => $value)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-dark rounded text-center py-5 px-3">
                            <h6 class="text-uppercase text-light mb-3">{{date('d M Y',strtotime($value['tanggal']))}}</h6>
                            <h6 class="text-uppercase text-light mb-3">{{date('H:i',strtotime($value['jam']))}} WIB</h6>
                            <h5 class="text-uppercase text-primary">{{$value['pelatih']}}</h5>
                            <p class="text-uppercase text-secondary mb-0">{{$value['kelas']}}</p>
                            <a href="{{url('kelas',$value['id'])}}" class="btn btn-sm btn-primary">IKUTI KELAS <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div id="tab-7" class="tab-pane fade p-0">
                <div class="row g-5">
                    @foreach($data['minggu'] as $key => $value)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-dark rounded text-center py-5 px-3">
                            <h6 class="text-uppercase text-light mb-3">{{date('d M Y',strtotime($value['tanggal']))}}</h6>
                            <h6 class="text-uppercase text-light mb-3">{{date('H:i',strtotime($value['jam']))}} WIB</h6>
                            <h5 class="text-uppercase text-primary">{{$value['pelatih']}}</h5>
                            <p class="text-uppercase text-secondary mb-0">{{$value['kelas']}}</p>
                            <a href="{{url('kelas',$value['id'])}}" class="btn btn-sm btn-primary">IKUTI KELAS <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Class Timetable Start -->

<!-- Class Timetable Start -->
<div class="container-fluid p-0 mb-5" id="event">
    <div id="event-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $hari=[
                'Sunday'=>'Minggu',
                'Monday'=>'Senin',
                'Tuesday'=>'Selasa',
                'Wednesday'=>'Rabu',
                'Thursday'=>'Kamis',
                'Friday'=>"Jum'at",
                'Saturday'=>'Sabtu',
            ];
            // var_dump($hari);
            ?>
            @foreach($data['events'] as $key => $value)
            <div class="carousel-item <?= $loop->iteration==1?'active':'' ?>">
                <?php
                $isi = ($loop->iteration%7)<=7?$loop->iteration%7:1;
                ?>
                <img class="w-100" src="{{asset('Gambar_Senam/gam')}}{{$isi}}.jpeg" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h5 class="text-white text-uppercase">{{$value->nama_event}}</h5>
                        <h1 class="display-2 text-white text-uppercase mb-md-4">{{$value->detail_event}}</h1>
                        <h5 class="text-white text-uppercase">{{$hari[DATE('l',strtotime($value->tanggal))]}}</h5>
                        <h5 class="text-white text-uppercase">{{DATE('d M Y',strtotime($value->tanggal))}}</h5>
                        <h5 class="text-white text-uppercase">{{DATE('H:i',strtotime($value->jam))}} WIB</h5>
                        <a href="{{ url('event',$value->id) }}" class="btn btn-primary py-md-3 px-md-5 me-3">IKUTI EVENT</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#event-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#event-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Class Timetable Start -->


<!-- Facts Start -->
<div class="container-fluid bg-dark facts p-5 my-5">
    <div class="row gx-5 gy-4 py-5">
        <div class="col-lg-3 col-md-6">
            <div class="d-flex">
                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fa fa-star fs-4 text-white"></i>
                </div>
                <div class="ps-4">
                    <h5 class="text-secondary text-uppercase">Total Kelas</h5>
                    <h1 class="display-5 text-white mb-0" data-toggle="counter-up">{{ $data['countKelas'] }}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="d-flex">
                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fa fa-users fs-4 text-white"></i>
                </div>
                <div class="ps-4">
                    <h5 class="text-secondary text-uppercase">Trainers Kami</h5>
                    <h1 class="display-5 text-white mb-0" data-toggle="counter-up">{{ $data['countPelatih'] }}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="d-flex">
                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fa fa-check fs-4 text-white"></i>
                </div>
                <div class="ps-4">
                    <h5 class="text-secondary text-uppercase">Anggota</h5>
                    <h1 class="display-5 text-white mb-0" data-toggle="counter-up">{{ $data['countAnggota'] }}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="d-flex">
                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fa fa-mug-hot fs-4 text-white"></i>
                </div>
                <div class="ps-4">
                    <h5 class="text-secondary text-uppercase">Anggota Terdaftar Kelas</h5>
                    <h1 class="display-5 text-white mb-0" data-toggle="counter-up">{{ $data['countTerdaftar'] }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Facts End -->


<!-- Team Start -->
<div class="container-fluid p-5" id="pelatih">
    <div class="mb-5 text-center">
        <h5 class="text-primary text-uppercase">The Team</h5>
        <h1 class="display-3 text-uppercase mb-0">Pelatih Berpengalaman</h1>
    </div>
    <div class="row g-5">
        @foreach ($data['pelatih'] as $key => $value)
        <a  class="col-lg-4 col-md-6" href="{{url('pelatih',$value->user_id)}}">
            <div class="team-item position-relative">
                <div class="position-relative overflow-hidden rounded">
                    <img class="img-fluid w-100" src="{{ ($value->image == null) ? asset('Gambar_Senam/gam4.jpeg') : asset('foto_pelatih/'.$value->image) }}" alt="">
                </div>
                <div class="position-absolute start-0 bottom-0 w-100 rounded-bottom text-center p-4" style="background: rgba(34, 36, 41, .9);">
                    <h5 class="text-uppercase text-light">{{$value->nama }}</h5>
                    <p class="text-uppercase text-secondary m-0">Trainer</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
<!-- Team End -->

@endsection
