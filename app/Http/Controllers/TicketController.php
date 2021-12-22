<?php

  namespace App\Http\Controllers;

  use App\Models\Ticket;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\DB;

  class TicketController extends Controller {
    public function index(Request $request) {
      $userId = Auth ::id();

      $search = $request -> query('search');

      $tickets = Ticket ::where('user_id', '=', $userId) -> where('subject', 'like', "%$search%") -> get();

      return view('dashboard', ['tickets' => $tickets, 'oldSearch' => $search]);
    }

    public function show($id) {
      $userId = Auth ::id();

      $data = Ticket ::with('user:id,name,avatar',
        'replies.user:id,name,avatar,created_at',
        'replies.ticketReply.user:id,name,created_at')
        -> where('user_id', '=', $userId)
        -> where('id', '=', $id)
        -> get();

      $count = DB ::table('ticket_same_question') -> where('ticket_id', $id) -> count();

      return view('ticket-details', ['data' => $data[0] ?? false, 'count' => $count ?? 0]);
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

    public function handleHaveSameQuestion($id) {
      $userId = Auth ::id();

      $result = DB ::table('ticket_same_question')
        -> where('user_id', $userId)
        -> where('ticket_id', $id)
        -> get();

      if ($result -> isEmpty()) {
        DB ::table('ticket_same_question') -> insert([
          'user_id' => $userId,
          'ticket_id' => $id
        ]);
      }

      $count = DB ::table('ticket_same_question')
        -> where('ticket_id', $id)
        -> count();

      return $count;
    }
  }
