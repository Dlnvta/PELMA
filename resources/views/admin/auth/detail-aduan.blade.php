@extends('layouts.main')
@section('title', 'PELMA')

@section('content')
<!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Detail Pengaduan</h1>
	        <div class="row">
	        	<div class="col-lg-8 mb-4">
		            <!-- Approach -->
		            <div class="card shadow mb-4">
		                <div class="card-header py-3">
		                    <h6 class="m-0 font-weight-bold text-primary">{{ $pengaduan->judul_pengaduan }}</h6>
		                </div>
		                <div class="card-body">
		                	<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" src="{{ url( $pengaduan->foto ) }}" alt="">
							<li class="list-group-item">
		                  	<ul class="list-group list-group-flush">  
		                  		<li class="list-group-item">Status : @if($pengaduan->status == 'pending')
								<p class="badge badge-pill badge-warning mx-4">{{$pengaduan->status}} </p>
								@elseif($pengaduan->status == 'proses')
								<p class="badge badge-pill badge-primary mx-4">{{$pengaduan->status}} </p>
								@else($pengaduan->status == 'selesai')
								<p class="badge badge-pill badge-success mx-4">{{$pengaduan->status}} </p>
								@endif </li>
		                  		<li class="list-group-item">Tanggal : {{ $pengaduan->tanggal_pengaduan }}</li>
								  <li class="list-group-item">Lokasi : {{ $pengaduan->lokasi }}</li>
		                  		<li class="list-group-item">Nama : {{ $pengaduan->users->name }}</li>
		                  		<li class="list-group-item">Isi Pengaduan : {{ $pengaduan->isi_pengaduan }}</li>
		                  	</li>
		                  	</ul>
		                </div>
		            </div>
		        </div>
	        </div>

    </div>
@endsection