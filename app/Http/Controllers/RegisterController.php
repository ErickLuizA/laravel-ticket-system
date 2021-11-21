<?php

  namespace App\Http\Controllers;

  use App\Models\User;
  use App\Providers\RouteServiceProvider;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\Hash;
  use Illuminate\Validation\Rules\Password;

  class RegisterController extends Controller {
    public function index() {
      return view('register');
    }

    public function store(Request $request) {
      $request -> validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => [
          'required',
          Password ::min(8)
            -> letters()
            -> mixedCase()
            -> numbers()
            -> symbols()
        ]
      ]);

      $user = User ::create([
        'name' => $request -> name,
        'email' => $request -> email,
        'password' => Hash ::make($request -> password)
      ]);

      Auth ::login($user);

      return redirect(RouteServiceProvider::HOME);
    }
  }
