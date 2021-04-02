@extends('layouts.main')
@section('title', 'PELMADA')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
        <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Profile</h1>
    @if (session('status'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
    	<strong>Berhasil!</strong> {{ session('status') }}
    </div>
    @endif

    <div class="row">
	    <div class="col-lg-6">
		    <div class="card shadow mb-4">
		        <!-- Card Header - Accordion -->
		        <a href="#collapseCardExample" class="d-block card-header py-3 alert-primary" data-toggle="collapse"
		            role="button" aria-expanded="true" aria-controls="collapseCardExample">
		            <h6 class="m-0 text-primary-800">Form Edit Profile</h6>
		        </a>
		        <!-- Card Content - Collapse -->
		        <div class="collapse show" id="collapseCardExample">
		            <div class="card-body">
		            	<form method="post" action="{{ route('petugas.profile.update', $user->id) }}" enctype="multipart/form-data">
		            		@method('patch')
		            		@csrf

						  <div class="form-group">
						    <label for="exampleInputEmail1">NIk</label>
						    <input onkeypress="return hanyaAngka(event)" name="nik" type="text" class="form-control @error('nik') is-invalid @enderror" 
                            value="{{ $user->nik }}">

                            @error('nik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						  </div>

						  <div class="form-group">
						    <label for="exampleInputEmail1">Nama Lengkap</label>
						    <input onkeypress="return event.charCode < 48 || event.charCode > 57" name="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                            value="{{ $user->name }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						  </div>

                          <div class="form-group">
						    <label for="exampleInputEmail1">Email</label>
						    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                            readonly value="{{ $user->email }}">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						  </div>

                          <div class="form-group">
						    <label for="exampleInputEmail1">No Telp</label>
						    <input onkeypress="return hanyaAngka(event)" name="telp" type="text" class="form-control @error('telp') is-invalid @enderror" 
                            value="{{ $user->telp }}">

                            @error('telp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						  </div>

						  <button type="submit" class="btn btn-primary">Edit</button>

						</form>
		            </div>
		        </div>
		    </div>
	    </div>

        <!-- Detail Profile --> 
         <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Profile Saya</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush"> 
                        <li class="list-group-item">Nama : {{ $user->name }}</li>
                            <li class="list-group-item">NIK : {{ $user->nik }}</li>
                            <li class="list-group-item">Telp : {{ $user->telp }}</li>
                            <li class="list-group-item">Email : {{ $user->email }}</li>
                            <li class="list-group-item">
                        </li>
                    </ul>
                </div>
            </div>
        </div>      	    
    </div>
</div>

<script>
    function hanyaAngka(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode 
    if (charCode > 31 && (charCode < 48 || charCode >57))

    return false;
    return true;
}
</script>

@endsection