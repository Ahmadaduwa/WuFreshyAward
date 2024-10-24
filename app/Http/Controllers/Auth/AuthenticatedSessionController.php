<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // เพิ่มการนำเข้า Auth

class AuthenticatedSessionController extends Controller
{
    use AuthenticatesUsers;

    protected function attemptLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if ($this->guard()->attempt($credentials, $request->filled('remember'))) {
            // เก็บ username ใน session
            session(['username' => $request->input('username')]);
            return true;
        }

        return false;
    }

    // ฟังก์ชันสำหรับการล็อกอิน
    public function store(Request $request)
    {
        // ตรวจสอบข้อมูลล็อกอิน
        $credentials = $request->only('username', 'password');

        // ตรวจสอบรหัสผ่านโดยตรง
        $user = User::where('username', $credentials['username'])->first();

        if ($user && $user->password === $credentials['password']) {
            // เก็บ username ใน session
            session(['username' => $request->input('username')]);

            // ล็อกอินผู้ใช้
            Auth::login($user);

            // ถ้าล็อกอินสำเร็จ ให้เปลี่ยนเส้นทาง
            return redirect()->intended(route('receipt') );
        }

        // ถ้าล็อกอินไม่สำเร็จ ให้กลับไปที่หน้า login พร้อมข้อความผิดพลาด
        return redirect()->back()->withErrors([
            'username' => 'ข้อมูลล็อกอินไม่ถูกต้อง',
        ]);
    }   

    public function create()
    {
        return view('auth.login'); // แทนที่ 'auth.login' ด้วยเส้นทางของ View ที่คุณใช้สำหรับหน้าเข้าสู่ระบบ
    }


    // ฟังก์ชันอื่น ๆ ที่เกี่ยวข้อง
}
