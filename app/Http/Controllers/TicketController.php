<?php

  namespace App\Http\Controllers;

  use App\Models\Ticket;
  use Illuminate\Http\Request;
  use Illuminate\Support\Carbon;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\DB;

  class TicketController extends Controller {
    public function index(Request $request) {
      $user = Auth ::user();

      $search = $request -> query('search');

      if ($user -> role !== 'GUEST') {
        $tickets = Ticket ::where('subject', 'like', "%$search%") -> get();
      } else {
        $tickets = Ticket ::where('user_id', '=', $user -> id) -> where('subject', 'like', "%$search%") -> get();
      }

      return view('dashboard', ['tickets' => $tickets, 'oldSearch' => $search]);
    }

    public function show($id) {
      $user = Auth ::user();

      $data = Ticket ::with('user:id,name,avatar',
        'replies.user:id,name,avatar,created_at',
        'replies.ticketReply.user:id,name,created_at')
        -> where('user_id', '=', $user -> id)
        -> where('id', '=', $id)
        -> get();

      $count = DB ::table('ticket_same_question') -> where('ticket_id', $id) -> count();

      return view('ticket-details', ['data' => $data[0] ?? false, 'count' => $count ?? 0, 'user' => $user]);
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

    public function update(Request $request, $id) {
      $user = Auth ::user();

      if ($user -> role !== 'GUEST') {
        Ticket ::whereId($id) -> update(['status' => $request -> status]);
      }

      return redirect() -> back();
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
          'ticket_id' => $id,
          'created_at' => Carbon ::now(),
          'updated_at' => Carbon ::now()
        ]);
      }

      $count = DB ::table('ticket_same_question')
        -> where('ticket_id', $id)
        -> count();

      return $count;
    }
  }
