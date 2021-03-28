<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditProfileRequest;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Hash;
use App\Role;
use App\User;
use App\Pengaduan;
use App\Tanggapan;
use App\Lokasi;
use Auth;

class AuthController extends Controller
{
    //Edit Profile
    public function profile()
    {
        $user       = Auth::user();

        return view ('admin.profile.index', [
            'user'  => $user
        ]);
    }

    //Proses Updatenya
    public function profile_update(EditProfileRequest $request)
    {
        $request->user()->update(
            $request->all()
        );

        return redirect()->back()->with('status', 'Di Update');
    }

    //Data Pengaduan
    public function data_aduan() {
        $pengaduan = Pengaduan::where('status', '!=', 'selesai')->get();

        return view('admin.auth.data-aduan', [
            'pengaduan' => $pengaduan,
        ]);
    }

    //Detail Pengaduan
    public function detail_aduan($id) {

        $pengaduan = Pengaduan::find($id);

        return view('admin.auth.detail-aduan', [
            'pengaduan' => $pengaduan,
        ]);
    }

    //Search Pengaduan
    public function search(Request $request)
    {
        $search = $request->search;
        $pengaduan  = Pengaduan::where('judul_pengaduan', 'like', '%'.$search. "%")->paginate(10);

        return view ('admin.auth.data-aduan',[
            'search' => $search,
            'pengaduan' => $pengaduan
        ]);
    }
    
    //Data Petugas
    public function petugas() {
    	$petugas        = User::whereHas("roles", function($q){
            $q->where("name", "petugas");
        })->paginate(50);

        $admin       = User::whereHas("roles", function($q){
            $q->where("name", "admin");
        })->paginate(50);

    	return view('admin.auth.data-petugas', [
    		'petugas'   => $petugas,
            'admin'     => $admin,
    	]);
    }

    //Tambah Petugas
    public function petugas_tambah(request $request) {

        $request->validate([
            'name'              => ['required', 'string', 'max:255'],
            'telp'              => ['required', 'digits_between:12,13'],
            'nik'               => ['required', 'digits:16'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'          => ['required', 'string', 'min:6', 'confirmed'],
            'role'              =>['required'],
        ], [
            'name.required'         => 'Nama harus diisi!',
            'telp.required'         => 'Nomor telpon harus diisi!',
            'telp.digits_between'   => 'Nomor telpon maksimal 13 karakter!',
            'nik.required'          => 'Nik harus diisi!',
            'nik.digits'            => 'Nik maksimal 16 karakter!',
            'email.required'        => 'Email harus diisi!',
            'email.email'           => 'Email harus berupa email!',
            'email.unique'          => 'Email sudah terdaftar!',
            'password.required'     => 'Password harus diisi!',
            'password.min'          => 'password minimal 6 karakter!',
            'password.confirmed'    => 'password tidak sama!',
        ]);

        $user = User::create([
            'name'              => $request->name,
            'email'             => $request->email,
            'email_verified_at' => Carbon::now(),
            'telp'              => $request->telp,
            'nik'               => $request->nik,
            'password'          => Hash::make($request['password']),
        ]);

        $role = $request->role;
        $role = Role::select('id')->where('name', $role)->first();
        $user->roles()->attach($role);

        return redirect()->back()->with('status', 'Tambah Admin/Petugas');
    }

    //Detail Petugas
    public function detail_petugas($id) {

        $user = User::find($id);

        return view('admin.auth.detail-petugas',[
            'user' => $user,
        ]);
    }

    //Nonaktif Petugas
    public function petugas_nonaktif($id)
    {
        User::destroy($id);
        return redirect()->route('admin.petugas')->with ('status', 'Berhasil Dinonaktifkan');;
    }

    /*public function edit_petugas($id)
    {
        $user = User::find($id);

        return view('admin.auth.edit-petugas',[
            'user' => $user,
        ]);
    }

    public function update(User $user)
    { 
        $this->validate(request(), [
            'name' => 'required',
            'nik' => 'required',
            'email' => 'required|email|unique:users',
            'telp' => 'required|min:12',
            'password' => 'required|min:6|confirmed'
        ]);

        $user->name = request('name');
        $user->nik = request('nik');
        $user->email = request('email');
        $user->telp = request('telp');
        $user->password = bcrypt(request('password'));

        $user->save();

        return redirect()->route('admin.petugas');
    }*/

    //Data Masyarakat
    public function masyarakat() {
        $masyarakat = User::whereHas("roles", function($q){
            $q->where("name", "masyarakat");
        })->paginate(50);

        return view('admin.auth.data-masyarakat', [
            'masyarakat' => $masyarakat,
        ]);
    }
    
    //Detail Masyarakat
    public function detail_masyarakat($id) {

        $masyarakat        = User::find($id);
        return view('admin.auth.detail-masyarakat', [
            'masyarakat' => $masyarakat,
        ]);
    }

    /*
    public function masyarakat_nonaktif($id)
    {
        User::destroy($id);
        return redirect()->route('admin.masyarakat')->with ('status', 'Berhasil Dinonaktifkan');;
    }*/

    
    //Report
    public function pengaduan() {
        $desa               = Lokasi::all();
        $pengaduan          = Pengaduan::orderBy('id','DESC')->paginate(100);

        return view ('admin.report.pengaduan', compact('pengaduan'),[
            'desa'  => $desa,
        ]);
    }

    //Report Pertanggal
    public function cetak_aduan_pertanggal($tglAwal, $tglAkhir) 
    {
        $pengaduan          = Pengaduan::with('users')->whereBetween('tanggal_pengaduan',[$tglAwal, $tglAkhir])->get();
        $tglAwal            = $tglAwal;
        $tglAkhir           = $tglAkhir;

        return view ('admin.report.pengaduan-tanggal', [
            'pengaduan'     => $pengaduan,
            'tglAwal'       => $tglAwal,
            'tglAkhir'      => $tglAkhir,
        ]);
    }

    //Report Perlokasi
    public function cetak_aduan_lokasi($lokasi) 
    {
        $pengaduan          = Pengaduan::with('users')->where('lokasi',[$lokasi])->get();
        $lokasi             = $lokasi;
        return view ('admin.report.pengaduan-lokasi', [
            'pengaduan'     => $pengaduan,
            'lokasi'        => $lokasi,
        ]);
    }
}
