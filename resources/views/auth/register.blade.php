<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pengaduan | Register</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="row justify-content-center">
         <div class="col-lg-5">
            <div style="margin-top: 120px;">
                <div class="container">
                    <div class="card o-hidden border-0 shadow-lg my-5 ">
                        <div class="card-body p-0">

                         <!-- Nested Row within Card Body -->
                         <div class="p-4">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">BUAT AKUN</h1>
                            </div>

                            <form method="POST" action="{{ route('register') }}" class="user">
                                @csrf
                                <div class="div row">
                                <div class="col-sm-6 mb-3">
                                        <input onkeypress="return hanyaAngka(event)" type="text" class="form-control form-control-user @error('nik') is-invalid @enderror" 
                                        name="nik" placeholder="NIK" value="{{ old('nik') }}" autofocus>

                                        @error('nik')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        
                                    </div>  
                                    <div class="col-sm-6">
                                        <input onkeypress="return event.charCode < 48 || event.charCode > 57" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" 
                                        id="name" aria-describedby="nameHelp" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" 
                                        required autocomplete="name" >

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        
                                    </div>
                            
                                </div>

                                <div class="from-group row">
                                    <div class="col-sm-6 mb-3">
                                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" 
                                        id="" aria-describedby="emailHelp" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror  

                                    </div>   
                                    
                                    <div class="col-sm-6">
                                        <input onkeypress="return hanyaAngka(event)" type="text" class="form-control form-control-user @error('telp') is-invalid @enderror" name="telp" placeholder="No Telp" value="{{ old('telp') }}">

                                        @error('telp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        
                                    </div>
                                </div>

                                <div class="div row">
                                    <div class="col-sm-6 mb-3">
                                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                        id="password" aria-describedby="passwordHelp" name="password" placeholder="Password" value="{{ old('password') }}" required autocomplete="password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror  

                                    </div>
                                    <div class="col-sm-6">
                                        <input id="password-confirm" type="password" class="form-control form-control-user" 
                                        name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi Password">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block"> {{ __('Daftar') }} </button>
                                <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}"> Sudah Punya Akun? Masuk!</a>
                                    </div>
                            </form>
                            
                        </div>
                     </div>
                 </div>    
             </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <script>
    function hanyaAngka(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode 
    if (charCode > 31 && (charCode < 48 || charCode >57))

    return false;
    return true;
    }
</script>

</body>
 
</html>
