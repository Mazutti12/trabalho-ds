<?php

use App\Http\Controllers\AgendamentosController;
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
Route::get('/solicitacoes', [AgendamentosController::class, 'index'])->name('solicitacoes');
Route::get('/solicitacoes/aceita/{id}', [AgendamentosController::class, 'aceitaServico']);
Route::get('/solicitacoes/recusa/{id}', [AgendamentosController::class, 'recusaServico']);


route::get('/login', [LoginController::class, 'login'])->name('login');
route::POST('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/home', [HomeController::class, 'index'])->name('home');

route::match(['get', 'post'] , '/cadastro' , [LoginController::class , 'index'])->name('index');
route::get('/usuario/cadastro', [LoginController::class, 'cadastro'])->name('cadastro');
route::POST('/usuario/cadastro', [LoginController::class, 'cadastro'])->name('cadastro');

######################
######  AGENDAR  #####
######################

route::post('/agenda/store', [AgendarController::class, 'store'])->name('agenda-store');
route::get('/agenda/index', [AgendarController::class, 'index'])->name('agenda-index');


Route::get('/sendmail', [MailController::class, 'index']);

