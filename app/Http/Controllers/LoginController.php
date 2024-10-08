<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function loginAuth(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $valid_username = 'admin';
        $valid_password = 'Prohukum!2023';

        if ($request->username === $valid_username && $request->password === $valid_password) {
            Session::put('username', $request->username);
            return redirect()->route('dashboard');
        } else {
            // Jika tidak cocok, kembali ke halaman login dengan error
            return redirect()->back()->with('failed', 'Proses login gagal, silahkan coba kembali dengan data yang benar!');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login')->with('logout', 'Anda telah logout !');
    }

    public function dashboard()
    {
        if (!Session::has('username')) {
            return redirect()->route('login');
        }
        return view('dashboard', ['username' => Session::get('username')]);
    }
}