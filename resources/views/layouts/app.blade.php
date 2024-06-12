<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market Monitor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('home') }}">Market Monitor</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item {{ Request::routeIs('pasars.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pasar.index') }}">Pasar</a>
                </li>
                <li class="nav-item {{ Request::routeIs('kategori.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('kategori.index') }}">Kategori</a>
                </li>
                <li class="nav-item {{ Request::routeIs('komoditi.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('komoditi.index') }}">Komoditi</a>
                </li>
                <li class="nav-item {{ Request::routeIs('produk_komoditi.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('produk_komoditi.index') }}">Produk Komoditi</a>
                </li>
                <li class="nav-item {{ Request::routeIs('riwayat_harga_komoditi.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('riwayat_harga_komoditi.index') }}">Riwayat Harga</a>
                </li>
                <li class="nav-item {{ Request::routeIs('profile.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('profile.index') }}">Developer Profile</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>