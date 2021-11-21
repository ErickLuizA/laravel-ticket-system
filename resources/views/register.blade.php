@extends('main')

@section('content')
  <main class="flex items-center justify-center p-4 flex-col w-full h-5/6 max-w-5xl mx-auto">
    <h1 class="text-2xl sm:text-5xl my-8 text-center">Sign Up</h1>
    <h2 class="text-lg sm:text-xl md:w-1/2 lg:w-1/3 xl:w-1/4 text-center">
      Enter your information below to create a account
    </h2>
    <form
      class="flex items-center flex-col w-full"
      method="POST"
      action="{{ route('register.store') }}">
      @csrf

      <div class="my-8 w-full">
        <x-input-field
          name="name"
          type="name"
          placeholder="Username"
          required="true"
          error="{{ $errors -> has('name') ? $errors -> first('name') : '' }}"
          value="{{ old('name') }}">
          <x-heroicon-o-user class="input-icon"/>
        </x-input-field>

        <x-input-field
          name="email"
          type="email"
          placeholder="E-mail"
          required="true"
          error="{{ $errors -> has('email') ? $errors -> first('email') : '' }}"
          value="{{ old('email') }}">
          <x-heroicon-o-mail class="input-icon"/>
        </x-input-field>

        <x-input-field
          name="password"
          type="password"
          placeholder="Password"
          required="true"
          error="{{ $errors -> has('password') ? $errors -> first('password') : '' }}">
          <x-heroicon-o-lock-closed class="input-icon"/>
        </x-input-field>
      </div>
      <div class="flex justify-between self-stretch">
        <a href="/login" class="link">Already have a account?</a>
        <button class="bg-primary px-8 py-2 text-lg text-onPrimary rounded hover:bg-opacity-80">Sign Up</button>
      </div>
    </form>
  </main>
@endsection
