<!DOCTYPE html>
<html class="h-full w-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Keelp</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  </head>
  <body class="bg-secondary text-onSecondary h-full w-full">
    @yield('content')
  </body>
</html>
