<!DOCTYPE html>
<html lang="es">

<head>
    @php
        $movimientosbasico = App\Models\Movimientosbasico::find($TipoMovimiento);
        $caja = App\Models\Caja::find($caja);
        $parametizarcajas = App\Models\Parametizarcaja::where('caja_id', $caja->id)
                      ->where('estado', 'Activo')
                      ->get();
    @endphp
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
      :root {
            --primary-color: #2c3e50;
            --secondary-color: #34495e;
            --background-color: #f5f5f5;
            --text-color: #333;
            --border-color: #dcdcdc;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        .container-fluid {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            background-color: white;
            border: 1px solid var(--border-color);
            padding: 15px;
            margin-bottom: 20px;
        }

        .logo {
            font-size: 20px;
            font-weight: bold;
            color: var(--primary-color);
        }

        .date-box {
            background-color: var(--primary-color);
            color: white;
            padding: 8px;
            text-align: center;
            font-size: 14px;
        }

        .product-table {
            background-color: white;
            border: 1px solid var(--border-color);
            padding: 15px;
            margin-bottom: 20px;
            overflow-x: auto;
        }

        .product-table th {
            background-color: var(--secondary-color);
            color: white;
        }

        .footer {
            background-color: white;
            border: 1px solid var(--border-color);
            padding: 15px;
            margin-top: 20px;
        }

        .total-section {
            background-color: var(--secondary-color);
            color: white;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(44, 62, 80, 0.25);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-success {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-warning {
            background-color: #f39c12;
            border-color: #f39c12;
            color: white;
        }

        @media (max-width: 768px) {
            .container-fluid {
                padding: 10px;
            }

            .header, .product-table, .footer {
                padding: 10px;
            }

            .logo {
                font-size: 18px;
            }

            .date-box {
                font-size: 12px;
            }
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
                        <a class="fas fa-cash-register" href="#" id="Caja"> </a>
                        <a class="fas fa-wallet" href="#" id="OCaja"> </a>
                        <input type="text" id='CajaInput' style='display:none'>
                        <input type="text" id='CajaOnput' style='display:none'>
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
                    <input type="text" id="Proveedor" class="form-control" style='display:none'>
                    <input type="text" id="buscarProveedor" class="form-control" placeholder="Buscar Proveedor..." readonly>
                </div>
                <div class="col-md-3">
                    <label for="buscarCliente">Usuario</label>
                    <input type="text" id="Users" class="form-control" style='display:none'>
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
                    <input type="text" id="BodegaOrigen" class="form-control" style='display:none'>
                </div>
                <div class="col-md-3">
                    <label for="DestinoBodega_id">Bodega Destino</label>
                    <input type="text" id="BodegaDestino" class="form-control" style='display:none'>
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
            <div class="row">
                <div class="col-sm-8 mb-1">
                    <input type="text" id="buscarProducto" class="form-control" placeholder="Buscar producto por código o nombre...">
                </div>
                <div class=" col-sm-2 mb-1">
                    <input type="text" id="CantidadEngreso" class="form-control" placeholder="Cantidad Engreso">
                </div>
                <div class="col-sm-2 mb-1">
                    <input type="text" id="CantidadIngreso" class="form-control" placeholder="Cantidad Ingreso">
                </div>
            </div>
            
            <div class="table-responsive">
                <table id="ventasTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Cantidad E</th>
                            <th>Cantidad I</th>
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

        <div class="mt-3">
            <button id="buscarPendientesBtn" class="btn btn-primary">Buscar Pendientes</button>
            <button id="finalizarMovimientoBtn" class="btn btn-success">Finalizar Movimiento</button>
            <button id="abrirCobroBtn" class="btn btn-warning">Abrir Cobro</button>
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

    <!-- Modal para movimientos pendientes -->
    <div class="modal fade" id="pendientesModal" tabindex="-1" aria-labelledby="pendientesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pendientesModalLabel">Movimientos Pendientes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="pendientesTableBody">
                            <!-- Se llenará dinámicamente -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
  

    $(document).ready(function() {
        window.updateCuentaI = async function (event, id) {
    var inputElement = event.target;
    var cantidadIngreso = inputElement.value;
    var row = $(inputElement).closest('tr');
    var precioUnitario = parseFloat(row.find('td:eq(4)').text());

    $.ajax({
        url: `{{ route("movimientosdatallados.update", "") }}/${id}`,
        method: 'PATCH',
        data: {
            Cantidad_Ingreso: cantidadIngreso,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            // Actualizar el total de la fila
            var nuevoTotal = cantidadIngreso * precioUnitario;
            row.find('.total').text(nuevoTotal.toFixed(2));
            
            // Recalcular y actualizar totales
            actualizarTotales();
        },
        error: function(error) {
            console.error('Error al actualizar el movimiento:', error);
        }
    });
}

window.updateCuentaE = async function(event, id) {
    var inputElement = event.target;
    var cantidadEgreso = inputElement.value;
    var row = $(inputElement).closest('tr');
    var precioUnitario = parseFloat(row.find('td:eq(4)').text());

    $.ajax({
        url: `{{ route("movimientosdatallados.update", "") }}/${id}`,
        method: 'PATCH',
        data: {
            Cantidad_Egreso: cantidadEgreso,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            // Actualizar el total de la fila
            var nuevoTotal = cantidadEgreso * precioUnitario;
            row.find('.total').text(nuevoTotal.toFixed(2));
            
            // Recalcular y actualizar totales
            actualizarTotales();
        },
        error: function(error) {
            console.error('Error al actualizar el movimiento:', error);
        }
    });
}



        let Movimientos = null;
        const searchModal = new bootstrap.Modal(document.getElementById('searchModal'));
        const pendientesModal = new bootstrap.Modal(document.getElementById('pendientesModal'));
        let currentSearchType = '';

        // Funciones de búsqueda y modal
        function openSearchModal(type) {
            currentSearchType = type;
            let labelText, placeholderText;
            switch(type) {
                case 'cliente':
                    labelText = 'Cliente';
                    placeholderText = 'Ingrese nombre o ID de cliente';
                    break;
                case 'proveedor':
                    labelText = 'Proveedor';
                    placeholderText = 'Ingrese nombre o ID de proveedor';
                    break;
                case 'caja':
                    labelText = 'Caja';
                    placeholderText = 'Ingrese nombre o ID de caja';
                    break;
                case 'ocaja':
                    labelText = 'OCaja';
                    placeholderText = 'Ingrese nombre o ID de OCaja';
                    break;
                default:
                    labelText = 'Bodega';
                    placeholderText = 'Ingrese nombre o ID de bodega';
                    break;
            }
            $('#searchModalLabel').text('Buscar ' + labelText);
            $('#searchModalInput').val('').attr('placeholder', placeholderText);
            $('#searchResults').empty(); // Limpiar resultados anteriores
            searchModal.show();
        }

        $('#OrigenBodega_id, #DestinoBodega_id').on('change', function() {
            var origenValue = $('#OrigenBodega_id').val();
            var destinoValue = $('#DestinoBodega_id').val();
            $('#BodegaOrigen').val(origenValue);
            $('#BodegaDestino').val(destinoValue);
        });

        $('#buscarCliente, #buscarProveedor, #Caja, #OCaja').on('click focus', function() {
            const type = this.id.replace('buscar', '').toLowerCase().replace('_id', '');
            openSearchModal(type);
        });

        $('#searchModalInput').on('input', function() {
            const termino = $(this).val();
            buscar(termino);
        });

        function buscar(termino) {
            let url;
            switch(currentSearchType) {
                case 'cliente':
                    url = '{{ route("cliente.buscar") }}';
                    break;
                case 'proveedor':
                    url = '{{ route("proveedor.BuscarProveedor") }}';
                    break;
                case 'caja':
                case 'ocaja':
                    url = '{{ route("cuenta.buscar") }}';
                    break;
            }
            
            $.ajax({
                url: url,
                method: 'GET',
                data: { term: termino },
                success: mostrarResultados,
                error: error => console.error('Error en la búsqueda:', error)
            });
        }

        function mostrarResultados(resultados) {
            const html = resultados.map(item => 
                `<div class="search-item" data-id="${item.id}" data-nombre="${item.RazonSocial || item.Nombre || item.Descripcion}">
                    ${item.RazonSocial || item.Nombre || item.Descripcion} - ${item.NumeroDocumento || item.Codigo}
                </div>`
            ).join('');
            $('#searchResults').html(html);
        }

        $(document).on('click', '.search-item', function() {
            const id = $(this).data('id');
            const nombre = $(this).data('nombre');
            let inputId, hiddenInputId;

            switch(currentSearchType) {
                case 'cliente':
                    inputId = '#buscarCliente';
                    hiddenInputId = '#Users';
                    break;
                case 'proveedor':
                    inputId = '#buscarProveedor';
                    hiddenInputId = '#Proveedor';
                    break;
                case 'caja':
                    inputId = '#Caja';
                    hiddenInputId = '#CajaInput';
                    break;
                case 'ocaja':
                    inputId = '#OCaja';
                    hiddenInputId = '#CajaOnput';
                    break;
                default:
                    inputId = '#buscarBodega';
                    hiddenInputId = '#Bodega';
                    break;
            }

            $(inputId).val(nombre);
            $(hiddenInputId).val(id);
            searchModal.hide();
        });

        // Actualización de fecha
        function updateDate() {
            const date = new Date();
            const options = { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit' };
            document.getElementById('currentDate').textContent = date.toLocaleDateString('es-ES', options).replace(',', ' -');
        }

        updateDate();
        setInterval(updateDate, 60000);  // Actualizar cada minuto

        // Autocomplete de productos
        $("#buscarProducto").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: '{{ route("producto.buscar") }}',
                    data: { term: request.term },
                    success: function(data) {
                        response(data.map(function(item) {
                            return {
                                label: `${item.Descripcion} - ${item.producto.id} - ${item.producto.Descripcion}`,
                                value: item.producto.Descripcion,
                                id: item.producto.id,
                                codigo: item.Codigo,
                                precio: item.producto.actualizarprecios[0].ValorPublico
                            };
                        }));
                    },
                    error: error => console.error('Error en la búsqueda:', error)
                });
            },
            select: function(event, ui) {
                agregarProducto(ui.item).catch(error => console.error('Error al agregar producto:', error));
                $(this).val(''); // Limpiar el campo después de seleccionar
                return false;
            }
        });

        $('#buscarProducto').on('keypress', function(event) {
            if (event.keyCode === 13) {
                const autocompleteInstance = $(this).autocomplete('instance');
                const firstItem = autocompleteInstance.menu.element.find('li:first').data('ui-autocomplete-item');
                if (firstItem) {
                    agregarProducto(firstItem).catch(error => console.error('Error al agregar producto:', error));
                    $(this).val('');
                    event.preventDefault();
                }
            }
        });
        $('#CantidadIngreso').on('keypress', function(event) {
            if (event.keyCode === 13) {
                const autocompleteInstance = $(this).autocomplete('instance');
                const firstItem = autocompleteInstance.menu.element.find('li:first').data('ui-autocomplete-item');
                if (firstItem) {
                    agregarProducto(firstItem).catch(error => console.error('Error al agregar producto:', error));
                    $(this).val('');
                    event.preventDefault();
                }
            }
        });
        $('#CantidadEngreso').on('keypress', function(event) {
            if (event.keyCode === 13) {
                const autocompleteInstance = $(this).autocomplete('instance');
                const firstItem = autocompleteInstance.menu.element.find('li:first').data('ui-autocomplete-item');
                if (firstItem) {
                    agregarProducto(firstItem).catch(error => console.error('Error al agregar producto:', error));
                    $(this).val('');
                    event.preventDefault();
                }
            }
        });

        // Funciones de manejo de movimientos y productos
        function CrearDetalle() {
            return new Promise((resolve, reject) => {
                const origenBodega = $('#BodegaOrigen').val();
                const proveedor = $('#Proveedor').val();
                const usuarioDestino = $('#Users').val();
                const destinoBodega = $('#BodegaDestino').val();
                const CuentaEn = $('#CajaInput').val();
                const CuentaSL = $('#CajaOnput').val();
                const data = {
                    users_id: '{{$users}}',
                    Caja_id: '{{$caja->id}}',
                    TipoMovimiento_id: '{{$TipoMovimiento}}',
                    OrigenBodega_id: origenBodega,
                    Cuenta_Salida: CuentaSL,
                    Cuenta_Entrada: CuentaEn,
                    OrigenProveedor_id: proveedor,
                    UsuarioDestino_id: usuarioDestino,
                    DestinoBodega_id: destinoBodega,
                    estado: 'Pendiente'
                };

                fetch('{{Route("movimientos.CrearMovimientosDetalle")}}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => {
                    if (!response.ok) throw new Error('Error en la solicitud');
                    return response.json();
                })
                .then(resolve)
                .catch(reject);
            });
        }

        function CrearMovimiento(Movimientos_ids, Producto_ids,Cantidad_Ingresos, Valor_Unitarios, TotalValors, Impuesto_ids,  Cantidad_Egresos,users_ids) {
            return new Promise((resolve, reject) => {
                const data = {
                    Movimientos_id:Movimientos_ids, 
                    Producto_id:Producto_ids,
                    Cantidad_Ingreso:Cantidad_Ingresos, 
                    Valor_Unitario:Valor_Unitarios, 
                    TotalValor:TotalValors, 
                    Impuesto_id:Impuesto_ids, 
                    Cantidad_Egreso:Cantidad_Egresos, 
                    users_id:users_ids, 
                };

                fetch('{{Route("movimientosdatallados.store")}}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => {
                    if (!response.ok) throw new Error('Error en la solicitud');
                    return response.json();
                })
                .then(resolve)
                .catch(reject);
            });
        }

        async function agregarProducto(producto) {
            if (Movimientos == null) {
                try {
                    Movimientos = await CrearDetalle();
                } catch (error) {
                    console.error('Error al crear detalle:', error);
                    return;
                }
            }

            try {
               var cantidI= $("#CantidadIngreso").val();
               if (cantidI == null|| cantidI =="") {
                cantidI=1;
               }
               var cantidE = $("#CantidadEngreso").val();
               if (cantidE == null|| cantidE =="") {
                cantidE=1;
               }
                await CrearMovimiento(Movimientos.id, producto.id, cantidI, producto.precio, producto.precio, '', cantidE ,{{$users}});
            } catch (error) {
                console.error('Error al crear movimiento:', error);
                return;
            }

            const row = `
                <tr>
                    <td>${producto.id}</td>
                    <td>${producto.value}</td>
                    <td><input type="number" class="form-control cantidad" onchange="CantdadE(event,${producto.id})" value="1" min="1"></td>
                    <td><input type="number" class="form-control cantidadI"  onchange="CantdadI(event,${producto.id})"  value="1" min="1"></td>
                    <td>${producto.precio}</td>
                    <td class="total">${producto.precio}</td>
                    <td><button class="btn btn-danger btn-sm eliminar"><i class="fas fa-trash"></i></button></td>
                </tr>`;
            $("#ventasTable tbody").append(row);
            actualizarTotales();
        }

        // Eventos de tabla de productos
        $(document).on('input', '.cantidad', function() {
            const row = $(this).closest('tr');
            const cantidad = $(this).val();
            const precio = parseFloat(row.find('td:eq(3)').text());
            const total = cantidad * precio;
            row.find('.total').text(total.toFixed(2));
           
            actualizarTotales();

        });
     
        
        $(document).on('click', '.eliminar', function() {
            $(this).closest('tr').remove();
            actualizarTotales();
        });

        function actualizarTotales() {
            let totalUnidades = 0, totalFilas = 0, totalGeneral = 0;
            $('#ventasTable tbody tr').each(function() {
                totalFilas++;
                const cantidadIngreso = parseInt($(this).find('input.cantidadI').val()) || 0;
                const cantidadEgreso = parseInt($(this).find('input.cantidad').val()) || 0;
                const total = parseFloat($(this).find('.total').text()) || 0;
                totalUnidades += cantidadIngreso + cantidadEgreso;
                totalGeneral += total;
            });
            $('#rowCount').text(totalFilas);
            $('#unitCount').text(totalUnidades);
            $('#grandTotal').text('$' + totalGeneral.toFixed(2));
        }

        // Buscar movimientos pendientes
        $('#buscarPendientesBtn').on('click', buscarMovimientosPendientes);

        function buscarMovimientosPendientes() {
            $.ajax({
                url: '{{ route("movimientos.pendientes") }}',
                method: 'GET',
                success: function(data) {
                    mostrarMovimientosPendientes(data);
                    console.log(data);
                    
                },
                error: function(error) {
                    console.error('Error al buscar movimientos pendientes:', error);
                }
            });
        }

        function mostrarMovimientosPendientes(movimientos) {
    let html = '';
    
    // Verificar si movimientos es un array
    if (Array.isArray(movimientos)) {
        movimientos.forEach(movimiento => {
            html += crearFilaMovimiento(movimiento);
        });
    } 
    // Si es un objeto, podría ser un solo movimiento o una respuesta con estructura diferente
    else if (typeof movimientos === 'object' && movimientos !== null) {
        // Si tiene una propiedad 'data', asumimos que es la estructura de respuesta de Laravel
        if (Array.isArray(movimientos.data)) {
            movimientos.data.forEach(movimiento => {
                html += crearFilaMovimiento(movimiento);
            });
        } else {
            // Si no es un array, tratarlo como un solo movimiento
            html += crearFilaMovimiento(movimientos);
        }
    } else {
        console.error('Formato de movimientos no reconocido:', movimientos);
        html = '<tr><td colspan="4">No se pudieron cargar los movimientos</td></tr>';
    }

    $('#pendientesTableBody').html(html);
    pendientesModal.show();
}

