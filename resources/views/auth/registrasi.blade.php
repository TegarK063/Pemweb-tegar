<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mahahahahahh</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/tamplate/css/sb-admin-2.min.css') }}" rel="stylesheet">

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
                            <div class="col-lg-6">
                                <div class="logo-images">
                                    <img class="img-fluid"
                                        src="assets/img/105-pngtree-shopping-on-mobile-png-image_5354478.jpg"
                                        style="" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('registrasi.submit') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Nama Lengkap</label>
                                            <input type="text" name="name" class="form-control mb-2">
                                            <label for="name">Username</label>
                                            <input type="email" name="email" class="form-control mb-2">
                                            <label for="name">Password</label>
                                            <input type="password" name="password" class="form-control mb-2">
                                            <label for="role">Role</label>
                                            <select name="role" required class="form-control mb-2">
                                                <option value="user">User</option>
                                                <option value="admin">Admin</option>
                                                <option value="mahasiswa">Mahasiswa</option>
                                                <option value="dosen">Dosen</option>
                                            </select>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">
                                            Registrasi
                                        </button>
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route ('login.tampil') }}">Have account ?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/tamplate/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/tamplate/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/tamplate/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/tamplate/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
