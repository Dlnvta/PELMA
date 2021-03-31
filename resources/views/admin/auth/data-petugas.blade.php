@extends('layouts.main')
@section('title', 'PELMA')

@section('content')

<!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        @if (session('status'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
    	<strong>Berhasil</strong> {{ session('status') }}
    </div>
    @endif
        <h1 class="h3 mb-4 text-gray-800">Data Petugas</h1>
            
        <button href="{{ route('admin.petugas.kirim') }}" class="my-3 d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle="modal" data-target="#exampleModal"><i
            class="fas fa fa-sm text-white-50"></i>Tambah Petugas</button>
	        <div class="row">
	        	<div class="col-lg-12 mb-4">
		            <div class="card shadow mb-4">
						<div class="card-header py-3">
		                    <h6 class="m-0 font-weight-bold text-gray-800">Petugas</h6>
		                </div>
						<div class="row">
							<div class="card-body">
			                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								  <thead>
								    <tr>
								      <th scope="col">No</th>
								      <th scope="col">Nama</th>
								      <th scope="col">Email</th>
								      <th scope="col">Role</th>
								      <th scope="col">Aksi</th>
								    </tr>
								  </thead>
								  <tbody>
								  	@foreach ($petugas as $item)							  	
								    <tr>
								      <th scope="row">{{ $loop->iteration }}</th>
								      <td>{{ $item->name }}</td>
								      <td>{{ $item->email }}</td>
								      <td>{{ implode(', ', $item->roles()->get()->pluck('name')->toArray()) }}</td>
								      <td>
								      	<a class="badge badge-primary" href="{{ route('admin.detail.petugas', $item->id) }}">Detail</a>
								      </td>
								    </tr>
								    @endforeach
								  </tbody>
								</table>
			                </div>
						</div>	                
		            </div>
		        </div>
	        </div>

        </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                <form action="{{ route ('admin.petugas.kirim') }}" method="post">
                    @csrf
            
                    <!-- NIK -->
                    <div class="form-group">
                        <input onkeypress="return hanyaAngka(event)" type="text" class="form-control form-control-user @error('nik') is-invalid @enderror"
                        name="nik" placeholder="NIK" value="{{ old('nik') }}">

                        @error('nik')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                     <!-- Name -->
                     <div class="form-group">
                        <input onkeypress="return event.charCode < 48 || event.charCode > 57" type="text" class=" form-control form-control-user @error('name') is-invalid @enderror" 
                        id="name" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" 
                        required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
						    <select name="role" type="text" class="form-control @error('role') is-invalid @enderror">
								<option value=""> Role </option>
								<option value="admin"> Admin </option>
								<option value="petugas"> Petugas </option>
							</select>

							@error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						  </div>
                    <!-- Email -->
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('email') is-invalid @enderror"
                        name="email" placeholder="Email" value="{{ old('email') }}">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Telp -->
                    <div class="form-group">
                        <input onkeypress="return hanyaAngka(event)" type="text" class="form-control form-control-user @error('telp') is-invalid @enderror"
                        name="telp" placeholder="Telp" value="{{ old('telp') }}">

                        @error('telp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user @error('telp') is-invalid @enderror" 
                        name="password" placeholder="Password" value="{{ old('password') }}">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Ulangi Password -->
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" 
                        name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi Password">
                    </div>

                
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
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