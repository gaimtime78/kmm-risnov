<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(Request $request)
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = array('email'=>$request->email,'password' => $request->password);
        if (!Auth::attempt($credentials)) {
            return back()->with($this->status(0,'sukses','Login gagal'));
        }
        // return redirect()->route('admin.dashboard');
        return redirect()->route('dokumentasi-rida');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
      }
}
