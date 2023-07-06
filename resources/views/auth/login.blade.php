<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sanggar Senam Atheena | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  {{-- SweetAlert --}}
  <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
</head>
<body class="hold-transition login-page">

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
  <div class="login-box">
    <div class="login-logo">
      <a href="{{ route('homepage') }}"><b>Sanggar Senam Atheena</b> Login Page</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Silahkan masuk untuk masuk aplikasi</p>

        <form action="{{route('login')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              {{-- <a href="{{route('dashboard')}}" type="submit" class="btn btn-primary btn-block">Sign In</a> --}}
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
          <div class="row">
            <div class="col-12">
              <a href="{{ route('register') }}" class="text-center">don't have a membership</a>
            </div>
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

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
