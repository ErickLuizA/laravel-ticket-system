<?php

  use Illuminate\Database\Migrations\Migration;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Support\Facades\Schema;

  class CreateTicketsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
      Schema ::create('tickets', function(Blueprint $table) {
        $table -> id();
        $table -> string('subject', 255);
        $table -> text('description');
        $table -> enum('status', ['OPEN', 'CLOSED']) ->default('OPEN');
        $table -> foreignId('user_id') -> constrained('users');
        $table -> timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
      Schema ::dropIfExists('tickets');
    }
  }
