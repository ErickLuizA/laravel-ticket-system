<?php
	
	namespace App\Http\Controllers;
	
	use App\Models\TicketReply;
	use Auth;
	use Illuminate\Http\Request;
	
	class TicketReplyController extends Controller {
		public function store(Request $request, $id) {
			$request -> validate([
				'reply' => ['required']
			]);

			$userId = Auth ::id();

			TicketReply ::create([
				'reply' => $request -> reply,
				'user_id' => $userId,
				'ticket_id' => $id,
				'ticket_reply_id' => $request -> ticketReplyId
			]);

			return redirect() -> back();
		}
	}
