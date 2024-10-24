<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // นำเข้า Auth Facade

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout(); // ล็อกเอาท์ผู้ใช้
        $request->session()->forget('username'); // ลบ username ออกจาก session
        $request->session()->invalidate(); // ยกเลิกเซสชัน
        $request->session()->regenerateToken(); // สร้างโทเค็นเซสชันใหม่

        return redirect('/'); // เปลี่ยนเส้นทางตามต้องการ
    }
}
