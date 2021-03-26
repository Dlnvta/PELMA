@extends ('layouts/main')
@section ('title', 'PELMA')

@section ('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Beranda</h1>

		<div class="row">
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Pengaduan</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_pengaduan }}</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-book fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tanggapan</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tanggapan }}</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-comment fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Masyarakat</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $masyarakat }}</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Petugas</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $petugas }}</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-user fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
<div class="col-lg-6">
	
</div>
</div>
@endsection                
