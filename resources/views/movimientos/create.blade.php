<!DOCTYPE html>
<html lang="es">
<head>
    @php
        $movimientosbasico = App\Models\Movimientosbasico::find($movimiento);
        $caja = App\Models\Caja::find($caja);
        $parametizarcajas = App\Models\Parametizarcaja::where('caja_id', $caja->id)
                      ->where('estado', 'Activo')
                      ->get();
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz de Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <style>
        body, html {
            height: 100%;
            background-color: #fff;
        }
        .container-fluid {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .header {
            background-color: #f0f0f0;
            border-bottom: 1px solid #F5A872;
        }
        .header-item {
            border: 1px solid #F5A872;
            background-color: #fff;
        }
        .logo {
            font-size: 24px;
            color: #7E6AAF;
        }
        .codigo-input {
            border: 1px solid #F5A872;
        }
        .table-container {
            flex-grow: 1;
            overflow: auto;
        }
        .table thead th {
            background-color: #64C195;
            color: white;
        }
        .footer {
            background-color: #eae6f5;
            border-top: 1px solid #F5A872;
        }
        .total-section {
            background-color: #7E6AAF;
            color: white;
        }
        .date-label {
            background-color: #fff;
            border: 1px solid #F5A872;
            font-size: 0.8rem;
        }
        .number-label {
            background-color: #7E6AAF;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="header py-2">
            <div class="row mx-0">
                <div class="col-md-8">
                    <div class="header-item mb-2 p-2">
                        <img src="{{asset('../resources/img/user.png')}}" width="50" height="50" alt="User" class="me-2">
                        <span class="fw-bold">CONSUMIDOR FINAL</span>
                    </div>
                    @if ( $movimientosbasico->OrigenBodega=="1" || $movimientosbasico->DestinoBodega=="1" )
                    <div class="header-item mb-2 p-2">
                        @if ($movimientosbasico->OrigenBodega=="1")
                            <label class="me-2">Origen:</label>
                            <select name="OrigenBodega_id" class="form-select form-select-sm d-inline-block w-auto" id="OrigenBodega_id">
                                <option value="">Seleccionar</option>
                                @foreach ($parametizarcajas as $parametizarcaja)
                                    <option value="{{$parametizarcaja->bodegad_id}}">{{$parametizarcaja->bodega->Descripcion}}</option> 
                                @endforeach
                            </select>
                        @endif
                        @if ($movimientosbasico->DestinoBodega=="1")
                            <label class="ms-3 me-2">Destino:</label>
                            <select name="DestinoBodega_id" class="form-select form-select-sm d-inline-block w-auto" id="DestinoBodega_id">
                                <option value="">Seleccionar</option>
                                @foreach ($parametizarcajas as $parametizarcaja)
                                    <option value="{{$parametizarcaja->bodegad_id}}">{{$parametizarcaja->bodega->Descripcion}}</option> 
                                @endforeach
                            </select>
                        @endif
                    </div>
                    @endif
                    
                    <div class="header-item p-2">
                        @if ($movimientosbasico->OrigenBodega=="1")
                            <label class="me-2">Proveedor:</label>
                            <input type="text" name="OrigenProveedor_id"  style="display: none" id="OrigenProveedor_id">
                            <input type="text" name="proveedorBuscar"  class="form-control form-control-sm d-inline-block w-auto" id="OrigenProveedor_id">
                        @endif
                        @if ($movimientosbasico->DestinoBodega=="1")
                            <label class="ms-3 me-2">Usuario:</label>
                            <input type="text" style="display: none" name="UsuarioDestino_id" id="UsuarioDestino_id">
                            <input type="text"  class="form-control form-control-sm d-inline-block w-auto" id="usuariosBuscar">
                        @endif
                    </div>
                </div>
                <div class="col-md-4 text-end">
                    <div class="date-label d-inline-block p-2">
                        <div id="currentDate"></div>
                        <div class="number-label p-2 mt-1 rounded">0{{$caja->id}}</div>
                    </div>
                </div>
            </div>
        </div>

        <input type="text" class="form-control codigo-input my-3" placeholder="Codigo">

        <div class="table-container px-3">
            <table id="ventasTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>CODIGO</th>
                        <th>DESCRIPCION</th>
                        <th>CANT</th>
                        <th>PRECIO</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Las filas de la tabla se llenarán dinámicamente con JavaScript -->
                </tbody>
            </table>
        </div>

        <div class="footer p-2">
            <div class="row">
                <div class="col-md-3">Filas: 0</div>
                <div class="col-md-3">Unidades: 0</div>
                <div class="col-md-3">Puntos: 0</div>
                <div class="col-md-3">Peso / Kg: 0</div>
            </div>
        </div>

        <div class="total-section p-2">
            <div class="row">
                <div class="col-6">Total</div>
                <div class="col-6 text-end" id="grandTotal">0</div>
            </div>
        </div>
    </div>
    <script>var CSRF = '{{ csrf_token() }}';</script>
    @include('movimientos.usuarios')
    @include('movimientos.proveedor')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        
        // Inicializar DataTable
        $(document).ready(function() {
            $('#ventasTable').DataTable({
                "paging": true,
                "searching": true,
                "info": false,
                "responsive": true
            });
        });

        // Función para actualizar la fecha actual
        function updateDate() {
            const date = new Date();
            const options = { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit' };
            document.getElementById('currentDate').textContent = date.toLocaleDateString('es-ES', options).replace(',', ' -');
        }

        // Llama a la función al cargar la página
        updateDate();
    </script>
</body>
</html>