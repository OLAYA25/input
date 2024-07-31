
    <!DOCTYPE html>
<html lang="es">
<head>
    
@php
        $movimientosbasico = App\Models\Movimientosbasico::find($movimiento->TipoMovimiento_id);
        $caja = App\Models\Caja::find($movimiento->Caja_id);
        $parametizarcajas = App\Models\Parametizarcaja::where('caja_id', $caja->id)
                      ->where('estado', 'Activo')
                      ->get();
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2ecc71;
            --background-color: #ecf0f1;
            --text-color: #34495e;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
        }

        .container-fluid {
            padding: 20px;
        }

        .header {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: var(--primary-color);
        }

        .date-box {
            background-color: var(--primary-color);
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }

        .product-table {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .product-table th {
            background-color: var(--primary-color);
            color: white;
        }

        .footer {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .total-section {
            background-color: var(--secondary-color);
            color: white;
            padding: 20px;
            border-radius: 10px;
            font-size: 24px;
            font-weight: bold;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="logo">
                        <i class="fas fa-store"></i> Sistema de Ventas
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="date-box">
                        <i class="far fa-calendar-alt"></i>
                        <span id="currentDate"></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="date-box">
                        <i class="fas fa-cash-register"></i>
                        Caja: 0{{ $caja->id }}
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Buscar cliente...">
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="OrigenBodega_id">
                        <option value="">Seleccionar origen</option>
                        @foreach ($parametizarcajas as $parametizarcaja)
                            <option value="{{ $parametizarcaja->bodegad_id }}">{{ $parametizarcaja->bodega->Descripcion }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="DestinoBodega_id">
                        <option value="">Seleccionar destino</option>
                        @foreach ($parametizarcajas as $parametizarcaja)
                            <option value="{{ $parametizarcaja->bodegad_id }}">{{ $parametizarcaja->bodega->Descripcion }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="product-table">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Buscar producto por código o nombre...">
            </div>
            <table id="ventasTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Las filas se llenarán dinámicamente con JavaScript -->
                </tbody>
            </table>
        </div>

        <div class="footer">
            <div class="row text-center">
                <div class="col-md-3">
                    <i class="fas fa-list"></i> Filas: <span id="rowCount">0</span>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-box"></i> Unidades: <span id="unitCount">0</span>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-star"></i> Puntos: <span id="pointCount">0</span>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-weight"></i> Peso / Kg: <span id="weightCount">0</span>
                </div>
            </div>
        </div>

        <div class="total-section mt-3">
            <div class="row">
                <div class="col-6">Total</div>
                <div class="col-6 text-end" id="grandTotal">$0.00</div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function updateDate() {
            const date = new Date();
            const options = { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit' };
            document.getElementById('currentDate').textContent = date.toLocaleDateString('es-ES', options).replace(',', ' -');
        }

        updateDate();
        setInterval(updateDate, 60000);  // Actualizar cada minuto

        // Aquí irían las funciones para manejar la tabla de productos, cálculos, etc.
    </script>
</body>
</html>