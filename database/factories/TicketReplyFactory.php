<?php

  namespace Database\Factories;

  use Illuminate\Database\Eloquent\Factories\Factory;

  class TicketReplyFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
      return [
        'reply' => $this -> faker -> text(),
        'user_id' => $this -> faker -> numberBetween(1, 10),
        'ticket_id' => $this -> faker -> numberBetween(1, 10)
      ];
    }
  }
