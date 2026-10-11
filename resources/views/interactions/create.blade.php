<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Interacción - CRM IUJO</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Registrar Nueva Interacción / Seguimiento</h4>
                        <a href="{{ route('interactions.index') }}" class="btn btn-sm btn-outline-light">Volver</a>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('interactions.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="client_id" class="form-label">Cliente / Prospecto</label>
                                <select class="form-select" id="client_id" name="client_id" required>
                                    <option value="">Seleccione el cliente...</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                            {{ $client->nombre_empresa }} (Contacto: {{ $client->contacto_principal }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="tipo_interaccion" class="form-label">Tipo de Interacción</label>
                                <select class="form-select" id="tipo_interaccion" name="tipo_interaccion" required>
                                    <option value="">Seleccione el tipo...</option>
                                    <option value="Llamada" {{ old('tipo_interaccion') == 'Llamada' ? 'selected' : '' }}>Llamada</option>
                                    <option value="Visita" {{ old('tipo_interaccion') == 'Visita' ? 'selected' : '' }}>Visita</option>
                                    <option value="WhatsApp" {{ old('tipo_interaccion') == 'WhatsApp' ? 'selected' : '' }}>WhatsApp</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="fecha_seguimiento" class="form-label">Fecha y Hora de Seguimiento</label>
                                <input type="datetime-local" class="form-control" id="fecha_seguimiento" name="fecha_seguimiento" value="{{ old('fecha_seguimiento') }}" required>
                            </div>

                            <div class="mb-4">
                                <label for="observaciones" class="form-label">Observaciones / Detalles</label>
                                <textarea class="form-control" id="observaciones" name="observaciones" rows="4" required>{{ old('observaciones') }}</textarea>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Guardar Interacción</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>