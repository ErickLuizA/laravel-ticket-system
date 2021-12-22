<?php
	
	namespace Database\Seeders;
	
	use Illuminate\Database\Seeder;
	
	class DatabaseSeeder extends Seeder {
		/**
		 * Seed the application's database.
		 *
		 * @return void
		 */
		public function run() {
			\App\Models\User ::factory(1) -> create([
				'name' => 'TesteUser',
				'email' => 'teste@teste.com',
			]);
			\App\Models\User ::factory(9) -> create();
			
			\App\Models\Ticket ::factory(1) -> create([
				'user_id' => 1
			]);
			\App\Models\Ticket ::factory(9) -> create();
			\App\Models\TicketReply ::factory(50) -> create
			();
		}
	}
