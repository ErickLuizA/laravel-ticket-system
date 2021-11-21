<?php

  use App\Http\Controllers\HomeController;
  use App\Http\Controllers\LoginController;
  use App\Http\Controllers\RegisterController;
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

  Route ::middleware(['guest']) -> group(function() {
    Route ::get('/login', [LoginController::class, 'index']) -> name('login');
    Route ::post('/login', [LoginController::class, 'authenticate']) -> name('login.authenticate');
    Route ::get('/register', [RegisterController::class, 'index']) -> name('register');
    Route ::post('/register', [RegisterController::class, 'store']) -> name('register.store');
  });

  Route ::middleware(['auth']) -> group(function() {
    Route ::get('/dashboard', [UserController::class, 'index']);
    Route::post('/logout', [UserController::class, 'logout']) -> name('logout');
  });

