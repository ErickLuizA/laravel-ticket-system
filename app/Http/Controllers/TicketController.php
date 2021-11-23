<?php

  namespace App\Http\Controllers;

  use App\Models\Ticket;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Auth;

  class TicketController extends Controller {
    public function index() {
      $userId = Auth ::id();

      $tickets = Ticket ::where('user_id', '=', $userId) -> get();

      return view('dashboard', ['tickets' => $tickets]);
    }

    public function create() {
      return view('open-ticket');
    }

    public function store(Request $request) {
      $request -> validate([
        'subject' => ['required', 'max:255'],
        'description' => ['required']
      ]);

      $userId = Auth ::id();

      Ticket ::create([
        'subject' => $request -> subject,
        'description' => $request -> description,
        'user_id' => $userId
      ]);

      return redirect('dashboard');
    }
  }
