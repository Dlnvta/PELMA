@extends('layouts.main')
@section('title', 'PELMADA')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
        <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Detail Pengaduan dan Tanggapan</h1>
	    <div class="row">
		    <div class="col-lg-6">
			    <div class="card shadow mb-4">
			        <!-- Card Header - Accordion -->
			        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
			            role="button" aria-expanded="true" aria-controls="collapseCardExample">
			            <h6 class="m-0 font-weight-bold text-primary">{{ $pengaduan->judul_pengaduan }} di {{ $pengaduan->lokasi }}</h6>
			        </a>
			        <!-- Card Content - Collapse -->
			        <div class="collapse show" id="collapseCardExample">
			            <div class="card-body">
			            	<div class="text-center">
			            		<img class="img-fluid px-3 px-sm-4 mt-3 mb-4"
	                                            src="{{ url( $pengaduan->foto ) }}" alt="">
			            	</div>
			            	<small>{{ $pengaduan->tanggal_pengaduan }}</small>
			            	<p>{{ $pengaduan->isi_pengaduan }}</p>
			            	<p>Detail lokasi : {{ $pengaduan->detail_lokasi }}</p>
			            </div>
			        </div>
			    </div>
		    </div>

		    <div class="col-lg-6">
			    <div class="card shadow mb-4">
			        <!-- Card Header - Accordion -->
			        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
			            role="button" aria-expanded="true" aria-controls="collapseCardExample">
			            <h6 class="m-0 font-weight-bold text-primary">Tanggapan Petugas</h6>
			        </a>
			        <!-- Card Content - Collapse -->
			        <div class="collapse show" id="collapseCardExample">
			            <div class="card-body">
			            	<ul class="list-group">
			            		@foreach ( $tanggapan as $item )
							  <li class="list-group-item d-flex justify-content-between align-items-center">
							    {{ $item->isi_tanggapan }}
							    <span class="badge badge-primary badge-pill">{{ $item->name }}</span>
							  </li>
							  @endforeach
							</ul>
			            </div>
			        </div>
			    </div>
		    </div>
	    </div>
</div>
@endsection