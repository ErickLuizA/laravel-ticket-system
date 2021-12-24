<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Validation\Rules\Password;

  class UserController extends Controller {
    public function show() {
      $user = Auth ::user();

      return view('profile', compact('user'));
    }

    public function update(Request $request) {
      $user = Auth ::user();

      $toValidateArray = [];

      $equalName = $request -> name === $user -> name;
      $equalEmail = $request -> email === $user -> email;

      if (!$equalName) $toValidateArray['name'] = ['string', 'max:255'];
      if (!$equalEmail) $toValidateArray['email'] = ['string', 'email', 'max:255', 'unique:users'];
      if ($request -> password) $toValidateArray['password'] = [
        Password ::min(8)
          -> letters()
          -> mixedCase()
          -> numbers()
          -> symbols()
      ];

      $values = $request -> validate($toValidateArray);

      if ($values) {
        Auth ::getUser() -> update($values);
      }

      return redirect() -> back();
    }

    public function logout(Request $request) {
      Auth ::logout();

      $request -> session() -> invalidate();

      $request -> session() -> regenerateToken();

      return redirect('/');
    }
  }
