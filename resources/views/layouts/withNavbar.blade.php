@extends('layouts.main')

@section('header')
  @include('partials.navbar')
@endsection

@section('content')
  <main class="w-full max-w-5xl mx-auto px-4 py-4 xl:px-0">
    @yield('main')
  </main>
@endsection

@section('footer')
  @yield('script')

  <script src="{{ asset('js/app.js') }}"></script>
@endsection
