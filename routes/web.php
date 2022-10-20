<?php

use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('home');
});



route::get('/login', [LoginController::class, 'login'])->name('login');
route::POST('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

route::match(['get', 'post'] , '/cadastro' , [LoginController::class , 'index'])->name('index');
route::get('/usuario/cadastro', [LoginController::class, 'cadastro'])->name('cadastro');
route::POST('/usuario/cadastro', [LoginController::class, 'cadastro'])->name('cadastro');
