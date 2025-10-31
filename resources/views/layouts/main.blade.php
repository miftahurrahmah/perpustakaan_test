<!doctype html>
<html lang="en">
  <head>
    <title>Website Perpustakaan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>

  <body class="d-flex flex-column min-vh-100">
    <div class="wrapper d-flex flex-grow-1">
      @include('layouts.sidebar')

      <div id="content" class="d-flex flex-column flex-grow-1 p-4 p-md-5">
        @include('layouts.header')

        <main class="flex-grow-1">
          @yield('content')
        </main>

      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
