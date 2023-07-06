
    <!-- Header Start -->
    <div class="container-fluid bg-dark px-0" >
        <div class="row gx-0">
            <div class="col-lg-3 bg-dark d-none d-lg-block">
                <a href="index.html" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                    <h1 class="m-0 display-4 text-primary text-uppercase">SSA</h1>
                </a>
            </div>
            <div class="col-lg-9">
                {{-- <div class="row gx-0 bg-secondary d-none d-lg-flex"> --}}
                    {{-- <div class="col-lg-7 px-5 text-start">
                        <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                            <i class="fa fa-envelope text-primary me-2"></i>
                            <h6 class="mb-0">admin@gymapp.com</h6>
                        </div>
                        <div class="h-100 d-inline-flex align-items-center py-2">
                            <i class="fa fa-phone-alt text-primary me-2"></i>
                            <h6 class="mb-0">+085172839010</h6>
                        </div>
                    </div> --}}
                    {{-- <div class="col-lg-5 px-5 text-end">
                        <div class="d-inline-flex align-items-center py-2">
                            <a class="btn btn-light btn-square rounded-circle me-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="btn btn-light btn-square rounded-circle me-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="btn btn-light btn-square rounded-circle me-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="btn btn-light btn-square rounded-circle me-2" href="">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a class="btn btn-light btn-square rounded-circle" href="">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div> --}}
                {{-- </div> --}}
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0 px-lg-5">
                    <a href="index.html" class="navbar-brand d-block d-lg-none">
                        <h1 class="m-0 display-4 text-primary text-uppercase">Sanggar Senam Athena</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            @if(Route::is('homepage'))
                            <a href="#home" class="nav-item nav-link {{Route::is('homepage')?'active':''}}">Home</a>
                            <a href="#tentangkami" class="nav-item nav-link">Tentang Kami</a>
                            <a href="#kelas" class="nav-item nav-link">Kelas</a>
                            <a href="#event" class="nav-item nav-link">Event</a>
                            <a href="#pelatih" class="nav-item nav-link">Pelatih Kami</a>
                            @else
                            <a href="{{route('homepage')}}" class="nav-item nav-link">Home</a>
                            @endif
                        </div>
                        <a href="{{ route('login') }}" class="btn btn-primary py-md-3 px-md-5 d-none d-lg-block">Login</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Header End -->
