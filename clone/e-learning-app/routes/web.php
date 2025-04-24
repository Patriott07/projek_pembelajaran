<?php

use App\Http\Controllers\AuthControlller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ControllerGabungan;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [AuthControlller::class, 'login_view']); // kslo user cari url / link di chrome
Route::post('/login', [AuthControlller::class, 'login']); // kalo user submit form

Route::get('/register', [AuthControlller::class, 'register_view']); // kslo user cari url / link di chrome
Route::post('/register', [AuthControlller::class, 'register']); 
Route::post('/logout', [AuthControlller::class, 'logout'])->middleware(['login_first']); 

Route::get('/user', [UserController::class, 'user_view'])->middleware(['login_first', 'admin_only']);
Route::get('/user/create', [UserController::class, 'user_view_create'])->middleware(['login_first', 'admin_only']);
Route::get('/user/update/{id}', [UserController::class, 'user_view_update'])->middleware(['login_first', 'admin_only']);

Route::post('/user/create', [UserController::class, 'user_create'])->middleware(['login_first','admin_only']);
Route::post('/user/update/{id}', [UserController::class, 'user_update'])->middleware(['login_first', 'admin_only']);
Route::post('/user/delete/{id}', [UserController::class, 'user_delete'])->middleware(['login_first', 'admin_only']);
Route::post('/user/assign/pengajar/{id}', [UserController::class, 'user_assign_pengajar'])->middleware(['login_first', 'admin_only']);

Route::get('/category', [CategoryController::class, 'category_view'])->middleware(['login_first', 'admin_only']);
Route::get('/category/create', [CategoryController::class, 'category_view_create'])->middleware(['login_first', 'admin_only']);
Route::get('/category/update/{id}', [CategoryController::class, 'category_view_update'])->middleware(['login_first', 'admin_only']);

Route::post('/category/create', [CategoryController::class, 'category_create'])->middleware(['login_first', 'admin_only']);
Route::post('/category/update/{id}', [CategoryController::class, 'category_update'])->middleware(['login_first', 'admin_only']);
Route::post('/category/delete/{id}', [CategoryController::class, 'category_delete'])->middleware(['login_first', 'admin_only']);
Route::post('/category/restore/{id}', [CategoryController::class, 'category_restore'])->middleware(['login_first', 'admin_only']);


Route::get('/pengajar', [PengajarController::class, 'pengajar_view'])->middleware(['login_first', 'admin_only']);
// Route::get('/pengajar/create', [PengajarController::class, 'pengajar_view_create'])->middleware(['login_first']);
// Route::get('/pengajar/update/{id}', [PengajarController::class, 'pengajar_view_update']);

Route::get('/profile', [PengajarController::class, 'profile'])->middleware(['login_first', 'pengajar_only']);
// Route::post('/pengajar/create', [PengajarController::class, 'pengajar_create']);
Route::post('/pengajar/update/{id}', [PengajarController::class, 'pengajar_update'])->middleware(['login_first', 'pengajar_only']);
Route::post('/pengajar/delete/{id}', [PengajarController::class, 'pengajar_delete'])->middleware(['login_first', 'admin_only']);
Route::post('/pengajar/restore/{id}', [PengajarController::class, 'pengajar_restore'])->middleware(['login_first', 'admin_only']);

Route::get('/kursus', [KursusController::class, 'kursus_view'])->middleware(['login_first', 'pengajar_only']);
Route::get('/kursus/create', [KursusController::class, 'kursus_view_create'])->middleware(['login_first', 'pengajar_only']);
Route::get('/kursus/update/{id}', [KursusController::class, 'kursus_view_update'])->middleware(['login_first', 'pengajar_only']);

Route::post('/kursus/create', [KursusController::class, 'kursus_create'])->middleware(['login_first', 'pengajar_only']);
Route::post('/kursus/update/{id}', [KursusController::class, 'kursus_update'])->middleware(['login_first', 'pengajar_only']);
Route::post('/kursus/delete/{id}', [KursusController::class, 'kursus_delete'])->middleware(['login_first', 'pengajar_only']);
Route::post('/kursus/restore/{id}', [KursusController::class, 'kursus_restore'])->middleware(['login_first', 'pengajar_only']);


Route::get('/kursus/{id}/video', [VideoController::class, 'video_view'])->middleware(['login_first', 'pengajar_only']);
Route::get('/kursus/{id}/video/create', [VideoController::class, 'video_view_create'])->middleware(['login_first', 'pengajar_only']);
Route::get('/kursus/{id}/video/update/{id_video}', [VideoController::class, 'video_view_update'])->middleware(['login_first', 'pengajar_only']);

Route::post('/kursus/{id}/video/create', [VideoController::class, 'video_create'])->middleware(['login_first', 'pengajar_only']);
Route::post('/kursus/{id}/video/update/{id_video}', [VideoController::class, 'video_update'])->middleware(['login_first', 'pengajar_only']);
Route::post('/kursus/{id}/video/delete/{id_video}', [VideoController::class, 'video_delete'])->middleware(['login_first', 'pengajar_only']);
Route::post('/kursus/{id}/video/restore/{id_video}', [VideoController::class, 'video_restore'])->middleware(['login_first', 'pengajar_only']);


Route::get('/pembayaran', [PembayaranController::class, 'pembayaran_view'])->middleware(['login_first', 'admin_pengajar_only']);
Route::post('/pembayaran/create/{id}', [PembayaranController::class, 'pembayaran_create'])->middleware(['login_first', 'member_only']);
Route::post('/pembayaran/accept/{id}', [PembayaranController::class, 'pembayaran_accept'])->middleware(['login_first', 'admin_pengajar_only']);
Route::post('/pembayaran/delete/{id}', [PembayaranController::class, 'pembayaran_delete'])->middleware(['login_first', 'admin_pengajar_only']);
Route::post('/pembayaran/restore/{id}', [PembayaranController::class, 'pembayaran_restore'])->middleware(['login_first', 'admin_pengajar_only']);



Route::post('/comment/create/{id}', [CommentController::class, 'comment_create'])->middleware(['login_first',]);
Route::post('/like/{id}', [CommentController::class, 'like'])->middleware(['login_first', 'member_only']);


Route::get('/', [ControllerGabungan::class, 'home_view']);
Route::get('/member-area', [ControllerGabungan::class, 'member_view'])->middleware(['login_first', 'member_only']);
Route::get('/kursus/category/{categ_name}/{id}', [ControllerGabungan::class, 'course_by_category_view']);
Route::get('/kursus/{kursus_name}/{id}', [ControllerGabungan::class, 'course_view'])->middleware(['login_first']);