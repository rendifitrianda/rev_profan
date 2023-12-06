<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed layout-compact " dir="ltr" data-bs-theme="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PROF4N</title>
    <link rel="stylesheet" href="{{ url('public') }}/assets/plugins/font-family/font.css">
    <link rel="stylesheet" href="{{ url('public') }}/assets/plugins/fontawesome/css/all.css">
    <link rel="stylesheet" href="{{ url('public') }}/assets/css/app-login.css">

</head>

<body class="login-screen">

    <div class="login-box">
        <div class="login-header">
            <img src="{{ url('public') }}/assets/image/dark-logo.png" alt="">
            <img src="{{ url('public') }}/assets/image/full-dark-logo.png" alt="">
        </div>
        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="leading">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="form-line">
                            <input type="email" name="email" value="{{ old('email') }}" id="email"
                                placeholder="Masukan email ..."
                                class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <span class="invalid-fedback text-danger float-end"><i>{{ $message }}</i></span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="leading">
                            <i class="fa fa-lock"></i>
                        </div>
                        <div class="form-line">
                            <input type="password" name="password" id="password" placeholder="Masukan password ..."
                                class="form-control  @error('password') is-invalid @enderror">
                            @error('password')
                                <span class="invalid-fedback text-danger float-end"><i>{{ $message }}</i></span>
                            @enderror
                        </div>
                        <div class="trailing">
                            <i class="fa fa-eye-slash"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-block btn-primary">LOGIN</button>
                </div>
            </div>
        </form>
    </div>

    <script src="{{ url('public') }}/assets/js/jquery-3.7.1.min.js"></script>
    <script src="{{ url('public') }}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="{{ url('public') }}/assets/js/theme.js"></script>

</body>

</html>
