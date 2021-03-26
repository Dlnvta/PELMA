@extends('layouts.main')
@section('title', 'PELMA')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
        <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Profile</h1>
    @if (session('status'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
    	<strong>Berhasil!</strong> {{ session('status') }}
    	<button type="button" class="close" data-dismis="alert" aria-lable="Close">
    		<span aria-hidden="true">&times;</span>
    	</button>
    </div>
    @endif
    <div class="row">
	    <div class="col-lg-6">
		    <div class="card shadow mb-4">
		        <!-- Card Header - Accordion -->
		        <a href="#collapseCardExample" class="d-block card-header py-3 alert-primary" data-toggle="collapse"
		            role="button" aria-expanded="true" aria-controls="collapseCardExample">
		            <h6 class="m-0 text-primary-800">Form Edit Petugas</h6>
		        </a>
		        <!-- Card Content - Collapse -->
		        <div class="collapse show" id="collapseCardExample">
		            <div class="card-body">
            <form method="post" action="{{ route('admin.update', $user->id) }}" enctype="multipart/form-data">
		        @method('patch')
		        @csrf
                    <!-- Name -->
                    <div class="form-group">
                        <input type="text" class=" form-control form-control-user @error('name') is-invalid @enderror" 
                        id="name" name="name" placeholder="Nama Lengkap" value="{{ $user->name }}" 
                        required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- NIK -->
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('nik') is-invalid @enderror"
                        name="nik" placeholder="NIK" value="{{ $user->nik }}">

                        @error('nik')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('email') is-invalid @enderror"
                        name="email" placeholder="Email" value="{{ $user->email }}">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Telp -->
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('telp') is-invalid @enderror"
                        name="telp" placeholder="Telp" value="{{ $user->telp }}">

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
    </div>
</div>
@endsection