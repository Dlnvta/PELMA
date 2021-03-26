<?php

namespace App\Http\Controllers\Petugas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Pengaduan;
use App\Tanggapan;
use App\Role;
use Auth;

class BerandaController extends Controller
{
	//Beranda Petugas
    public function index() {

    	$user 					= Auth::user();
    	$pengaduan 				= Pengaduan::all();
		$jumlah_pengaduan 		= Pengaduan::all()->count();
		$pengaduan_proses 		= Pengaduan::where('status', 'proses')->count();
		$tanggapan 				= Tanggapan::all()->count();
		$masyarakat 			= Role::find(3)->users->count();

    	return view ('petugas.beranda.index',[
    		'user' 				=> $user,
    		'pengaduan' 		=> $pengaduan,
			'jumlah_pengaduan' 	=> $jumlah_pengaduan,
			'pengaduan_proses' 	=> $pengaduan_proses,
			'tanggapan' 		=> $tanggapan,
			'masyarakat' 		=> $masyarakat
    	]);
    }
}
