<?php

  use App\Http\Controllers\HomeController;
  use App\Http\Controllers\LoginController;
  use App\Http\Controllers\RegisterController;
  use App\Http\Controllers\TicketController;
  use App\Http\Controllers\TicketReplyController;
  use App\Http\Controllers\UserController;
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

  Route ::get('/', [HomeController::class, 'index']);

  Route ::middleware(['guest']) -> group(function () {
    Route ::get('/login', [LoginController::class, 'index']) -> name('login');
    Route ::post('/login', [LoginController::class, 'authenticate']) -> name('login.authenticate');
    Route ::get('/register', [RegisterController::class, 'index']) -> name('register');
    Route ::post('/register', [RegisterController::class, 'store']) -> name('register.store');
  });

  Route ::middleware(['auth']) -> group(function () {
    Route ::get('/dashboard', [TicketController::class, 'index']) -> name('dashboard');
    Route ::get('/ticket/{id}', [TicketController::class, 'show']) -> name('ticket');
    Route ::put('/ticket/{id}', [TicketController::class, 'update']) -> name('ticket.update');
    Route ::post('/ticket/{id}/reply', [TicketReplyController::class, 'store']) -> name('reply.store');
    Route ::post('/ticket/{id}/same-question', [TicketController::class, 'handleHaveSameQuestion']);
    Route ::get('/open-ticket', [TicketController::class, 'create']);
    Route ::post('/open-ticket', [TicketController::class, 'store']) -> name('ticket.store');
    Route ::get('/profile', [UserController::class, 'show']);
    Route ::put('/profile', [UserController::class, 'update']) -> name('profile.update');
    Route ::post('/logout', [UserController::class, 'logout']) -> name('logout');
  });

