@extends ('layouts/main')
@section ('title', 'PELMA')

@section ('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Beranda</h1>
	@if(!Auth::user()->email_verified_at)
		<div class="alert alert-danger" role="alert">
			Email anda belum terverifikasi Cek email anda, atau
			<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
				@csrf
				<button type="submit" class="btn-btn-link p-0 m-0 align-baseline">{{ _('verifikasi ulang') }} </button>
			</form>
		</div>
	@endif

	@if(session('resent'))
		<div class="alert-success alert-dismissible fade show" role="alert">
			<strong> Email dikirim ulang!</strong> Silahkan cek email anda
			<button type="button" class="close" data-dismiss="alert" arial-label="close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif
			<div class="row">
				<div class="col-lg-6">
					@foreach( $pengaduan as $item )
						<div class="card shadow mb-4">
							<!-- Card Header - Accordion -->
							<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
								role="button" aria-expanded="true" aria-controls="collapseCardExample">
								<h6 class="m-0 font-weight-bold text-primary"> {{ $item->users->name}} - {{ $item->judul_pengaduan }}</h6>
							</a>
							<!-- Card Content - Collapse -->
							<div class="collapse show" id="collapseCardExample">
								<div class="card-body">
									<div class="text-center">
										<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
											src="{{ url( $item->foto) }}" alt="">
											</div>
											<small?>{{ $item->tanggal_pengaduan }}</small>
											@if($item->status == 'pending')
												<p class="badge badge-pill badge-warning mx-4">{{$item->status}} </p>
												@elseif($item->status == 'proses')
												<p class="badge badge-pill badge-primary mx-4">{{$item->status}} </p>
												@else($item->status == 'selesai')
												<p class="badge badge-pill badge-success mx-4">{{$item->status}} </p>
												@endif
												<p>{{ $item->isi_pengaduan }}</p>
												<a href="{{ route('masyarakat.tanggapan', $item->id) }}"> Detail &rarr;</a>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		
</div>

@endsection                