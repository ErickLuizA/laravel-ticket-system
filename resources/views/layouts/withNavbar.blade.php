@extends('layouts.main')

@section('header')
  @include('partials.navbar')
@endsection

@section('content')
  <main class="w-full max-w-5xl mx-auto px-4 py-4 lg:px-0">
    @yield('main')
  </main>
@endsection

@section('footer')
  @yield('footer')

  <script src="{{ asset('js/app.js') }}"></script>
@endsection
