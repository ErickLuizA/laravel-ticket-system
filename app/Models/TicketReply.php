<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	
	class TicketReply extends Model {
		use HasFactory;
		
		protected $fillable = [
			'reply',
			'user_id',
			'ticket_id',
			'ticket_reply_id'
		];
		
		public function user() {
			return $this -> belongsTo(User::class, 'user_id', 'id');
		}
		
		public function ticket() {
			return $this -> belongsTo(Ticket::class, 'ticket_id', 'id');
		}
		
		public function ticketReply() {
			return $this -> belongsTo(TicketReply::class, 'ticket_reply_id', 'id');
		}
	}