function crearFilaMovimiento(movimiento) {
    console.log(movimiento);
    
    return `
        <tr>
            <td>${movimiento.id}</td>
            <td>${movimiento.created_at || 'N/A'}</td>
            <td>$${(movimiento.total || 0).toFixed(2)}</td>
            <td>
                <button class="btn btn-primary btn-sm editarMovimiento" data-id="${movimiento.id}">Editar</button>
            </td>
        </tr>
    `;
}


// Evento para editar movimiento
$(document).on('click', '.editarMovimiento', function() {
    const movimientoId = $(this).data('id');
    cargarMovimientoPendiente(movimientoId);
});


function cargarMovimientoPendiente(movimientoId) {
    $.ajax({
        url: `{{ route('movimientos.obtener', '') }}/${movimientoId}`,
        method: 'GET',
        success: function(response) {
            console.log('Movimiento cargado:', response);
            if (response && response.id) {
                Movimientos = response;
                llenarFormularioConMovimiento(response);
                pendientesModal.hide();
            } else {
                alert('No se pudo cargar el movimiento');
            }
        },
        error: function(error) {
            console.error('Error al cargar el movimiento:', error);
            alert('Error al cargar el movimiento');
        }
    });
}

function llenarFormularioConMovimiento(movimiento) {
    // Llena los campos del formulario con los datos del movimiento
    $('#BodegaOrigen').val(movimiento.OrigenBodega_id);
    $('#BodegaDestino').val(movimiento.DestinoBodega_id);
    $('#OrigenBodega_id').val(movimiento.OrigenBodega_id).trigger('change');
    $('#DestinoBodega_id').val(movimiento.DestinoBodega_id).trigger('change');
    $('#Proveedor').val(movimiento.OrigenProveedor_id);
    $('#Users').val(movimiento.UsuarioDestino_id);
    $('#CajaInput').val(movimiento.Cuenta_Entrada);
    $('#CajaOnput').val(movimiento.Cuenta_Salida);

    // Limpiar la tabla de productos actual
    $('#ventasTable tbody').empty();

    // Cargar los productos del movimiento
    if (movimiento.movimientosdatallados && Array.isArray(movimiento.movimientosdatallados)) {
        movimiento.movimientosdatallados.forEach(detalle => {
            agregarProductoATabla(detalle);
        });
    }

    actualizarTotales();
}

