<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Votre regard sur la météo">

    <title>
      @if ($pageTitle)
        {{ $pageTitle }}
      @else
        Météœil
      @endif
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body class="bg-white font-sans text-gray-900 antialiased">
    <div class="flex min-h-screen flex-col">
      <!-- Header -->
      <header>
        <div class="mx-auto max-w-5xl">
          @include('layouts.navigation')
        </div>
      </header>

      <!-- Main -->
      <main class="flex-grow">
        <div class="mx-auto max-w-5xl px-2 pb-6 pt-2">
          {{ $slot }}
        </div>
      </main>

      <!-- Footer -->
      <footer class="mt-auto">
        @include('layouts.footer')
    </div>
  </body>

</html>
