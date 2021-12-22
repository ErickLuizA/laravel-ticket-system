<?php
	
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;
	
	class CreateTicketRepliesTable extends Migration {
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up() {
			Schema ::create('ticket_replies', function(Blueprint $table) {
				$table -> id();
				$table -> text('reply');
				$table -> foreignId('ticket_reply_id') -> nullable() -> constrained('ticket_replies');
				$table -> foreignId('user_id') -> constrained('users');
				$table -> foreignId('ticket_id') -> constrained('tickets');
				$table -> timestamps();
			});
		}
		
		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down() {
			Schema ::dropIfExists('ticket_replies');
		}
	}
