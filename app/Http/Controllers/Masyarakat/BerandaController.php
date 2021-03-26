<?php

namespace App\Http\Controllers\Masyarakat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Pengaduan;
use Auth;

class BerandaController extends Controller
{
	//Beranda Masyarakat
    public function index()
    {
    	$user 			= Auth::user();
    	$pengaduan 		= Pengaduan::orderBy('id','DESC')->paginate(100);

    	return view ('masyarakat.beranda.index',[
    		'user' 		=> $user,
    		'pengaduan' => $pengaduan
    	]);
    }
}
