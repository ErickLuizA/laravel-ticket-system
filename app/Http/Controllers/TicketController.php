<?php

  namespace App\Http\Controllers;

  use App\Models\Ticket;
  use Illuminate\Http\Request;

  class TicketController extends Controller {
    public function create() {
      return view('open-ticket');
    }

    public function store(Request $request) {
      $request -> validate([
        'subject' => ['required', 'max:255'],
        'description' => ['required']
      ]);

      Ticket ::create([
        'subject' => $request -> subject,
        'description' => $request -> description
      ]);

      return redirect('dashboard');
    }
  }
