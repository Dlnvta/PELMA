@extends('layouts.main')
@section('title', 'PELMA')

@section('content')
<!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Detail Pengaduan Saya</h1>
	        <div class="row">
	        	<div class="col-lg-12 mb-8 mx-1">
		            <!-- Approach -->
		            <div class="card shadow mb-4 col-lg-12">
		                <div class="card-header py-3">
		                    <h6 class="m-0 font-weight-bold text-primary">Pengaduan Saya</h6>
		                </div>
		                <div class="card-body">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4 " src="{{ url($pengaduan->foto) }}" alt="">
		                  	<ul class="list-group list-group-flush"> 
							  <li class="list-group-item">Status : @if($pengaduan->status == 'pending')
								<p class="badge badge-pill badge-warning mx-4">{{$pengaduan->status}} </p>
								@elseif($pengaduan->status == 'proses')
								<p class="badge badge-pill badge-primary mx-4">{{$pengaduan->status}} </p>
								@else($pengaduan->status == 'selesai')
								<p class="badge badge-pill badge-success mx-4">{{$pengaduan->status}} </p>
								@endif</li>
		                  		<li class="list-group-item">Tanggal : {{ $pengaduan->tanggal_pengaduan }}</li>
								  <li class="list-group-item">Lokasi : {{ $pengaduan->lokasi }}</li>
								  <li class="list-group-item">Detail Lokasi : {{ $pengaduan->detail_lokasi }}</li>
		                  		<li class="list-group-item">Nama : {{ $pengaduan->users->name }}</li>
		                  		<li class="list-group-item">Judul_pengaduan : {{ $pengaduan->judul_pengaduan }}</li>
		                  		<li class="list-group-item">Isi Pengaduan : {{ $pengaduan->isi_pengaduan }}</li>
		                  		
		                  		<li class="list-group-item">
		                  		</li>
		                  	</ul>
							  <div class="div row">
							  <a class=" mx-2 btn btn-primary " href="{{ route('masyarakat.edit', $pengaduan->id) }}"> Edit</a>
							  <form action="{{ route('masyarakat.hapus.pengaduan', $pengaduan->id) }}" method="post">
                                    @method ('delete')
                                    @csrf
									<button type="submit" class=" mx-1 btn btn-danger" onclick="return confirm('Yakin?');">
                                    Hapus </button>  
								</form>
							  <a class="mx-1 btn btn-success" href="{{ route('masyarakat.aduan') }}">Kembali</a>
							  
							</div>
		                </div>
		            </div>
		        </div>
	        </div>

    </div>
@endsection