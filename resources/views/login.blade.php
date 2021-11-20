@extends('main')

@section('content')
  <main class="flex items-center p-4 flex-col w-full h-full max-w-5xl mx-auto">
    <h1 class="text-2xl sm:text-5xl my-8 text-center">Sign In to your account</h1>
    <h2 class="text-lg sm:text-xl md:w-1/2 lg:w-1/3 xl:w-1/4 text-center">
      Enter your credentials below
    </h2>
    <div class="my-8 w-full">
      <x-input-field name="email" type="email" placeholder="E-mail" error="">
        <x-heroicon-o-mail class="input-icon"/>
      </x-input-field>

      <x-input-field name="password" type="password" placeholder="Password" error="">
        <x-heroicon-o-lock-closed class="input-icon"/>
      </x-input-field>
    </div>
    <div class="flex justify-between self-stretch">
      <a href="/forgot-password" class="link">Forgot your password?</a>
      <button class="bg-primary px-8 py-2 text-lg text-onPrimary rounded hover:bg-opacity-80">Sign In</button>
    </div>
    <p class="self-start mt-8">Not registered yet?
      <a href="/register" class="link">
        Create an account
      </a>
    </p>
  </main>
@endsection
