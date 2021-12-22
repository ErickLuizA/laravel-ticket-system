<!DOCTYPE html>
<html class="h-full w-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Keelp</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="icon" href="{{ asset('assets/icons/logo.svg') }}" sizes="any" type="image/svg+xml">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: Nunito, sans-serif;
    }

    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active {
      -webkit-box-shadow: 0 0 0 30px #393838 inset !important;
      -webkit-text-fill-color: #fff;
    }

  </style>
</head>
<body class="bg-secondary text-onSecondary h-full w-full">
@yield('header')
@yield('content')
@yield('footer')

<script>
  const APP_URL = {!! json_encode(url('/')) !!}
</script>
</body>
</html>
