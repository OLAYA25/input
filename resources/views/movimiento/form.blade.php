<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('TipoMovimiento_id') }}
            {{ Form::text('TipoMovimiento_id', $movimiento->TipoMovimiento_id, ['class' => 'form-control' . ($errors->has('TipoMovimiento_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipomovimiento Id']) }}
            {!! $errors->first('TipoMovimiento_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('OrigenBodega_id') }}
            {{ Form::text('OrigenBodega_id', $movimiento->OrigenBodega_id, ['class' => 'form-control' . ($errors->has('OrigenBodega_id') ? ' is-invalid' : ''), 'placeholder' => 'Origenbodega Id']) }}
            {!! $errors->first('OrigenBodega_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('OrigenProveedor_id') }}
            {{ Form::text('OrigenProveedor_id', $movimiento->OrigenProveedor_id, ['class' => 'form-control' . ($errors->has('OrigenProveedor_id') ? ' is-invalid' : ''), 'placeholder' => 'Origenproveedor Id']) }}
            {!! $errors->first('OrigenProveedor_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('UsuarioDestino_id') }}
            {{ Form::text('UsuarioDestino_id', $movimiento->UsuarioDestino_id, ['class' => 'form-control' . ($errors->has('UsuarioDestino_id') ? ' is-invalid' : ''), 'placeholder' => 'Usuariodestino Id']) }}
            {!! $errors->first('UsuarioDestino_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('DestinoBodega_id') }}
            {{ Form::text('DestinoBodega_id', $movimiento->DestinoBodega_id, ['class' => 'form-control' . ($errors->has('DestinoBodega_id') ? ' is-invalid' : ''), 'placeholder' => 'Destinobodega Id']) }}
            {!! $errors->first('DestinoBodega_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('users_id') }}
            {{ Form::text('users_id', $movimiento->users_id, ['class' => 'form-control' . ($errors->has('users_id') ? ' is-invalid' : ''), 'placeholder' => 'Users Id']) }}
            {!! $errors->first('users_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Caja_id') }}
            {{ Form::text('Caja_id', $movimiento->Caja_id, ['class' => 'form-control' . ($errors->has('Caja_id') ? ' is-invalid' : ''), 'placeholder' => 'Caja Id']) }}
            {!! $errors->first('Caja_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cuenta_id') }}
            {{ Form::text('Cuenta_id', $movimiento->Cuenta_id, ['class' => 'form-control' . ($errors->has('Cuenta_id') ? ' is-invalid' : ''), 'placeholder' => 'Cuenta Id']) }}
            {!! $errors->first('Cuenta_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ValorImpuesto') }}
            {{ Form::text('ValorImpuesto', $movimiento->ValorImpuesto, ['class' => 'form-control' . ($errors->has('ValorImpuesto') ? ' is-invalid' : ''), 'placeholder' => 'Valorimpuesto']) }}
            {!! $errors->first('ValorImpuesto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ValorSinImpuesto') }}
            {{ Form::text('ValorSinImpuesto', $movimiento->ValorSinImpuesto, ['class' => 'form-control' . ($errors->has('ValorSinImpuesto') ? ' is-invalid' : ''), 'placeholder' => 'Valorsinimpuesto']) }}
            {!! $errors->first('ValorSinImpuesto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Total') }}
            {{ Form::text('Total', $movimiento->Total, ['class' => 'form-control' . ($errors->has('Total') ? ' is-invalid' : ''), 'placeholder' => 'Total']) }}
            {!! $errors->first('Total', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $movimiento->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('update_at') }}
            {{ Form::text('update_at', $movimiento->update_at, ['class' => 'form-control' . ($errors->has('update_at') ? ' is-invalid' : ''), 'placeholder' => 'Update At']) }}
            {!! $errors->first('update_at', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>