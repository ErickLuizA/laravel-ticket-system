<?php

  namespace App\Http\Controllers;

  use App\Models\User;
  use App\Providers\RouteServiceProvider;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Validation\Rules\Password;

  class LoginController extends Controller {
    public function index() {
      return view('login');
    }

    public function authenticate(Request $request) {
      $credentials = $request -> validate([
        'email' => ['required', 'email'],
        'password' => ['required']
      ]);

      if (Auth ::attempt($credentials)) {
        $request -> session() -> regenerate();

        return redirect() -> intended('dashboard');
      }

      return back() -> withInput() -> withErrors([
        'all' => 'Invalid e-mail or password.'
      ]);
    }
  }
