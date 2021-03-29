<?php

namespace App\Http\Controllers\Masyarakat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pengaduan;
use App\Tanggapan;
use Carbon\Carbon;
use App\User;
use App\Lokasi;
use App\Role;
use Auth;
use DB;

class AduanController extends Controller
{
    //Lihat Tanggapan
    public function tanggapan($id)
    {
        $pengaduan         = Pengaduan::find($id);
        $user              = Auth::user();
        $tanggapan         = DB::table('tanggapans')
        ->join('users', 'users.id', '=', 'tanggapans.user_id')
        ->join('pengaduans', 'pengaduans.id', '=', 'tanggapans.pengaduan_id')
        ->select('users.*', 'pengaduans.*', 'tanggapans.*', DB::raw('users.name AS nama_user'))
        ->where('pengaduan_id', $id)
        ->get();

        return view('masyarakat.tanggapan.index', [
            'pengaduan'     => $pengaduan,
            'user'          => $user,
            'tanggapan'     => $tanggapan
        ]);
    }
    
    //Pengaduan
    public function index()
    {
    	$user           = User::all();
        $pengaduan      = Pengaduan::where('user_id', Auth::id())->get();
        $desa           = Lokasi::all();

    	return view('masyarakat.pengaduan.index', 
        [
            'user'      => $user,
            'pengaduan' => $pengaduan,
            'desa'      => $desa
        ]);
    }

    //Bikin Pengaduan
    public function create(Request $request)
    {
        
    	$request->validate([
            'judul_pengaduan'   => 'required|max:64',
            'isi_pengaduan'     => 'required',
            'lokasi'            => 'required',
            'detail_lokasi'     => 'required',
            'foto'              => 'required|mimes:jpeg,jpg,png|max:4000',
            'nik'               => 'required',
        ]);

        $foto                   = $request->foto;
        $namaGambar             = date('YmdHis') . "." . $foto->getClientOriginalExtension();
        $lokasiGambar           = 'uploads/'; // upload path
        $foto->move($lokasiGambar, $namaGambar);
        
        Pengaduan::create([
            'user_id'               => Auth::id(),
            'tanggal_pengaduan'     => Carbon::now(),
            'nik'                   => $request->nik,
            'judul_pengaduan'       => $request->judul_pengaduan, 
            'lokasi'                => $request->lokasi,
            'detail_lokasi'         => $request->detail_lokasi,
            'isi_pengaduan'         => $request->isi_pengaduan,
            'foto'                  => 'uploads/'.$namaGambar,
            'status'                => 'pending',
        ]);

        return redirect()->route('masyarakat.beranda.index');
    }

    //Detail Pengaduan Saya
    public function detail_aduan($id)
    {
        $pengaduan      = Pengaduan::find($id);

        return view('masyarakat.pengaduan.detail-pengaduan', [
            'pengaduan' => $pengaduan,
        ]);
    }

    //Edit Pengaduan Saya
    public function edit($id) 
    {
        $pengaduan      = Pengaduan::find($id);
        $desa           = Lokasi::all();
        
        return view('masyarakat.pengaduan.edit-pengaduan',[
            'pengaduan' => $pengaduan,
            'desa'      => $desa,
        ]);
    }

    public function edit_kirim(Request $request, $id) 
    {

        $request->validate([
            'judul_pengaduan'   => 'required|max:64',
            'isi_pengaduan'     => 'required',
            'lokasi'            => 'required',
            'detail_lokasi'     => 'required',
            'foto'              => 'mimes:jpeg,jpg,png|max:4000',
            'nik'               => 'required',
            'status'            => 'required',
        ]);
        
        if ($request->foto)
        {
        $foto                   = $request->foto;
        $namaGambar             = date('YmdHis') . "." . $foto->getClientOriginalExtension();
        $lokasiGambar           = 'uploads/'; // upload path
        $foto->move($lokasiGambar, $namaGambar);

        Pengaduan::find($id)->update([
            'user_id'           => Auth::id(),
            'tanggal_pengaduan' => Carbon::now(),
            'nik'               => $request->nik,
            'judul_pengaduan'   => $request->judul_pengaduan, 
            'isi_pengaduan'     => $request->isi_pengaduan,
            'lokasi'            => $request->lokasi,
            'detail_lokasi'     => $request->detail_lokasi,
            'foto'              => 'uploads/'.$namaGambar,
            'status'            => $request->status,
        ]);
        return redirect()->back()->with('status', 'Edit Berhasil');
        } 
        else 
        {
            Pengaduan::find($id)->update([
                'user_id'           => Auth::id(),
                'tanggal_pengaduan' => Carbon::now(),
                'nik'               => $request->nik,
                'judul_pengaduan'   => $request->judul_pengaduan, 
                'isi_pengaduan'     => $request->isi_pengaduan,
                'lokasi'            => $request->lokasi,
                'detail_lokasi'     => $request->detail_lokasi,
                'status'            => $request->status,
        ]);
        
        return redirect()->back()->with('status', 'Edit Berhasil');
        }
    }

    //Hapus Pengaduan Saya
    public function hapus_pengaduan($id)
    {
        Pengaduan::destroy($id);
        return redirect()->route('masyarakat.aduan')->with ('status', 'Berhasil Dihapus');
    }
}
