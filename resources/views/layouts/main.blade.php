<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg" style="background-color:#333652;">
        <div class="container">
            <a style="color:#E9EAEC;" class="navbar-brand" href="/">RAFI LIBRARY</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a style="color:#E9EAEC;" class="nav-link" href="{{ route('bibliografi.index') }}">Bibliografi</a>
                    </li>
                    <li class="nav-item">
                    <a style="color:#E9EAEC;" class="nav-link" href="{{ route('member.index') }}">Member</a>
                    </li>
                    <li class="nav-item">
                    <a style="color:#E9EAEC;" class="nav-link" href="{{ route('koleksi.index') }}">Koleksi</a>
                    </li>
                    <li class="nav-item">
                    <a style="color:#E9EAEC;" class="nav-link" href="{{ route('sirkulasi.index') }}">Sirkulasi</a>
                    </li>
                    <li class="nav-item">
                    <a style="color:#E9EAEC;" class="nav-link" href="{{ route('pinjam.index') }}">Peminjaman</a>
                    </li>
                </ul>
            </div>
            <div class="">
              <form action="/bibliografis" method="GET">
                    @csrf
                    <input style="width: 300px;" placeholder="Cari Judul Buku" type="search" id="search" name="search" value=""
                        class="form-control @error('search') is-invalid @enderror">
                    @error('search')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('container')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>