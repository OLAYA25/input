<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('Codigo') }}
                    {{ Form::text('Codigo', $movimientosbasico->Codigo, ['class' => 'form-control' . ($errors->has('Codigo') ? ' is-invalid' : ''), 'placeholder' => 'Codigo']) }}
                    {!! $errors->first('Codigo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('Descripcion') }}
                    {{ Form::text('Descripcion', $movimientosbasico->Descripcion, ['class' => 'form-control' . ($errors->has('Descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                    {!! $errors->first('Descripcion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
          
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('CodigoPredetermidao') }}
                    {{ Form::text('CodigoPredetermidao', $movimientosbasico->CodigoPredetermidao, ['class' => 'form-control' . ($errors->has('Descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Codigo Predetermidao']) }}
                    {!! $errors->first('Descripcion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            @php
                $codigos = App\Models\Codigo::where('estado','Activo');
            @endphp
            <div class="col-sm-3">
                <div class="form-check">
                <label for="descuento" class="form-check-label">Descuento</label>
                    {{ Form::checkbox('Descuento', 1, $movimientosbasico->Descuento, ['class' => 'form-check-input' . ($errors->has('Descuento') ? ' is-invalid' : '')]) }}
                    @if ($errors->has('Descuento'))
                        <div class="invalid-feedback">
                            {{ $errors->first('Descuento') }}
                        </div>
                    @endif
                    {!! $errors->first('Descuento', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-check">
                    <label for="Aregar" class="form-check-label">Agregar</label>
                    {{ Form::checkbox('Agregar', 1,$movimientosbasico->Agregar, ['class' => 'form-check-input' . ($errors->has('Agregar') ? ' is-invalid' : '')]) }}
                    @if ($errors->has('Agregar'))
                        <div class="invalid-feedback">
                            {{ $errors->first('Agregar') }}
                        </div>
                    @endif
                    {!! $errors->first('Agregar', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
          
            <div class="col-sm-3">
                <div class="form-check">
                    <label for="Alerta" class="form-check-label">Alerta</label>
                    {{ Form::checkbox('Alerta', 1,$movimientosbasico->Alerta, ['class' => 'form-check-input' . ($errors->has('Alerta') ? ' is-invalid' : '')]) }}
                    @if ($errors->has('Alerta'))
                    <div class="invalid-feedback">
                        {{ $errors->first('Alerta') }}
                    </div>
                @endif
                    {!! $errors->first('Alerta', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
           
            <div class="col-sm-3">
                <div class="form-check">
                    <label for="OrigenBodega" class="form-check-label">Origen Bodega</label>
                    {{ Form::checkbox('OrigenBodega', 1,$movimientosbasico->OrigenBodega, ['class' => 'form-check-input' . ($errors->has('Alerta') ? ' is-invalid' : '')]) }}
                    @if ($errors->has('OrigenBodega'))
                    <div class="invalid-feedback">
                        {{ $errors->first('OrigenBodega') }}
                    </div>
                @endif
                    {!! $errors->first('OrigenBodega', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-check">
                    <label for="DestinoBodega" class="form-check-label">Destino Bodega</label>
                    {{ Form::checkbox('DestinoBodega', 1,$movimientosbasico->DestinoBodega, ['class' => 'form-check-input' . ($errors->has('DestinoBodega') ? ' is-invalid' : '')]) }}
                    @if ($errors->has('DestinoBodega'))
                    <div class="invalid-feedback">
                        {{ $errors->first('DestinoBodega') }}
                    </div>
                @endif
                    {!! $errors->first('DestinoBodega', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-check">
                    <label for="UsuarioOrigen" class="form-check-label">Usuario Origen</label>
                    {{ Form::checkbox('UsuarioOrigen', 1,$movimientosbasico->UsuarioOrigen, ['class' => 'form-check-input' . ($errors->has('UsuarioOrigen') ? ' is-invalid' : '')]) }}
                    @if ($errors->has('UsuarioOrigen'))
                    <div class="invalid-feedback">
                        {{ $errors->first('UsuarioOrigen') }}
                    </div>
                @endif
                    {!! $errors->first('Alerta', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-check">
                    <label for="UsuarioDestino" class="form-check-label">Usuario Destino</label>
                    {{ Form::checkbox('UsuarioDestino', 1,$movimientosbasico->UsuarioDestino, ['class' => 'form-check-input' . ($errors->has('UsuarioDestino') ? ' is-invalid' : '')]) }}
                    @if ($errors->has('UsuarioDestino'))
                    <div class="invalid-feedback">
                        {{ $errors->first('UsuarioDestino') }}
                    </div>
                @endif
                    {!! $errors->first('UsuarioDestino', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

        </div>
        
        <br>
        

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>