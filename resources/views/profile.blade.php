@extends('layouts.withNavbar')

@section('main')

  <section class="w-full flex flex-col items-center">
    <img src="{{$user->avatar}}" alt="{{$user->name}}" class="h-30 w-30 rounded-full my-4"/>


    <form
      class="flex items-center flex-col w-full"
      method="POST"
      action="{{ route('profile.update') }}">
      @csrf
      @method('PUT')

      <div class="my-8 w-full">
        <x-input-field
          name="name"
          type="name"
          placeholder="Username"
          required="true"
          error="{{ $errors -> has('name') ? $errors -> first('name') : '' }}"
          value="{{ $user -> name }}">
          <x-heroicon-o-user class="input-icon"/>
        </x-input-field>

        <x-input-field
          name="email"
          type="email"
          placeholder="E-mail"
          required="true"
          error="{{ $errors -> has('email') ? $errors -> first('email') : '' }}"
          value="{{ $user -> email }}">
          <x-heroicon-o-mail class="input-icon"/>
        </x-input-field>

        <x-input-field
          name="password"
          type="password"
          placeholder="Password"
          error="{{ $errors -> has('password') ? $errors -> first('password') : '' }}">
          <x-heroicon-o-lock-closed class="input-icon"/>
        </x-input-field>
      </div>

      <div class="flex justify-between self-stretch">
        <button class="bg-primary px-8 py-2 text-lg text-onPrimary rounded hover:bg-opacity-80">Update</button>
      </div>
    </form>
  </section>

@endsection
