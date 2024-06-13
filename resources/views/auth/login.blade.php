<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Purchase Return - Dashboard</title>
    <link href="{{ asset('storage/default') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('storage/default') }}/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="{{ asset('storage/default/') }}/libs/select2/css/select2.min.css" rel="stylesheet" />
    


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                       
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block" style="margin-top: 50px;margin-left: 5%;">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ asset('storage/default/img/purchase-order.jpeg') }}" alt="Purchase Order" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-5">
                                
                                <div class="p-5">
                                   
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    @include('layouts.notif')
                                    <form method="POST" action="{{ route('auth.store') }}">
                                        @csrf
                        
                                        <div class="form-group">
                                            <label for="email">{{ __('E-Mail Address') }}</label>
                                            <input id="email" type="email"  class="form-control" placeholder="Enter your email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="password">{{ __('Password') }}</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control pe-5 password-input" onpaste="return false"
                                                    placeholder="Enter your password" aria-describedby="passwordInput"
                                                    name="password">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-primary" type="button" id="togglePassword">
                                                            <i class="fas fa-fw fa-eye"></i>
                                                        </button>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>
                        
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('storage/default') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('storage/default') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="{{ asset('storage/default') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('storage/default') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('storage/default') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="{{ asset('storage/default') }}/js/sb-admin-2.min.js"></script>
    <script src="{{ asset('storage/default') }}/vendor/chart.js/Chart.min.js"></script>
    <script src="{{ asset('storage/default') }}/js/demo/chart-area-demo.js"></script>
    <script src="{{ asset('storage/default') }}/js/demo/chart-pie-demo.js"></script>
    <script src="{{ asset('storage/default') }}/js/app.js"></script>
    <script src="{{ asset('storage/default/') }}/libs/select2/js/select2.min.js"></script>
    
    <script>
         document.getElementById('togglePassword').addEventListener('click', function() {
        const input = document.querySelector('input[name="password"]');
        input.type = input.type === 'password' ? 'text' : 'password';
    });
    </script>


</body>

</html>