<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Clientes - CRM IUJO</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1 class="fw-bold text-dark">Cartera de Prospectos</h1>
                <p class="text-muted">Gestión Integral de Negocios - IUJO Extensión Barquisimeto</p>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('clients.create') }}" class="btn btn-primary">Nuevo Prospecto</a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Empresa</th>
                                <th>Contacto</th>
                                <th>WhatsApp</th>
                                <th>Zona</th>
                                <th>Origen</th>
                                <th>Asesor</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($clients as $client)
                                <tr>
                                    <td class="fw-semibold">{{ $client->nombre_empresa }}</td>
                                    <td>{{ $client->contacto_principal }}</td>
                                    <td>{{ $client->telefono_whatsapp }}</td>
                                    <td><span class="badge bg-secondary">{{ $client->zona_geografica }}</span></td>
                                    <td>{{ $client->origin->name ?? 'N/A' }}</td>
                                    <td>{{ $client->user->name ?? 'N/A' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('clients.edit', $client) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('clients.destroy', $client) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este prospecto?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">No hay prospectos registrados todavía.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Paginación -->
                <div class="mt-3">
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>