function agregarProductoATabla(detalle) {
    const row = `
        <tr>
            <td>${detalle.Producto_id}</td>
            <td>${detalle.producto ? detalle.producto.Descripcion : 'N/A'}</td>
            <td><input type="number" class="form-control cantidad" onchange="updateCuentaE(event, ${detalle.id})" value="${detalle.Cantidad_Egreso}" min="0"></td>
            <td><input type="number" class="form-control cantidadI" onchange="updateCuentaI(event, ${detalle.id})" value="${detalle.Cantidad_Ingreso}" min="0"></td>
            <td>${detalle.Valor_Unitario}</td>
            <td class="total">${detalle.TotalValor}</td>
            <td><button class="btn btn-danger btn-sm eliminar"><i class="fas fa-trash"></i></button></td>
        </tr>`;
    $("#ventasTable tbody").append(row);
    actualizarTotales();
}



// Asegúrate de que esta función esté actualizada para manejar la edición
async function agregarProducto(producto) {
    if (Movimientos == null) {
        try {
            Movimientos = await CrearDetalle();
        } catch (error) {
            console.error('Error al crear detalle:', error);
            return;
        }
    }

    try {
        var cantidI= $("#CantidadIngreso").val();
        var cantidE = $("#CantidadEngreso").val();
        var cantidI= $("#CantidadIngreso").val();
               if (cantidI == null|| cantidI =="") {
                cantidI=1;
               }
               var cantidE = $("#CantidadEngreso").val();
               if (cantidE == null|| cantidE =="") {
                cantidE=1;
               }

        const nuevoMovimiento = await CrearMovimiento(Movimientos.id, producto.id, cantidI, producto.precio, producto.precio, '', cantidE,{{$users}});
        agregarProductoATabla(nuevoMovimiento);
    } catch (error) {
        console.error('Error al crear movimiento:', error);
        return;
    }

    actualizarTotales();
}

