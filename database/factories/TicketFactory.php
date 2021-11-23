<?php

  namespace Database\Factories;

  use Illuminate\Database\Eloquent\Factories\Factory;
  use Illuminate\Support\Str;

  class TicketFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
      return [
        'subject' => $this -> faker -> sentence(),
        'description' => $this -> faker -> text(),
        'user_id' => $this -> faker -> numberBetween(1, 10)
      ];
    }
  }
