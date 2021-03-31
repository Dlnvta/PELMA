@extends('layouts.main')
@section('title', 'PELMA')

@section('content')
<!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Laporan Pengaduan</h1>

        <div class="row">
        	<div class="col-lg-4">
		        <div class="form-group row">
				  	<label for="example-date-input" class="col-4 col-form-label">Tgl Awal</label>
					<div class="col-8">
				    	<input id="tglAwal" name="tglAwal" class="form-control" type="date" value="2021-08-08" id="example-date-input">
				  	</div>		
				</div>

				<div class="form-group row">		
				  	<label for="example-date-input" class="col-4 col-form-label">Tgl Akhir</label>
				  	<div class="col-8">
				    	<input id="tglAkhir" name="tglAkhir" class="form-control" type="date" value="2021-08-08" id="example-date-input">
					</div>
				</div>
				<div class="form-group float-right">
		        	<a class="d-none mb-1 d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="" onclick="this.href='/admin/pengaduan/report/tanggal/'+ document.getElementById('tglAwal').value + '/' + document.getElementById('tglAkhir').value" target="_blank" class="btn btn-primary btn-block">Cetak Laporan</a>
        		</div>
        	</div>

			<div class="col-lg-4">
				<div class="form-group row">
				  	<label for="example-date-input" class="col-4 col-form-label">Lokasi</label>
				    <select name="lokasi" type="text" class="col-8 form-control" id="lokasi">
				    	<option value="">Pilih Lokasi</option>
				    	@foreach($desa as $item)
				    	<option value="{{ $item->lokasi }}">{{ $item->lokasi }}</option>
				    	@endforeach
				    </select>
				</div>
				<div class="form-group">
			        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right" href="" onclick="this.href='/admin/pengaduan/report/lokasi/'+ document.getElementById('lokasi').value" target="_blank" class="btn btn-primary btn-block">Cetak Laporan</a>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group row">
				  	<label for="example-date-input" class="col-4 col-form-label">Status</label>
				    <select name="status" type="text" class="col-8 form-control" id="status">
				    	<option value="">Pilih Status</option>
				    	<option value="pending">pending</option>
				    	<option value="proses">proses</option>
				    	<option value="selesai">selesai</option>
				    </select>
				</div>
				<div class="form-group">
			        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right" href="" onclick="this.href='/admin/pengaduan/report/status/'+ document.getElementById('status').value" target="_blank" class="btn btn-primary btn-block">Cetak Laporan</a>
				</div>
			</div>

		</div>


	        <div class="row">
	        	<div class="col-lg mb-4">
	            <!-- Approach -->
		            <div class="card shadow mb-4">
		                <div class="card-body">
		                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							  <thead>
							    <tr>
							      <th scope="col">No</th>
							      <th scope="col">Tanggal</th>
							      <th scope="col">Lokasi</th>
							      <th scope="col">Nama</th>
							      <th scope="col">Judul Pengaduan</th>
							      <th scope="col">Status</th>
							    </tr>
							  </thead>
							  <tbody>
							  	@foreach ($pengaduan as $item)
							    <tr>
							      <th scope="row">{{ $loop->iteration }}</th>
							      <td>{{ $item->tanggal_pengaduan }}</td>
							      <td>{{ $item->lokasi }}</td>
							      <td>{{ $item->users->name }}</td>
							      <td>{{ $item->judul_pengaduan }}</td>
							      <td>{{ $item->status }}</td>
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