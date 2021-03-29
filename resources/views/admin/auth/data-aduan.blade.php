@extends('layouts.main')
@section('title', 'PELMA')

@section('content')
<!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Data Pengaduan</h1>
	        <div class="row">
	        	<div class="col-lg-8 mb-4">
	            <!-- Approach -->
		            <div class="card shadow mb-4">
		                <div class="card-header py-3">
		                    <h6 class="m-0 font-weight-bold text-primary">
							<form class="form-inline" action="{{ route ('admin.aduan.search') }}" method="post">
							@csrf
                                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
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
							      <th scope="col">Judul</th>
							      <th scope="col">Status</th>
							      <th scope="col">Aksi</th>
							    </tr>
							  </thead>
							  <tbody>
							  	@foreach ($pengaduan as $item)
							    <tr>
							      <th scope="row">{{ $loop->iteration }}</th>
							      <td>{{ $item->users->name }}</td>
							      <td>{{ $item->judul_pengaduan }}</td>
							      <td>{{ $item->status}}</td>
							      <td>
							      	<a class="badge badge-primary" href="{{ route('admin.detail.aduan', $item->id) }}">Detail</a>
							      </td>
							    </tr>
							    @endforeach
							  </tbody>
							</table>
							{{ $pengaduan->links() }}
		                </div>
		            </div>
		        </div>
	        </div>

    </div>
@endsection