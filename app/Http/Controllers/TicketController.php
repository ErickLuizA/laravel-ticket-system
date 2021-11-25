<?php

  namespace App\Http\Controllers;

  use App\Models\Ticket;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Auth;

  class TicketController extends Controller {
    public function index(Request $request) {
      $userId = Auth ::id();

      $search = $request -> query('search');

      $tickets = Ticket ::where('user_id', '=', $userId) -> where('subject', 'like', "%$search%") -> get();

      return view('dashboard', ['tickets' => $tickets, 'oldSearch' => $search]);
    }

    public function show($id) {
      $userId = Auth ::id();

      $data = Ticket ::with('user:users.id,name,avatar', 'replies', 'replies.user:users.id,name,avatar,created_at')
        -> where('user_id', '=', $userId)
        -> where('id', '=', $id)
        -> get();

      return view('ticket-details', ['data' => $data[0] ?? false]);
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
