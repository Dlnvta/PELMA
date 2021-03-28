@extends('layouts.main')
@section('title', 'PELMA')

@section('content')
<!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Data Masyarakat</h1>
		@if (session('status'))
			<div class="alert alert-primary alert-dismissible fade show" role="alert">
				<strong>Berhasil!</strong> {{ session('status') }}
				<button type="button" class="close" data-dismis="alert" aria-lable="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			@endif
	        <div class="row">
	        	<div class="col-lg-8 mb-4">
	            <!-- Approach -->
		            <div class="card shadow mb-4">
		                <div class="card-header py-3">
		                    <h6 class="m-0 font-weight-bold text-primary">
							<form class="form-inline ">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                            </form>
							</h6>
		                </div>
		                <div class="card-body">
		                    <table class="table table-bordered" id="dataTable" width="100%" cellspasing="0">
							  <thead>
							    <tr>
							      <th scope="col">No</th>
							      <th scope="col">Nama</th>
							      <th scope="col">Email</th>
							      <th scope="col">Aksi</th>
							    </tr>
							  </thead>
							  <tbody>
							  	@foreach ($masyarakat as $item)
							    <tr>
							      <th scope="row">{{ $loop->iteration }}</th>
							      <td>{{ $item->name }}</td>
							      <td>{{ $item->email }}</td>
							      <td>
							      	<a class="badge badge-primary" href="{{ route('admin.detail.masyarakat', $item->id) }}">Detail</a>
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
@endsection