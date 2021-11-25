<?php

  use Illuminate\Database\Migrations\Migration;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Support\Facades\Schema;

  class CreateTicketReplyAttachmentsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
      Schema ::create('ticket_reply_attachments', function(Blueprint $table) {
        $table -> id();
        $table -> string('file', 255);
        $table -> string('file_name', 255);
        $table -> foreignId('ticket_reply_id') -> constrained('ticket_replies') -> onDelete('cascade');
        $table -> timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
      Schema ::dropIfExists('ticket_reply_attachments');
    }
  }
