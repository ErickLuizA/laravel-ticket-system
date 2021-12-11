<?php

  namespace App\Http\Controllers;

  use Auth;
  use Illuminate\Http\Request;

  class ReplyController extends Controller {
    public function store(Request $request) {
      $request -> validate([
        'reply' => ['required']
      ]);

      $userId = Auth ::id();

      return redirect() -> back();
    }
  }
