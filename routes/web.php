<?php

use App\Http\Controllers\AgendarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\HomeController;
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
Route::get('/avaliacoes', function () {
    return view('avaliacao');
})->name('avaliacoes');


route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/home', [HomeController::class, 'index'])->name('home');

route::match(['get', 'post'] , '/cadastro' , [LoginController::class , 'index'])->name('index');
route::match(['get', 'post'], '/usuario/cadastro', [LoginController::class, 'cadastro'])->name('cadastro');

######################
######  AGENDAR  #####
######################

route::post('/agenda/store', [AgendarController::class, 'store'])->name('agenda-store');

route::middleware(['admin'])->group(function(){
    route::get('/agenda/index', [AgendarController::class, 'index'])->name('agenda-index');
});


Route::get('/sendmail', [MailController::class, 'index']);
