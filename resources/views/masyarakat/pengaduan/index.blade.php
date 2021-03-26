@extends('layouts.main')
@section('title', 'PELMA')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
        <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Pengaduan</h1>
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
		        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
		            role="button" aria-expanded="true" aria-controls="collapseCardExample">
		            <h6 class="m-0 font-weight-bold text-primary">Form Pengaduan</h6>
		        </a>
		        <!-- Card Content - Collapse -->
		        <div class="collapse show" id="collapseCardExample">
		            <div class="card-body">
		            	<form method="post" action="{{ route('masyarakat.aduan.kirim') }}" enctype="multipart/form-data">
		            		@csrf
						  <div class="form-group">
						    <label for="exampleInputEmail1">Judul Pengaduan</label>
						    <input name="judul_pengaduan" type="text" class="form-control @error('judul_pengaduan') is-invalid @enderror" placeholder="Judul Pengaduan">


                            @error('judul_pengaduan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						  </div>

						  <div class="form-group">
						    <label for="exampleInputEmail1">NIK</label>
						    <input name="nik" type="text" class="form-control" readonly value="{{ Auth::user()->nik }}">
						  </div>
						  

						  <div class="form-group">
						    <label for="exampleInputPassword1">Isi Pengaduan</label>
						    <textarea name="isi_pengaduan" type="text" class="form-control @error('isi_pengaduan') is-invalid @enderror" placeholder="Isi Aduan"></textarea>

						    @error('isi_pengaduan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						  </div>

						  <div class="form-group">
						    <label for="exampleInputEmail1">Lokasi</label>
						    <select name="lokasi" type="text" class="form-control @error('lokasi') is-invalid @enderror">
								<option value=""> Pilih lokasi </option>
								@foreach( $desa as $item)
								<option value="{{ $item->lokasi }}"> {{ $item->lokasi}} </option>
								@endforeach
							</select>

							@error('lokasi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						  </div>

						  <div class="form-group">
						    <label for="exampleFormControlFile1">Bukti</label>
						    <input name="foto" type="file" class="form-control @error('foto') is-invalid @enderror" id="exampleFormControlFile1">
							@error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						    <small id="emailHelp" class="form-text text-muted">File bukti wajib diisi</small>
						  </div>

						  <button type="submit" class="btn btn-primary">Submit</button>
						</form>
		            </div>
		        </div>
		    </div>
	    </div>

		<div class="col-lg-5">
			<div class="card shadow mb-4">
				<a href="#collapsCardExample" class="d-block card-header py-3 alert-primary" data-toggle="collapse"
				 role="button" aria-expanded="true" aria-controls="collapseCardExample">
				 <h6 class="m-0 font-weight-bold text-primary"> Pengaduan Saya</h6>
				</a>
				<div class="collapse show" id="collapseCardExample">
					<div class="card-body"> 
		                    <table class="table table-bordered" id="dataTable" width="100%" cellspasing="0">
							  <thead>
							    <tr>
							      <th scope="col">No</th>
							      <th scope="col">Lokasi</th>
							      <th scope="col">Judul Pengaduan</th>
							      <th scope="col">Status</th>
							      <th scope="col">Aksi</th>

							    </tr>
							  </thead>
							  <tbody>
							  	@foreach ($pengaduan as $item)
							    <tr>
							      <th scope="row">{{ $loop->iteration }}</th>
							      <td>{{ $item->lokasi }}</td>
							      <td>{{ $item->judul_pengaduan }}</td>
							      <td>{{ $item->status }}</td>
								  <td>
								  <a class="badge badge-primary" href="{{ route('masyarakat.pengaduan', $item->id) }}"> Detail</a>
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
@endsection