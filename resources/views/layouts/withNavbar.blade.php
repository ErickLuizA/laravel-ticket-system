@extends('layouts.main')

@section('header')
  @include('partials.navbar')
@endsection

@section('content')
  @yield('content')
@endsection

@section('footer')
  @yield('footer')

  <script src="{{ asset('js/app.js') }}"></script>
@endsection
