<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register Admin</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="/register">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                        <label for="first_name" class="form-label">First Name</label>
                                          <input type="text" class="form-control form-control-user @error('first_name') is-invalid @enderror" placeholder="example: John" name="first_name" value="{{ old('first_name') }}">
                                            @error('first_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="last_name" class="form-label">Last Name</label>
                                          <input type="text" class="form-control form-control-user @error('last_name') is-invalid @enderror" placeholder="example: Doe" name="last_name" value="{{ old('last_name') }}">
                                            @error('last_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="no_telpon_wa" class="form-label">Nomor Telepon (Whatsapp)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="validationTooltipUsernamePrepend">+62</span>
                                        </div>
                                        <input type="text" name="no_telepon_wa" class="form-control form-control-user @error('no_telepon_wa') is-invalid @enderror" 
                                                id="no_telpon_wa" placeholder="example: 831 9097 7521" aria-describedby="validationTooltipUsernamePrepend" required
                                                value="{{ old('no_telepon_wa') }}">
                                        @error('no_telepon_wa')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="date" class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir" id="date" name="tgl_lagir" class="form-control form-control-user @error('tgl_lahir') is-invalid @enderror"
                                            required value="{{ old('tgl_lahir') }}">
                                    @error('tgl_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Gender</label>
                                    <select name="gender" class="form-control form-control-user @error('gender') is-invalid @enderror" id="exampleFormControlSelect1">
                                        <option disabled>Pilih jenis kelamin</option>
                                        <option value="pria">Pria</option>
                                        <option value="wanita">Wanita</option>
                                        <option value="secret">Tidak ingin memberi tahu</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                  </div>
                                <div class="form-group">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror" id="username"
                                        placeholder="example: johndoe" name="username" required autofocus value="{{ old('username') }}">
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email"
                                        placeholder="example: johndoe@gmail.com" name="email" required value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password"
                                        placeholder="Password harus terdiri minimal 4 karakter" name="password" required>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                                {{-- Repeat Password System --}}
                                {{-- <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="repeatPassword" placeholder="Repeat Password" name="repeatPassword">
                                    </div>
                                </div> --}}
                                <button class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            {{-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> --}}
                            <div class="text-center">
                                <a class="small" href="/login">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>