// Actualiza esta función si es necesario
function actualizarTotales() {
    let totalUnidades = 0, totalFilas = 0, totalGeneral = 0;
    $('#ventasTable tbody tr').each(function() {
        totalFilas++;
        const cantidad = parseInt($(this).find('.cantidad').val());
        const total = parseFloat($(this).find('.total').text());
        totalUnidades += cantidad;
        totalGeneral += total;
    });
    $('#rowCount').text(totalFilas);
    $('#unitCount').text(totalUnidades);
    $('#grandTotal').text('$' + totalGeneral.toFixed(2));
}
        // Finalizar movimiento
        $('#finalizarMovimientoBtn').on('click', function() {
            if (Movimientos) {
                $.ajax({
                    url: `{{ route("movimientos.update", "") }}/${Movimientos.id}`,
                    method: 'PUT',
                    data: {
                        estado: 'Finalizado',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert('Movimiento finalizado con éxito');
                        // Limpiar la interfaz o redirigir según sea necesario
                        limpiarInterfaz();
                    },
                    error: function(error) {
                        console.error('Error al finalizar el movimiento:', error);
                    }
                });
            } else {
                alert('No hay un movimiento activo para finalizar');
            }
        });

        // Abrir modal de cobro
        $('#abrirCobroBtn').on('click', abrirModalCobro);

        function abrirModalCobro() {
    let totalGeneral = parseFloat($('#grandTotal').text().replace('$', '').replace(',', '').trim());
    
    if (isNaN(totalGeneral)) {
        console.error('El total no es un número válido:', $('#grandTotal').text());
        totalGeneral = 0;
    }

    let valorSinImpuesto = totalGeneral / 1.19; // Asumiendo un IVA del 19%
    let valorImpuesto = totalGeneral - valorSinImpuesto;

    let modalHtml = `
        <div class="modal fade" id="cobroModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cobro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <h2 class="text-center mb-4">Total a cobrar: $<span id="totalACobrar">${totalGeneral.toFixed(2)}</span></h2>
                        <div class="form-group mb-3">
                            <label for="montoRecibido" class="form-label">Monto recibido:</label>
                            <input type="number" class="form-control form-control-lg" id="montoRecibido" placeholder="Ingrese el monto recibido">
                        </div>
                        <h3 class="mt-4">Cambio a devolver: $<span id="cambioADevolver">0.00</span></h3>
                        <p>Valor sin Impuesto: $${valorSinImpuesto.toFixed(2)}</p>
                        <p>Valor Impuesto: $${valorImpuesto.toFixed(2)}</p>
                        <select id="metodoPago" class="form-select mt-3">
                            <option value="efectivo">Efectivo</option>
                            <option value="tarjeta">Tarjeta</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="confirmarCobroBtn">Confirmar Cobro</button>
                    </div>
                </div>
            </div>
        </div>
    `;

    $('#cobroModal').remove();
    $('body').append(modalHtml);

    let cobroModal = new bootstrap.Modal(document.getElementById('cobroModal'));
    cobroModal.show();

    $('#cobroModal').on('shown.bs.modal', function () {
        $('#montoRecibido').focus();
    });

    $('#montoRecibido').on('input', function() {
        let montoRecibido = parseFloat($(this).val()) || 0;
        let cambio = montoRecibido - totalGeneral;
        $('#cambioADevolver').text(cambio.toFixed(2));
    });

    $('#confirmarCobroBtn').on('click', function() {
        let metodoPago = $('#metodoPago').val();
        let montoRecibido = parseFloat($('#montoRecibido').val()) || 0;
        if (montoRecibido >= totalGeneral) {
            finalizarCobro(totalGeneral, valorSinImpuesto, valorImpuesto, metodoPago, montoRecibido);
            cobroModal.hide();
        } else {
            alert('El monto recibido debe ser igual o mayor al total a cobrar.');
        }
    });
}

