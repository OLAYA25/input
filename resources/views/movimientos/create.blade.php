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
                        <a class=" fas fa-cash-register" href="#" id="Caja">   </a>
                        <a class=" fas fa-wallet" href="#" id="OCaja">   </a>
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
    let Movimientos = null;
    const searchModal = new bootstrap.Modal(document.getElementById('searchModal'));
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
                url = '{{ route("cuenta.buscar") }}';
                break;
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

    // Funciones de manejo de movimientos y productos
    function CrearDetalle() {
        return new Promise((resolve, reject) => {
            const origenBodega = $('#BodegaOrigen').val();
            const proveedor = $('#Proveedor').val();
            const usuarioDestino = $('#Users').val();
            const destinoBodega = $('#BodegaDestino').val();
            const CuentaEn = $('#CajaInput').val();
            const CuentaSL = $('#CajaOnput').val();
            console.log('OrigenBodega_id:', origenBodega);
            console.log('OrigenProveedor_id:', proveedor);
            console.log('UsuarioDestino_id:', usuarioDestino);
            console.log('DestinoBodega_id:', destinoBodega);
            console.log('DestinoBodega_id:', CuentaSL);
            console.log('DestinoBodega_id:', CuentaEn);
            const data = {
                users_id: '{{$users}}',
                Caja_id: '{{$caja->id}}',
                TipoMovimiento_id: '{{$TipoMovimiento}}',
                OrigenBodega_id: origenBodega,
                Cuenta_Salida :CuentaSL,
                Cuenta_Entrada :CuentaEn,
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

    function CrearMovimiento(Movimientos_id, Producto_id, Cantidad_Egreso, Valor_Unitario, TotalValor, Impuesto_id, users_id, Cantidad_Ingresos, ValorUnitario) {
        return new Promise((resolve, reject) => {
            const data = {
                Movimientos_id, Producto_id, Cantidad_Egreso, Valor_Unitario, 
                TotalValor, Impuesto_id, users_id, Cantidad_Ingresos, ValorUnitario
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
            await CrearMovimiento(Movimientos.id, producto.id, 1, producto.precio, producto.precio, '', {{$users}}, 0, 0);
        } catch (error) {
            console.error('Error al crear movimiento:', error);
            return;
        }

        const row = `
            <tr>
                <td>${producto.id}</td>
                <td>${producto.value}</td>
                <td><input type="number" class="form-control cantidad" value="1" min="1"></td>
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
            const cantidad = parseInt($(this).find('.cantidad').val());
            const total = parseFloat($(this).find('.total').text());
            totalUnidades += cantidad;
            totalGeneral += total;
        });
        $('#rowCount').text(totalFilas);
        $('#unitCount').text(totalUnidades);
        $('#grandTotal').text('$' + totalGeneral.toFixed(2));
    }
});

  
    </script>
</body>
</html>
