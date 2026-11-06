<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AutoDrive Veículos')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('veiculos.index')
}}">AutoDrive</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('veiculos.index') }}">Veículos</a>
                <a class="nav-link" href="{{ route('marcas.index') }}">Marcas</a>
                <a class="btn btn-outline-light btn-sm ms-2" href="{{
route('veiculos.create') }}">+ Novo Veículo</a>
            </div>
        </div>
    </nav>
    <main class="container">
        @if(session('success')) <div class="alert alert-success">{{ session('success') }}
        </div> @endif
        @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @yield('content')
    </main>
</body>

</html>