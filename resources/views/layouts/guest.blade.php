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

  <body class="font-sans text-gray-900 antialiased">
    <div class="flex min-h-screen flex-col">
      <!-- Header -->
      <header>
        <div class="mx-auto max-w-5xl">
          @include('layouts.navigation')
        </div>
      </header>

      <!-- Main -->
      <main class="flex-grow">
        <div
          class="mx-auto flex h-full max-w-5xl flex-col items-center pb-6 pt-6 sm:justify-center sm:pt-0">
          <div>
            <a href="{{ route('index') }}">
              <x-application-logo class="h-28 w-28" />
            </a>
          </div>
          <div
            class="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg">
            {{ $slot }}
          </div>
        </div>
      </main>

      <!-- Footer -->
      <footer class="mt-auto">
        @include('layouts.footer')
      </footer>
    </div>

  </body>

</html>