function finalizarCobro(total, valorSinImpuesto, valorImpuesto, metodoPago, montoRecibido) {
    if (Movimientos) {
        $.ajax({
            url: `{{ route("movimientos.update", "") }}/${Movimientos.id}`,
            method: 'PUT',
            data: {
                estado: 'Finalizado',
                total: total,
                valorSinImpuesto: valorSinImpuesto,
                valorImpuesto: valorImpuesto,
                metodoPago: metodoPago,
                montoRecibido: montoRecibido,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert('Cobro realizado con éxito');
                limpiarInterfaz();
            },
            error: function(error) {
                console.error('Error al finalizar el cobro:', error);
            }
        });
    } else {
        alert('No hay un movimiento activo para cobrar');
    }
}

        function limpiarInterfaz() {
            // Limpiar la tabla de productos
            $('#ventasTable tbody').empty();
            // Resetear totales
            $('#rowCount').text('0');
            $('#unitCount').text('0');
            $('#pointCount').text('0');
            $('#weightCount').text('0');
            $('#grandTotal').text('$0.00');
            // Limpiar campos de búsqueda
            $('#buscarProveedor, #buscarCliente, #OrigenBodega_id, #DestinoBodega_id').val('');
            // Resetear el objeto Movimientos
            Movimientos = null;
        }

        // Evento para la tecla F4 en PC (buscar pendientes)
        $(document).on('keydown', function(e) {
            if (e.which === 115) { // F4
                e.preventDefault();
                buscarMovimientosPendientes();
            }
        });

        // Evento para la tecla F2 en PC (abrir cobro)
        $(document).on('keydown', function(e) {
            if (e.which === 113) { // F2
                e.preventDefault();
                abrirModalCobro();
            }
        });
    });
    </script>
</body>
</html>