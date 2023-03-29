<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Admin</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">

                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-7">
                                <div class="p-5">
                                    @if (session()->has('loginError'))
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            {{ session('loginError') }}
                                            <button type="button" class="btn btn-close"></button>
                                        </div>
                                    @endif
                                    <div class="text-center">
                                        {{-- <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1> --}}
                                        @if (session()->has('error'))
                                            <div class="col-lg-15 alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ session('error') }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif

                                        @if (session()->has('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session('success') }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        
                                    </div>
                                    <form class="user" method="POST" action="/admin/login">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user @error('username')
                                                is-invalid
                                            @enderror"
                                                id="username" aria-describedby="username" name="username"
                                                placeholder="Enter Username..." required autofocus value="{{ old('username') }}">

                                                @error('username')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user @error('password')
                                                is-invalid
                                            @enderror"
                                                id="password" placeholder="Password" name="password" required>
                                                
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    {{-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> --}}
                                    {{-- <div class="text-center">
                                        <a class="small" href="/admin/register">Create an Account!</a>
                                    </div> --}}
                                    <a href="javascript:history.back()" class="small">
                                        <i class="bi bi-arrow-left"></i>
                                        Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>
</body>
</html>