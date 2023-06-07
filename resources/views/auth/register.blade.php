
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
  {{-- SweetAlert --}}
  <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
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
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{ route('homepage') }}" class="h1"><b>Sanggar Senam Atheena</b> Register</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="{{ route('registerPost') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Full name" value="{{ old('name') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
            @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group mb-3">
          <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-house-user"></span>
            </div>
          </div>
          @error('tempat_lahir')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group mb-3">
          <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" placeholder="Tanggal Lahir" value="{{ old('tgl_lahir') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar"></span>
            </div>
          </div>
          @error('tgl_lahir')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group mb-3">
          <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" value="{{ old('jenis_kelamin') }}">
            <option value="" selected disabled>Pilih Jenis Kelamin</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-mars"></span>
            </div>
          </div>
          @error('jenis_kelamin')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group mb-3">
          <textarea name="alamat" id="alamat" cols="10" rows="2" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-address-book"></span>
            </div>
          </div>
          @error('alamat')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group mb-3">
          <input type="number" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" placeholder="Nomor Telepon" value="{{ old('no_telp') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
          @error('no_telp')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-danger btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.min.js')}}"></script>
<!-- Sweet Alert -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<!-- Toasr -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
    $(function() {
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
        });

        $('.swalDefaultSuccess').show(function() {
        Toast.fire({
            icon: 'success',
            title: '{{Session::get('alert')}}'
        })
        });
        $('.swalDefaultInfo').show(function() {
        Toast.fire({
            icon: 'info',
            title: '{{Session::get('alert')}}'
        })
        });
        $('.swalDefaultError').show(function() {
        Toast.fire({
            icon: 'error',
            title: '{{Session::get('alert')}}'
        })
        });
        $('.swalDefaultWarning').show(function() {
        Toast.fire({
            icon: 'warning',
            title: '{{Session::get('alert')}}'
        })
        });
        $('.swalDefaultQuestion').show(function() {
        Toast.fire({
            icon: 'question',
            title: '{{Session::get('alert')}}'
        })
        });
    });
</script>
</body>
</html>
