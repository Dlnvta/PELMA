<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Pengaduan;
use App\Tanggapan;
use App\Role;
use Auth;

class BerandaController extends Controller
{
	//Data Pengaduan Tanggapan Masyarakat Petugas
	public function index() {

    	$user 				= Auth::user();
    	$pengaduan 			= Pengaduan::all();
		$jumlah_pengaduan 	= Pengaduan::all()->count();
		$tanggapan 			= Tanggapan::all()->count();
		$petugas			= Role::find(2)->users->count();
		$masyarakat 		= Role::find(3)->users->count();

    	return view ('admin.beranda.index',[
    		'user' 				=> $user,
    		'pengaduan' 		=> $pengaduan,
			'jumlah_pengaduan' 	=> $jumlah_pengaduan,
			'tanggapan' 		=> $tanggapan,
			'petugas' 			=> $petugas,
			'masyarakat' 		=> $masyarakat
    	]);
    }
}

