@extends('layouts.main')
@section('title', 'PELMA')

@section('content')
<!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Table</h1>
        <a href="{{ route('admin.report.user') }}" class="my-3 d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
	        <div class="row">
	        	<div class="col-lg-8 mb-4">
	            <!-- Approach -->
		            <div class="card shadow mb-4">
		                <div class="card-header py-3">
		                    <h6 class="m-0 font-weight-bold text-primary">Tabel user</h6>
		                </div>
		                <div class="card-body">
		                    <table class="table">
							  <thead>
							    <tr>
							      <th scope="col">No</th>
							      <th scope="col">Nama</th>
							      <th scope="col">Email</th>
							    </tr>
							  </thead>
							  <tbody>
							  	@foreach ($user as $item)
							    <tr>
							      <th scope="row">{{ $loop->iteration }}</th>
							      <td>{{ $item->name }}</td>
							      <td>{{ $item->email }}</td>
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