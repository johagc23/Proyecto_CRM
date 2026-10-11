<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Prospecto - CRM IUJO</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Registrar Nuevo Prospecto</h4>
                        <a href="{{ route('clients.index') }}" class="btn btn-sm btn-outline-light">Volver</a>
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

                        <form action="{{ route('clients.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="nombre_empresa" class="form-label">Nombre de la Empresa</label>
                                <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" value="{{ old('nombre_empresa') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="contacto_principal" class="form-label">Contacto Principal</label>
                                <input type="text" class="form-control" id="contacto_principal" name="contacto_principal" value="{{ old('contacto_principal') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="telefono_whatsapp" class="form-label">Teléfono / WhatsApp</label>
                                <input type="text" class="form-control" id="telefono_whatsapp" name="telefono_whatsapp" value="{{ old('telefono_whatsapp') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="zona_geografica" class="form-label">Zona Geográfica</label>
                                <select class="form-select" id="zona_geografica" name="zona_geografica" required>
                                    <option value="">Seleccione una zona...</option>
                                    <option value="Oeste" {{ old('zona_geografica') == 'Oeste' ? 'selected' : '' }}>Oeste</option>
                                    <option value="Este" {{ old('zona_geografica') == 'Este' ? 'selected' : '' }}>Este</option>
                                    <option value="Cabudare" {{ old('zona_geografica') == 'Cabudare' ? 'selected' : '' }}>Cabudare</option>
                                    <option value="Centro" {{ old('zona_geografica') == 'Centro' ? 'selected' : '' }}>Centro</option>
                                    <option value="Zona Industrial" {{ old('zona_geografica') == 'Zona Industrial' ? 'selected' : '' }}>Zona Industrial</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="origin_id" class="form-label">Origen / Fuente</label>
                                <select class="form-select" id="origin_id" name="origin_id" required>
                                    <option value="">Seleccione el origen...</option>
                                    @foreach($origins as $origin)
                                        <option value="{{ $origin->id }}" {{ old('origin_id') == $origin->id ? 'selected' : '' }}>{{ $origin->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Guardar Prospecto</button>
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