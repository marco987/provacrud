<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>provaCRUD</title>
      {{-- <!-- CSS -->
      <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
  </head>
  <body>

    <div id="container">

      <header>
        <h1 style="text-align:center">provaCRUD</h1>
      </header>

      <main>
        @yield('content')
      </main>

      <footer>
        <h5>By</h5>
      </footer>

    </div>

  </body>
</html>
