<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitácora de Interacciones - CRM IUJO</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1 class="fw-bold text-dark">Bitácora de Interacciones y Seguimiento</h1>
                <p class="text-muted">Historial de llamadas, visitas y mensajes de WhatsApp - CRM IUJO</p>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('clients.index') }}" class="btn btn-outline-secondary me-2">Ver Clientes</a>
                <a href="{{ route('interactions.create') }}" class="btn btn-primary">Nueva Interacción</a>
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
                                <th>Fecha de Seguimiento</th>
                                <th>Cliente / Empresa</th>
                                <th>Tipo</th>
                                <th>Observaciones</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($interactions as $interaction)
                                <tr>
                                    <td>{{ $interaction->fecha_seguimiento }}</td>
                                    <td class="fw-semibold">{{ $interaction->client->nombre_empresa ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge 
                                            @if($interaction->tipo_interaccion == 'Llamada') bg-primary 
                                            @elseif($interaction->tipo_interaccion == 'Visita') bg-success 
                                            @else bg-info text-dark @endif">
                                            {{ $interaction->tipo_interaccion }}
                                        </span>
                                    </td>
                                    <td>{{ $interaction->observaciones }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('interactions.destroy', $interaction) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este registro?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">No hay interacciones registradas todavía.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Paginación -->
                <div class="mt-3">
                    {{ $interactions->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>