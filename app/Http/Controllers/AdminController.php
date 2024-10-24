<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminController extends Controller
{
    function home()
    {
        $now = Carbon::now('Asia/Bangkok');

        $status = "ERROR";
        $css = 'rgb(0, 255, 0)';
        $button = 'receipt';

        // วันเวลาที่เปิดระบบ
        $beforeDateTime = Carbon::create(2024, 11, 8, 10, 0, 0); 
        // วันเวลาที่ปิดระบบ
        $afterDateTime = Carbon::create(2024, 11, 8, 18, 0, 0); 

        //ก่อนเปิด
        //if ($now->lessThan($beforeDateTime)) {
        //    $status = "เปิดในวันที่ 8/11/67 เวลา 10.00-18.00 น.";
        //    $button = 'home';
        //}
        //เปิด
        //elseif ($now->greaterThanOrEqualTo($beforeDateTime) && $now->lessThan($afterDateTime)) {
            $status = "ระบบกำลังเปิดใช้งาน (หมดเขตเวลา 18.00 น.)";
            $button = 'receipt';
        //}
        //หมดเขต
        //else {
        //    $status = "หมดเวลาการจอง";
        //    $css = 'red';
        //    $button = 'login';
        //}

        return view('home', compact('status', 'css', 'now', 'button'));
    }

    function welcome()
    {
        return view('welcome');
    }

    function login()
    {
        //$now = Carbon::now('Asia/Bangkok');
        // วันเวลาที่เปิดระบบ
        //$beforeDateTime = Carbon::create(2024, 11, 8, 10, 0, 0); 

        //ก่อนเปิด
        //if ($now->lessThan($beforeDateTime)) {
        //    return redirect(route('home'));
        //}
        //เปิด
        //else{ 
            return view('login');
        //}
    }

    function video()
    {
        return view('featuredvideo');
    }

    function receipt() {
        return view('receipt');
    }

    //ตย หน้าที่ต้องล็อคอิน
    public function dashboard()
    {
        // ตรวจสอบว่าผู้ใช้ล็อกอินอยู่หรือไม่
        if (Auth::check()) {
            // ส่งข้อมูลไปยัง view dashboard
            return view('admin.dashboard', [
                'username' => session('username'), // ดึง username จาก session
            ]);
        }

        // ถ้ายังไม่ได้ล็อกอิน ให้เปลี่ยนเส้นทางไปที่หน้า login
        return redirect()->route('login')->with('error', 'กรุณาล็อกอินก่อนเข้าถึงหน้า Dashboard');
    }
}
