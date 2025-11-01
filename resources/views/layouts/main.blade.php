<!doctype html>
<html lang="en">
  <head>
    <title>Website Perpustakaan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
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
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

    <script>
    new TomSelect("#book_id", {
        valueField: "id",
        labelField: "judul_buku",
        searchField: "judul_buku",
        placeholder: "Cari buku...",
        load: function(query, callback) {
            if (!query.length) return callback();
            fetch(`/api/books?q=${query}`)
                .then(res => res.json())
                .then(json => callback(json))
                .catch(() => callback());
        }
    });

    new TomSelect("#anggota_id", {
        valueField: "id",
        labelField: "label",
        searchField: "label",
        placeholder: "Cari anggota...",
        load: function(query, callback) {
            if (!query.length) return callback();

            fetch(`/api/anggota?q=${query}`)
                .then(res => res.json())
                .then(json => {
                    const items = json.map(item => ({
                        id: item.id,
                        label: item.no_anggota + ' - ' + item.nama
                    }));
                    callback(items);
                })
                .catch(() => callback());
        }
    });
    </script>
  </body>
</html>
