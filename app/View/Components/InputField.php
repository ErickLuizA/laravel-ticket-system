<?php

  namespace App\View\Components;

  use Illuminate\View\Component;
  use Illuminate\View\View;

  class InputField extends Component {

    public string $name;
    public string $type;
    public string $placeholder;
    public string $error;
    public string $value;
    public bool $required;

    public function __construct(
      string $name,
      string $placeholder = "",
      string $error = "",
      string $type = "text",
      string $value = "",
      bool   $required = false) {
      $this -> name = $name;
      $this -> placeholder = $placeholder;
      $this -> error = $error;
      $this -> type = $type;
      $this -> required = $required;
      $this -> value = $value;
    }

    public function render(): View {
      return view('components.input-field');
    }
  }
