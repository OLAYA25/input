@php
    $codigos = App\Models\Codigo::where('estado', 'Activo')->get();
    $caja = App\Models\Caja::where('estado', 'Activo')->pluck('Descripcion','id');
@endphp

<!-- Modal de Códigos -->
<div class="modal fade" id="codesModal" tabindex="-1" role="dialog" aria-labelledby="codesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="codesModalLabel">Lista de Códigos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Subcódigo</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($codigos as $code)
                            <tr>
                                <td>{{ $code->Codigo }}</td>
                                <td>{{ $code->Subcodigo }}</td>
                                <td>{{ $code->Descipcion }}</td>
                                <td>{{ $code->estado }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" onclick="seleccionarCodigo('{{ $code->id }}'); $('#codesModal').modal('hide');">
                                        Seleccionar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Formulario principal -->
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <!-- Código -->
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('Codigo PUC') }}
                    {{ Form::text('CodigoPredetermidao', $movimientosbasico->CodigoPredetermidao, ['class' => 'form-control' . ($errors->has('CodigoPredetermidao') ? ' is-invalid' : ''), 'placeholder' => 'CodigoPredetermidao', 'id' => 'codigo', 'readonly' => 'readonly']) }}
                    {!! $errors->first('CodigoPredetermidao', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#codesModal">
                    Ver Códigos
                </button>
            </div>
            
            <!-- Descripción -->
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('Descripcion') }}
                    {{ Form::text('Descripcion', $movimientosbasico->Descripcion, ['class' => 'form-control' . ($errors->has('Descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                    {!! $errors->first('Descripcion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            
            <!-- Código Predeterminado -->
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('Codigo') }}
                    {{ Form::text('Codigo', $movimientosbasico->Codigo, ['class' => 'form-control' . ($errors->has('Descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Codigo']) }}
                    {!! $errors->first('Descripcion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('Caja Predeterminada') }}
                    {{ Form::select('CajaPredeterminada', $caja,$movimientosbasico->CajaPredeterminada, ['class' => 'form-control' . ($errors->has('CajaPredeterminada') ? ' is-invalid' : ''), 'placeholder' => 'Caja Predeterminada']) }}
                    {!! $errors->first('CajaPredeterminada', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            
        </div>
        
        <div class="row">
        <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Titulo Pie Pagina') }}
                    {{ Form::text('TituloPiePagina', $movimientosbasico->TituloPiePagina, ['class' => 'form-control' . ($errors->has('Descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Titulo Pie Pagina']) }}
                    {!! $errors->first('Descripcion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('Pie Pagina') }}
                    {{ Form::text('PiePagina', $movimientosbasico->PiePagina, ['class' => 'form-control' . ($errors->has('Descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Pie Pagina', 'rows' => 4]) }}
                    {!! $errors->first('Descripcion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <!-- Opciones de movimiento -->
            <div class="col-md-3">
                <h5>Opciones de movimiento en Bodega:</h5>
                <ul class="list-unstyled">
                    <li>
                        <div class="form-check">
                            {{ Form::checkbox('Descuento', 1, $movimientosbasico->Descuento, ['class' => 'form-check-input' . ($errors->has('Descuento') ? ' is-invalid' : ''), 'id' => 'descuento']) }}
                            <label for="descuento" class="form-check-label">Descuento</label>
                            @error('Descuento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            {{ Form::checkbox('Agregar', 1, $movimientosbasico->Agregar, ['class' => 'form-check-input' . ($errors->has('Agregar') ? ' is-invalid' : ''), 'id' => 'agregar']) }}
                            <label for="agregar" class="form-check-label">Agregar</label>
                            @error('Agregar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            {{ Form::checkbox('Alerta', 1, $movimientosbasico->Alerta, ['class' => 'form-check-input' . ($errors->has('Alerta') ? ' is-invalid' : ''), 'id' => 'alerta']) }}
                            <label for="alerta" class="form-check-label">Alerta</label>
                            @error('Alerta')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </li>
                </ul>
            </div>
            
            <!-- Opciones de bodega -->
            <div class="col-md-2">
                <h5>Opciones de bodega:</h5>
                <ul class="list-unstyled">
                    <li>
                        <div class="form-check">
                            {{ Form::checkbox('OrigenBodega', 1, $movimientosbasico->OrigenBodega, ['class' => 'form-check-input' . ($errors->has('OrigenBodega') ? ' is-invalid' : ''), 'id' => 'origenBodega']) }}
                            <label for="origenBodega" class="form-check-label">Origen Bodega</label>
                            @error('OrigenBodega')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            {{ Form::checkbox('DestinoBodega', 1, $movimientosbasico->DestinoBodega, ['class' => 'form-check-input' . ($errors->has('DestinoBodega') ? ' is-invalid' : ''), 'id' => 'destinoBodega']) }}
                            <label for="destinoBodega" class="form-check-label">Destino Bodega</label>
                            @error('DestinoBodega')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </li>
                </ul>
            </div>
            
            <!-- Opciones de usuario -->
            <div class="col-md-2">
                <h5>Opciones de usuario:</h5>
                <ul class="list-unstyled">
                    <li>
                        <div class="form-check">
                            {{ Form::checkbox('UsuarioOrigen', 1, $movimientosbasico->UsuarioOrigen, ['class' => 'form-check-input' . ($errors->has('UsuarioOrigen') ? ' is-invalid' : ''), 'id' => 'usuarioOrigen']) }}
                            <label for="usuarioOrigen" class="form-check-label">Usuario Origen</label>
                            @error('UsuarioOrigen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            {{ Form::checkbox('UsuarioDestino', 1, $movimientosbasico->UsuarioDestino, ['class' => 'form-check-input' . ($errors->has('UsuarioDestino') ? ' is-invalid' : ''), 'id' => 'usuarioDestino']) }}
                            <label for="usuarioDestino" class="form-check-label">Usuario Destino</label>
                            @error('UsuarioDestino')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </li>
                </ul>
            </div>
             <!-- Opciones de usuario -->
             <div class="col-md-2">
                <h5>Cuentas:</h5>
                <ul class="list-unstyled">
                    <li>
                        <div class="form-check">
                            {{ Form::checkbox('CuentaOrigen', 1, $movimientosbasico->CuentaOrigen, ['class' => 'form-check-input' . ($errors->has('UsuarioOrigen') ? ' is-invalid' : ''), 'id' => 'CuentaOrigen']) }}
                            <label for="Cuenta Entrada" class="form-check-label">Cuenta Entrada</label>
                            @error('CuentaOrigen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            {{ Form::checkbox('CuentaSalida', 1, $movimientosbasico->CuentaSalida, ['class' => 'form-check-input' . ($errors->has('CuentaSalida') ? ' is-invalid' : ''), 'id' => 'CuentaSalida']) }}
                            <label for="CuentaSalida" class="form-check-label">Cuenta Salida </label>
                            @error('CuentaSalida')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </li>
                </ul>
            </div>

           
            
           


            <div class="col-md-3">
                <h5>Opciones de Cuentas:</h5>
                <ul class="list-unstyled">
                    <li>
                        <div class="form-check">
                            {{ Form::checkbox('Activo', 1, $movimientosbasico->Activo, ['class' => 'form-check-input' . ($errors->has('UsuarioOrigen') ? ' is-invalid' : ''), 'id' => 'Activo']) }}
                            <label for="Cuenta Entrada" class="form-check-label"> ACTIVO</label>
                            @error('CuentaOrigen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            {{ Form::checkbox('Pasivo', 1, $movimientosbasico->Pasivo, ['class' => 'form-check-input' . ($errors->has('Pasivo') ? ' is-invalid' : ''), 'id' => 'Pasivo']) }}
                            <label for="Pasivo" class="form-check-label">PASIVO </label>
                            @error('CuentaSalida')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </li>
                    
                    
                   
                    <li>
                        <div class="form-check">
                            {{ Form::checkbox('Patrimonio', 1, $movimientosbasico->Patrimonio, ['class' => 'form-check-input' . ($errors->has('Patrimonio') ? ' is-invalid' : ''), 'id' => 'Patrimonio']) }}
                            <label for="Patrimonio" class="form-check-label"> PATRIMONIO</label>
                            @error('Patrimonio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            {{ Form::checkbox('Ingresos', 1, $movimientosbasico->Ingresos, ['class' => 'form-check-input' . ($errors->has('Ingresos') ? ' is-invalid' : ''), 'id' => 'Ingresos']) }}
                            <label for="Ingresos" class="form-check-label"> INGRESOS</label>
                            @error('Ingresos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            {{ Form::checkbox('Gastos', 1, $movimientosbasico->Gastos, ['class' => 'form-check-input' . ($errors->has('Gastos') ? ' is-invalid' : ''), 'id' => 'Gastos']) }}
                            <label for="Gastos" class="form-check-label">  GASTOS</label>
                            @error('Gastos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            {{ Form::checkbox('CostoVenta', 1, $movimientosbasico->CostoVenta, ['class' => 'form-check-input' . ($errors->has('CostoVenta') ? ' is-invalid' : ''), 'id' => 'CostoVenta']) }}
                            <label for="CostoVenta" class="form-check-label">  COSTOS DE VENTAS</label>
                            @error('CostoVenta')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            {{ Form::checkbox('CostoPO', 1, $movimientosbasico->CostoPO, ['class' => 'form-check-input' . ($errors->has('CostoPO') ? ' is-invalid' : ''), 'id' => 'CostoPO']) }}
                            <label for="CostoPO" class="form-check-label">  CS PRODUCCION- OPERACION</label>
                            @error('CuentaSalida')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            {{ Form::checkbox('Deudoras', 1, $movimientosbasico->Deudoras, ['class' => 'form-check-input' . ($errors->has('Deudoras') ? ' is-invalid' : ''), 'id' => 'Deudoras']) }}
                            <label for="Deudoras" class="form-check-label"> CUENTAS DEUDORAS </label>
                            @error('Deudoras')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            {{ Form::checkbox('Acreedoras', 1, $movimientosbasico->Acreedoras, ['class' => 'form-check-input' . ($errors->has('Acreedoras') ? ' is-invalid' : ''), 'id' => 'Acreedoras']) }}
                            <label for="Acreedoras" class="form-check-label">  CUENTAS ACRERDORAS</label>
                            @error('Acreedoras')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </li>
                    
                </ul>
            </div>
            <div class="box-footer mt20">
                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
            </div>
        </div>
    </div>
    
   
</div>

<script>
    function seleccionarCodigo(codigo) {
        document.getElementById('codigo').value = codigo;
    }
</script>