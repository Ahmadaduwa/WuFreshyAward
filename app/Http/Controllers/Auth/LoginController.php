<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User; // นำเข้า User Model

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function username()
    {
        return 'username';
    }

    protected function attemptLogin(Request $request)
    {
        // ค้นหาผู้ใช้ตาม username
        $user = User::where('username', $request->input('username'))->first();

        // ตรวจสอบว่า user มีอยู่และรหัสผ่านตรงกัน
        if ($user && $user->password === $request->input('password')) {
            // ถ้าตรงกันให้เข้าสู่ระบบ
            return $this->guard()->login($user, $request->filled('remember'));
        }

        return false; // ถ้าไม่ตรงกันให้ส่ง false
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    }
}
