@extends('layouts.withNavbar')

@section('main')

  <h1 class="text-4xl text-center mb-8">Open a new ticket</h1>

  <form method="POST" action="{{ route('ticket.store') }}">
    @csrf

    <x-input-field
      name="subject"
      label="Subject"
      type="text"
      placeholder="Ex: My computer is not working..."
      required
      error="{{ $errors -> has('subject') ? $errors -> first('subject') : '' }}"
      value="{{ old('subject') }}"
    ></x-input-field>

    <div class="w-full my-4 relative flex flex-col">
      <label
        class="text-2xl mb-2"
        for="description">Description</label>
      <textarea
        id="description"
        name="description"
        placeholder="Ex: The issue started when I put my computer inside the toilet..."
        rows="10"
        required
        value="{{old('description')}}"
        class="input-field  {{ $errors -> has('description') ? 'error' : '' }}"></textarea>
      <p class="text-left mt-1 text-danger">{{ $errors -> first('description') }}</p>
    </div>

    <button type="submit" class="action-btn w-full text-2xl">Submit</button>
  </form>

@endsection
