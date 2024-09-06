<div class="container-fluid">
    <div class="header">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    <i class="fas fa-store"></i> Sistema de Ventas
                    @if ($movimientosbasico->CuentaOrigen==='1')
                    <a class="fas fa-cash-register" href="#" id="Caja"> </a>
                    <input type="text" value="{{$caja->CuentaDefectoIngreso ?? NULL}}" id='CajaInput' style='display:none'>
                    @else
                    <a style="display: none" class="fas fa-cash-register" href="#" id="Caja"> </a>
                    <input type="text" value="" id='CajaInput' style='display:none'>
                    @endif

                    @if ($movimientosbasico->CuentaSalida==='1')
                    <a class="fas fa-wallet" href="#" id="OCaja"> </a>
                    <input type="text" value="{{$caja->CuentaDefectoSalida ?? NULL}}" id='CajaOnput' style='display:none'>
                    @else
                    <a style="display: none" class="fas fa-cash-register" href="#" id="OCaja"> </a>
                    <input type="text" value="" id='CajaOnput' style='display:none'>
                    @endif
                </div>
                
            </div>
            <div class="col-md-3">
                <select name="TipoMovimiento " class="form-control col-md-3" id="TipoMovimiento" >  
                    @php
                        $tiposMovimiento = [
                            'Descuento', 'Agregar', 'Alerta', 'Activo', 'Pasivo', 'Patrimonio', 'Ingresos', 'Gastos', 'CostoVenta', 'CostoPO', 'Deudoras', 'Acreedoras'
                        ];
                    @endphp
                    @foreach ($tiposMovimiento as $tipos)
                        @if ($movimientosbasico->$tipos === "1")
                        <option value="{{$tipos}}">{{$tipos}}</option>
                        @endif
                    @endforeach
                    
                </select>
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
            @if ($movimientosbasico->UsuarioOrigen==='1')
            <div class="col-md-3">
                <label for="buscarProveedor">Proveedor</label>
                <input type="text" id="Proveedor"  value="{{$caja->ProveedorDefecto ?? NULL}}" class="form-control" style='display:none'>
                <input type="text" id="buscarProveedor" class="form-control" placeholder="Buscar Proveedor..." readonly>
            </div>
            @else
            <div class="col-md-3" style="display: none">
                <label for="buscarProveedor">Proveedor</label>
                <input type="text" id="Proveedor"  value="" class="form-control" style='display:none'>
                <input type="text" id="buscarProveedor" class="form-control" placeholder="Buscar Proveedor..." readonly>
            </div>
          @endif
           @if ($movimientosbasico->UsuarioDestino==='1')
           <div class="col-md-3">
                <label for="buscarCliente">Usuario</label>
                <input type="text" id="Users" value="{{$caja->UsuarioDefecto ?? NULL}}" class="form-control" style='display:none'>
                <input type="text" id="buscarCliente" class="form-control" placeholder="Buscar cliente..." readonly>    
            </div>
           @else
            <div class="col-md-3" style="display: none">
                    <label for="buscarCliente">Usuario</label>
                    <input type="text" id="Users" value="" class="form-control" style='display:none'>
                    <input type="text" id="buscarCliente" class="form-control" placeholder="Buscar cliente..." readonly>    
                </div>
           @endif
            @if ($movimientosbasico->OrigenBodega==='1')
                <div class="col-md-3">
                    <label for="OrigenBodega_id">Bodega Origen</label>
                    <select class="form-select" id="OrigenBodega_id">
                        <option value="{{$caja->OrigenBodegaDefecto ?? NULL}}" >{{$caja->bodegao->Descripcion ?? "Seleccionar origen"}}</option>
                        @foreach ($parametizarcajas as $parametizarcaja)
                            <option value="{{ $parametizarcaja->bodegad_id }}">{{ $parametizarcaja->bodega->Descripcion }}</option>
                        @endforeach
                    </select>
                    <input type="text" id="BodegaOrigen" class="form-control" style='display:none'>
                </div>
            @else
                <div class="col-md-3" style="display: none">
                    <label for="OrigenBodega_id">Bodega Origen</label>
                    <select class="form-select" id="OrigenBodega_id">
                        <option value="" ></option>
                        @foreach ($parametizarcajas as $parametizarcaja)
                            <option value="{{ $parametizarcaja->bodegad_id }}">{{ $parametizarcaja->bodega->Descripcion }}</option>
                        @endforeach
                    </select>
                    <input type="text" id="BodegaOrigen" class="form-control" style='display:none'>
                </div>
            @endif
            @if ($movimientosbasico->DestinoBodega==='1')
            <div class="col-md-3">
                <label for="DestinoBodega_id">Bodega Destino</label>
                <input type="text" id="BodegaDestino" class="form-control" style='display:none'>
                <select class="form-select" id="DestinoBodega_id">
                    <option value="{{$caja->DestinoBodegaDefecto ?? NULL}}">{{$caja->bodegad->Descripcion  ?? "Seleccionar origen"}}</option>
                    @foreach ($parametizarcajas as $parametizarcaja)
                        <option value="{{ $parametizarcaja->bodegad_id }}">{{ $parametizarcaja->bodega->Descripcion }}</option>
                    @endforeach
                </select>
            </div>
            @else
                <div class="col-md-3" style="display: none">
                    <label for="DestinoBodega_id">Bodega Destino</label>
                    <input type="text" id="BodegaDestino" class="form-control" style='display:none'>
                    <select class="form-select" id="DestinoBodega_id">
                        <option value=""></option>
                        @foreach ($parametizarcajas as $parametizarcaja)
                            <option value="{{ $parametizarcaja->bodegad_id }}">{{ $parametizarcaja->bodega->Descripcion }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            
        </div>
    </div>

    <div class="product-table">
        <div class="row">
            <div class="col-sm-8 mb-1">
                <input type="text" id="buscarProducto" class="form-control" placeholder="Buscar producto por código o nombre...">
            </div>
           
            <div class="col-sm-2 mb-1">
                <input type="text" id="CantidadIngreso" class="form-control" placeholder="Cantidad Ingreso">
            </div>
        </div>
        
        <div >
            <table id="ventasTable" class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Descripción</th>
                        
                        <th>Cantidad </th>
                        <th>Impuestos %</th>
                        <th>Descuento</th>
                        <th>Precio</th>
                        <th>Total</th>
                        
                        <th>Observacion</th>
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
                <i class="fas fa-star"></i> Impuestos : <span id="grandImpuestos">$0.00</span>
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
        <button id="finalizarMovimientoBtn" class="btn btn-success"> Movimiento Pendiente</button>
        <button id="abrirCobroBtn" class="btn btn-warning"> FinalizarCobro</button>
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

 <!-- Modal para movimientos Cierre -->
<div id="movimientosModal" class="modal fade" tabindex="-1" aria-labelledby="movimientosModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="movimientosModalLabel">Movimientos Pendientes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Aquí se cargarán los movimientos pendientes -->
                <div id="movimientosContent" class="table-responsive">
                    <!-- El contenido de la tabla se carga dinámicamente -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal para movimientos pendientes -->
<div class="modal fade" id="pendientesModal" tabindex="-1" aria-labelledby="pendientesModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-headequer">
            <h5 class="modal-title" id="pendientesModalLabel">Movimientos Pendientes</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <!-- Lado izquierdo: Productos -->
                <div class="col-md-6">
                    <h6>Productos</h6>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="productosTableBody">
                            <!-- Se llenará dinámicamente -->
                        </tbody>
                    </table>
                </div>
                <!-- Lado derecho: Movimientos -->
                <div class="col-md-6">
                    <h6>Movimientos</h6>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Documento</th>
                                <th>Fecha y Hora</th>
                                <th>Cliente</th>
                                <th>Total</th>
                                <th>Imprimir</th>
                            </tr>
                        </thead>
                        <tbody id="movimientosTableBody">
                            <!-- Se llenará dinámicamente -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div>Cliente: <span id="clienteSeleccionado"></span></div>
                    <div>Asesor: <span id="asesorSeleccionado"></span></div>
                </div>
                <div class="col-md-6">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Tipo Pago</th>
                                <th>Valor</th>
                                <th>Entidad</th>
                                <th>Autorización</th>
                            </tr>
                        </thead>
                        <tbody id="pagoTableBody">
                            <!-- Se llenará dinámicamente -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="editarMovimientoBtn">Editar Movimiento</button>
        </div>
    </div>
</div>
</div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- DataTables Core -->
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<!-- DataTables Buttons -->
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>

<!-- DataTables Responsive -->
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap4.min.js"></script>

@include('movimientos.usuarios')