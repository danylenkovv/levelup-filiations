<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Filiations</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/css/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <h1 class="card-header text-center"><b>Filiations</b></h1>
            <div class="card-body">
                <p class="login-box-msg">Login to start your session</p>
                <form action="{{ route('login') }}" method="post">
                    {{@csrf_field()}}
                    <div class="input-group mb-3">
                        <input type="text" name="login" class="form-control {{ $errors->has('login') ? 'is-invalid' : '' }}" placeholder="Login" value="{{ old('login') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('login'))
                    <div class="alert alert-danger">
                        {{ $errors->first('login') }}
                    </div>
                    @endif

                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('password'))
                    <div class="alert alert-danger">
                        {{ $errors->first('password') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/js/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
