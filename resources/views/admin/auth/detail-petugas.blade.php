@extends ('layouts/main')
@section ('title', 'Admin')

@section ('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Detail Petugas</h1>
                    <div class="row">
                        <div class="col-lg-8 mb-4">
                            <div class="card shadow mb-4">
                                    <div  div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Petugas</h6>
                                    </div>
                                <div class="card-body"> 
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"> Nama   : {{ $user->name}}</li>
                                        <li class="list-group-item"> NIK    : {{ $user->nik}}</li>
                                        <li class="list-group-item"> Telp   : {{ $user->telp}}</li>
                                        <li class="list-group-item"> Email  : {{ $user->email}}</li>
                                        <li class="list-group-item">
                                            <div class="row">
                                                <form action="{{ route ('admin.nonaktif.petugas', $user->id) }}" method="post">
                                                @method ('delete')
                                                @csrf
                                                <button type="submit" class="mx-2 btn btn-danger" onclick="return confirm('Yakin?');">
                                                Hapus </button>  
                                                </form>
                                                <a href="{{ route('admin.petugas') }}" class="mx-1 btn btn-success">Kembali</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    
    </div>
@endsection