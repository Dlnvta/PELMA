@extends('layouts.main')
@section('title', 'PELMA')

@section('content')
<!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Detail Masyarakat</h1>
	        <div class="row">
	        	<div class="col-lg-8 mb-4">
		            <!-- Approach -->
		            <div class="card shadow mb-4">
		                <div class="card-header py-3">
		                    <h6 class="m-0 font-weight-bold text-primary">Masyarakat</h6>
		                </div>
		                <div class="card-body">
		                  	<ul class="list-group list-group-flush"> 
		                  		<li class="list-group-item">Nama : {{ $masyarakat->name }}</li>
		                  		<li class="list-group-item">NIK : {{ $masyarakat->nik }}</li>
		                  		<li class="list-group-item">Telp : {{ $masyarakat->telp }}</li>
		                  		<li class="list-group-item">Email : {{ $masyarakat->email }}</li>
		                  		<li class="list-group-item">
		                  		</li>
		                  	</ul>
		                </div>
		            </div>
		        </div>
	        </div>

    </div>
@endsection