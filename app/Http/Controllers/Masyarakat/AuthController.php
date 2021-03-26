<?php

namespace App\Http\Controllers\Masyarakat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditProfileRequest;
use Auth;
use App\User;
use App\Role;
use DB;

class AuthController extends Controller
{
    //Edit Profile Saya
    public function profile()
    {
        $user       = Auth::user();

        return view ('masyarakat.profile.index', [
            'user'  => $user
        ]);
    }

    public function profile_update(EditProfileRequest $request)
    {
        $request->user()->update(
            $request->all()
        );

        return redirect()->back()->with('status', 'Di Update');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
