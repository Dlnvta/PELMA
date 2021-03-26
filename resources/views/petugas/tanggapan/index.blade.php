@extends('layouts.main')
@section('title', 'PELMA')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
        <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tanggapan</h1>
	    <div class="row">
		    <div class="col-lg">
			    <div class="card shadow mb-4">
			        <!-- Card Header - Accordion -->
			        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
			            role="button" aria-expanded="true" aria-controls="collapseCardExample">
			            <h6 class="m-0 font-weight-bold text-primary">{{ $pengaduan->judul_pengaduan }} - {{ $pengaduan->lokasi }} </h6>
			        </a>
			        <!-- Card Content - Collapse -->
			        <div class="collapse show" id="collapseCardExample">
			            <div class="card-body">
			            	<div class="text-center">
			            		<img class="img-fluid px-3 px-sm-4 mt-3 mb-4"
	                                            src="{{ url( $pengaduan->foto ) }}" alt="">
			            	</div>

			            	<small>{{ $pengaduan->tanggal_pengaduan }}</small>
							@if($pengaduan->status == 'pending')
							<p class="badge badge-pill badge-warning mx-4">{{$pengaduan->status}} </p>
							@elseif($pengaduan->status == 'proses')
							<p class="badge badge-pill badge-primary mx-4">{{$pengaduan->status}} </p>
							@else($pengaduan->status == 'selesai')
							<p class="badge badge-pill badge-success mx-4">{{$pengaduan->status}} </p>
							@endif
							
			            	<p>{{ $pengaduan->isi_pengaduan }}</p>
			            </div>
			        </div>
			    </div>
		    </div>
	    </div>
	    <div class="row">
		    <div class="col-lg-6">
			    <div class="card shadow mb-4">
			        <!-- Card Header - Accordion -->
			        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
			            role="button" aria-expanded="true" aria-controls="collapseCardExample">
			            <h6 class="m-0 font-weight-bold text-primary">Tanggapan</h6>
			        </a>
			        <!-- Card Content - Collapse -->
			        <div class="collapse show" id="collapseCardExample">
			            <div class="card-body">
			            	<form action="{{ route('petugas.tanggapan.kirim') }}" method="post">
			            		@csrf
							  	<div class="form-group">
							    <input type="hidden" class="form-control" id="pengaduan_id" name="pengaduan_id" aria-describedby="emailHelp" value="{{ $pengaduan->id }}">
							    <label for="exampleInputEmail1">Tulis Tanggapan</label>
							    <input type="text" class="form-control form-control-user @error('isi_tanggapan') is-invalid @enderror" id="tanggapan" name="isi_tanggapan" aria-describedby="emailHelp">
								@error('isi_tanggapan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror 
								</div>
								<div class="form-group form-control-user @error('status') is-invalid @enderror">
										<select class="form-control" id="status" name="status">
										<option value=""><i>Status</i></option>
										<option value="pending">Pending</option>
										<option value="proses">Proses</option>
										<option value="selesai">Selesai</option>
										</select>
									@error('status')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
									@enderror  
								</div>
							  <button type="submit" class="btn btn-primary">Submit</button>
							</form>
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