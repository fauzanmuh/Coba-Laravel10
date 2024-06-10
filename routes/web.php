<?php

use App\Http\Controllers\HalamanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/siswa', [SiswaController::class, 'index']);
// Route::get('/siswa/{id}', [SiswaController::class, 'detail']);

Route::get('/', [HalamanController::class, 'index'])->middleware('isGuest');
Route::get('/tentang', [HalamanController::class, 'tentang'])->middleware('isGuest');
Route::get('/contact', [HalamanController::class, 'contact'])->middleware('isGuest');

Route::resource('siswa', StudentController::class)->middleware('isLogin');

Route::get('/sesi', [SessionController::class, 'index'])->middleware('isGuest');
Route::post('sesi/login', [SessionController::class, 'login'])->middleware('isGuest');
Route::get('sesi/logout', [SessionController::class, 'logout']);
Route::get('sesi/register', [SessionController::class, 'register'])->middleware('isGuest');
Route::post('sesi/create', [SessionController::class, 'create'])->middleware('isGuest');