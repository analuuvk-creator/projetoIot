<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    @livewireStyles
</head>

<body>
    <div class="d-flex flex-column vh-100">
        <!-- TOPO -->
        <div class="border-bottom p-3 bg-white shadow-sm d-flex justify-content-between align-items-center">
            <h2 class="text-primary m-0 text-dark">
                <i class="bi bi-heart-pulse text-info"></i>
                Monitora IoT
            </h2>

            @auth
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle text-dark"
                        id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-4 me-2 text-secondary"></i>

                        <div class="d-none d-md-flex flex-column text-start me-2">
                            <strong class="lh-1">{{ auth()->user()->name }}</strong>
                            <small class="text-muted" style="font-size: 0.75rem;">
                                {{ auth()->user()->tipo ?? 'Sem Cargo' }}
                            </small>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownUser">
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-person me-2 text-info"></i> Meu Perfil
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('#') }}" class="m-0">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2 text-info"></i> Sair
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="#" class="btn btn-outline-primary btn-sm text-dark">
                    <i class="bi bi-box-arrow-in-right me-1 text-info"></i> Entrar
                </a>
            @endauth
        </div>

        <!-- CONTEÚDO -->
        <div class="d-flex flex-grow-1">
            <!-- SIDEBAR -->
            <div class="p-3 border-end bg-white shadow-sm" style="width: 250px;">
                <ul class="nav flex-column gap-2">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link active text-dark">
                            <i class="bi bi-grid-1x2-fill text-info"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('ambiente.index') }}" class="nav-link text-dark">
                            <i class="bi bi-door-open text-info"></i>
                            Ambientes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('sensor.index') }}" class="nav-link text-dark">
                            <i class="bi bi-qr-code text-info"></i>
                            Sensores
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark">
                            <i class="bi bi-activity text-info"></i>
                            Registros
                        </a>
                    </li>
                </ul>
            </div>

            <main class="flex-grow-1 p-4 overflow-auto">
                {{ $slot }}
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

    @livewireScripts
</body>

</html>
