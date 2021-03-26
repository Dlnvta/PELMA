<?php

namespace App\Http\Controllers\Petugas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pengaduan;
use App\Tanggapan;
use App\Role;
use App\User;
use App\Lokasi;
use Carbon\Carbon;
use Auth;
use DB;

class AduanController extends Controller
{
    //Semua Pengaduan
    public function index()
    {
        $pengaduan      = Pengaduan::orderBy('id','DESC')->paginate(100);
        $user           = Auth::user();

        return view('petugas.pengaduan.index', [
        'pengaduan'     => $pengaduan,
        'user'          => $user
        ]);
    }

    //Detail Pengaduan
    public function detail($id)
    {
        $pengaduan      = Pengaduan::find($id);
        $user           = Auth::user();
        $tanggapan      = DB::table('tanggapans')
        ->join('users', 'users.id', '=', 'tanggapans.user_id')
        ->join('pengaduans', 'pengaduans.id', '=', 'tanggapans.pengaduan_id')
        ->select('users.*', 'pengaduans.*', 'tanggapans.*', DB::raw('users.name AS nama_user'))
        ->where('pengaduan_id', $id)
        ->get();

        return view('petugas.aduan.detail', [
            'pengaduan' => $pengaduan,
            'tanggapan' => $tanggapan,
            'user'      => $user
        ]);
    }

    //Bikin Tanggapan
    public function tanggapan($id)
    {
        $pengaduan      = Pengaduan::find($id);
        $user           = Auth::user();
        $tanggapan      = DB::table('tanggapans')
        ->join('users', 'users.id', '=', 'tanggapans.user_id')
        ->join('pengaduans', 'pengaduans.id', '=', 'tanggapans.pengaduan_id')
        ->select('users.*', 'pengaduans.*', 'tanggapans.*', DB::raw('users.name AS nama_user'))
        ->where('pengaduan_id', $id)
        ->get();

        return view('petugas.tanggapan.index', [
            'pengaduan' => $pengaduan,
            'user'      => $user,
            'tanggapan' => $tanggapan
        ]);
    }

    //Kirim Tanggapan
    public function tanggapan_kirim(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'isi_tanggapan' => 'required',
            'pengaduan_id'  => 'required',
            'status'        => 'required',
        ], [
            'isi_tanggapan.required'    =>'wajib diisi',
            'status_required'           => 'wajib diisi',3
        ]);
        

        Tanggapan::create([
            'user_id'           => Auth::id(),
            'tanggal_tanggapan' => Carbon::now(),
            'isi_tanggapan'     => $request->isi_tanggapan,
            'pengaduan_id'      => $request->pengaduan_id,
        ]);

            $update             = $pengaduan->find($request->pengaduan_id)->update([
            'status'            => $request->status
        ]);

        return redirect()->back();
    }
}
