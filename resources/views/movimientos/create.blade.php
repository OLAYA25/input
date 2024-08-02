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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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

        .search-item {
            cursor: pointer;
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        .search-item:hover {
            background-color: #f8f9fa;
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
                <div class="col-md-3">
                    <label for="buscarProveedor">Proveedor</label>
                    <input type="text" id="buscarProveedor" class="form-control" placeholder="Buscar Proveedor..." readonly>
                </div>
                <div class="col-md-3">
                    <label for="buscarCliente">Usuario</label>
                    <input type="text" id="buscarCliente" class="form-control" placeholder="Buscar cliente..." readonly>    
                </div>
                <div class="col-md-3">
                    <label for="OrigenBodega_id">Bodega Origen</label>
                    <select class="form-select" id="OrigenBodega_id">
                        <option value="">Seleccionar origen</option>
                        @foreach ($parametizarcajas as $parametizarcaja)
                            <option value="{{ $parametizarcaja->bodegad_id }}">{{ $parametizarcaja->bodega->Descripcion }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="DestinoBodega_id">Bodega Destino</label>
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
                <input type="text" id="buscarProducto" class="form-control" placeholder="Buscar producto por código o nombre...">
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

    <!-- Modal para buscar cliente o proveedor -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="searchModalLabel">Buscar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" id="searchModalInput" class="form-control" placeholder="Buscar...">
                    <div id="searchResults" class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $(document).ready(function() {
        var searchModal = new bootstrap.Modal(document.getElementById('searchModal'));
        var currentSearchType = '';

        function openSearchModal(type) {
            currentSearchType = type;
            $('#searchModalLabel').text('Buscar ' + (type === 'cliente' ? 'Cliente' : 'Proveedor'));
            $('#searchModalInput').val('').attr('placeholder', 'Ingrese nombre o ID de ' + type);
            searchModal.show();
        }

        $('#buscarCliente, #buscarProveedor').on('click focus', function() {
            var type = this.id.replace('buscar', '').toLowerCase();
            openSearchModal(type);
        });

        $('#searchModalInput').on('input', function() {
            var termino = $(this).val();
            buscar(termino);
        });

        function buscar(termino) {
            var url;
            switch(currentSearchType) {
                case 'cliente':
                    url = '{{ route("cliente.buscar") }}';
                    break;
                case 'proveedor':
                    url = '{{ route("proveedor.BuscarProveedor") }}';
                    break;
            }
            
            $.ajax({
                url: url,
                method: 'GET',
                data: { term: termino },
                success: function(data) {
                    mostrarResultados(data);
                },
                error: function(error) {
                    console.error('Error en la búsqueda:', error);
                }
            });
        }

        function mostrarResultados(resultados) {
            var html = '';
            resultados.forEach(function(item) {
                html += '<div class="search-item" data-id="' + item.id + '">' +
                        (item.RazonSocial || item.Nombre || item.Descripcion) + ' - ' + (item.NumeroDocumento || item.Codigo) +
                        '</div>';
            });
            $('#searchResults').html(html);
        }

        $(document).on('click', '.search-item', function() {
            var id = $(this).data('id');
            var nombre = $(this).text();
            switch(currentSearchType) {
                case 'cliente':
                    $('#buscarCliente').val(nombre);
                    break;
                case 'proveedor':
                    $('#buscarProveedor').val(nombre);
                    break;
            }
            searchModal.hide();
        });

        function updateDate() {
            const date = new Date();
            const options = { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit' };
            document.getElementById('currentDate').textContent = date.toLocaleDateString('es-ES', options).replace(',', ' -');
        }

        updateDate();
        setInterval(updateDate, 60000);  // Actualizar cada minuto

        $("#buscarProducto").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: '{{ route("producto.buscar") }}',
                    data: { term: request.term },
                    success: function(data) {
                        response(data.map(function(item) {
                            return {
                                label: item.Descripcion + ' - ' + item.Codigo,
                                value: item.Descripcion,
                                id: item.id,
                                codigo: item.Codigo,
                                precio: item.Precio
                            };
                        }));
                    },
                    error: function(error) {
                        console.error('Error en la búsqueda:', error);
                    }
                });
            },
            select: function(event, ui) {
                agregarProducto(ui.item);
                return false;
            }
        });

        $('#buscarProducto').on('keypress', function(event) {
            if (event.keyCode === 13) {
                var autocompleteInstance = $(this).autocomplete('instance');
                var firstItem = autocompleteInstance.menu.element.find('li:first').data('ui-autocomplete-item');
                if (firstItem) {
                    agregarProducto(firstItem);
                    $(this).val('');
                    event.preventDefault();
                }
            }
        });

        function agregarProducto(producto) {
            var row = `<tr>
                <td>${producto.codigo}</td>
                <td>${producto.value}</td>
                <td><input type="number" class="form-control cantidad" value="1" min="1"></td>
                <td>${producto.precio}</td>
                <td class="total">${producto.precio}</td>
                <td><button class="btn btn-danger btn-sm eliminar"><i class="fas fa-trash"></i></button></td>
            </tr>`;
            $("#ventasTable tbody").append(row);
            actualizarTotales();
        }

        $(document).on('input', '.cantidad', function() {
            var row = $(this).closest('tr');
            var cantidad = $(this).val();
            var precio = row.find('td:eq(3)').text();
            var total = cantidad * precio;
            row.find('.total').text(total.toFixed(2));
            actualizarTotales();
        });

        $(document).on('click', '.eliminar', function() {
            $(this).closest('tr').remove();
            actualizarTotales();
        });

        function actualizarTotales() {
            var totalUnidades = 0, totalFilas = 0, totalGeneral = 0;
            $('#ventasTable tbody tr').each(function() {
                totalFilas++;
                var cantidad = $(this).find('.cantidad').val();
                var total = $(this).find('.total').text();
                totalUnidades += parseInt(cantidad);
                totalGeneral += parseFloat(total);
            });
            $('#rowCount').text(totalFilas);
            $('#unitCount').text(totalUnidades);
            $('#grandTotal').text('$' + totalGeneral.toFixed(2));
        }
    });
    </script>
</body>
</html>
