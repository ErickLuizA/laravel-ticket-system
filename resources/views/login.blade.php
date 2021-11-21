@extends('main')

@section('content')
  <main
    class="w-full h-5/6 p-4 max-w-5xl mx-auto flex flex-col items-center justify-center">
    <h1 class="text-2xl sm:text-5xl my-8 text-center">Sign In to your account</h1>
    <h2 class="text-lg sm:text-xl md:w-1/2 lg:w-1/3 xl:w-1/4 text-center">
      Enter your credentials below
    </h2>
    <form
      class="flex items-center flex-col w-full"
      method="POST"
      action="{{ route('login.authenticate') }}">
      @csrf

      <div class="mt-8 mb-4 w-full">
        <x-input-field
          name="email"
          type="email"
          placeholder="E-mail"
          required="true"
          error="{{ $errors -> has('all') ? '  ' : '' }}"
          value="{{ old('email') }}"
        >
          <x-heroicon-o-mail class="input-icon"/>
        </x-input-field>

        <x-input-field
          name="password"
          type="password"
          placeholder="Password"
          required="true"
          error="{{ $errors -> has('all') ? '  ' : '' }}"
          value="{{ old('password') }}"
        >
          <x-heroicon-o-lock-closed class="input-icon"/>
        </x-input-field>
      </div>

      @error('all')
      <p class="self-start my-2 text-danger">{{ $message }}</p>
      @enderror

      <div class="flex justify-between self-stretch mt-4">
        <a href="/forgot-password" class="link">Forgot your password?</a>
        <button type="submit" class="bg-primary px-8 py-2 text-lg text-onPrimary rounded hover:bg-opacity-80">Sign In
        </button>
      </div>

      <p class="self-start mt-8">Not registered yet?
        <a href="/register" class="link">
          Create an account
        </a>
      </p>
    </form>
  </main>
@endsection
