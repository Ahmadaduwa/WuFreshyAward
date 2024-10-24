<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|

สิ่งที่ต้องทำ
หน้าแรก
หน้า login
หน้า ใบเสร็จ qr
หน้า scan qr
หน้า จอง
ฐานข้อมูล
*/

Route::get('/', [AdminController::class, 'home'])->name('home');
Route::get('/home', [AdminController::class, 'home'])->name('home');
Route::get('/home/video', [AdminController::class, 'video'])->name('video');
Auth::routes();

Route::post('logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login'); // เพิ่มเส้นทางนี้เพื่อจัดการการล็อกอิน

Route::middleware(['auth.check'])->group(function () {
    Route::get('/receipt', [AdminController::class, 'receipt'])->name('receipt');
});


