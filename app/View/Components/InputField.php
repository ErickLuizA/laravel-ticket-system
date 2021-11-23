<?php

  namespace App\View\Components;

  use Illuminate\View\Component;
  use Illuminate\View\View;

  class InputField extends Component {

    public string $name;
    public string $error;
    public string $label;

    public function __construct(
      string $name,
      string $error = "",
      string $label = "") {
      $this -> name = $name;
      $this -> error = $error;
      $this -> label = $label;
    }

    public function render(): View {
      return view('components.input-field');
    }
  }
