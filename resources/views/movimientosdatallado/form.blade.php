<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Movimientos_id') }}
            {{ Form::text('Movimientos_id', $movimientosdatallado->Movimientos_id, ['class' => 'form-control' . ($errors->has('Movimientos_id') ? ' is-invalid' : ''), 'placeholder' => 'Movimientos Id']) }}
            {!! $errors->first('Movimientos_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Producto_id') }}
            {{ Form::text('Producto_id', $movimientosdatallado->Producto_id, ['class' => 'form-control' . ($errors->has('Producto_id') ? ' is-invalid' : ''), 'placeholder' => 'Producto Id']) }}
            {!! $errors->first('Producto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad_Ingreso') }}
            {{ Form::text('Cantidad_Ingreso', $movimientosdatallado->Cantidad_Ingreso, ['class' => 'form-control' . ($errors->has('Cantidad_Ingreso') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Ingreso']) }}
            {!! $errors->first('Cantidad_Ingreso', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ValorUnitario') }}
            {{ Form::text('ValorUnitario', $movimientosdatallado->ValorUnitario, ['class' => 'form-control' . ($errors->has('ValorUnitario') ? ' is-invalid' : ''), 'placeholder' => 'Valorunitario']) }}
            {!! $errors->first('ValorUnitario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('TotalValor') }}
            {{ Form::text('TotalValor', $movimientosdatallado->TotalValor, ['class' => 'form-control' . ($errors->has('TotalValor') ? ' is-invalid' : ''), 'placeholder' => 'Totalvalor']) }}
            {!! $errors->first('TotalValor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Impuesto_id') }}
            {{ Form::text('Impuesto_id', $movimientosdatallado->Impuesto_id, ['class' => 'form-control' . ($errors->has('Impuesto_id') ? ' is-invalid' : ''), 'placeholder' => 'Impuesto Id']) }}
            {!! $errors->first('Impuesto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad_Egreso') }}
            {{ Form::text('Cantidad_Egreso', $movimientosdatallado->Cantidad_Egreso, ['class' => 'form-control' . ($errors->has('Cantidad_Egreso') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Egreso']) }}
            {!! $errors->first('Cantidad_Egreso', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Valor_Unitario') }}
            {{ Form::text('Valor_Unitario', $movimientosdatallado->Valor_Unitario, ['class' => 'form-control' . ($errors->has('Valor_Unitario') ? ' is-invalid' : ''), 'placeholder' => 'Valor Unitario']) }}
            {!! $errors->first('Valor_Unitario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('users_id') }}
            {{ Form::text('users_id', $movimientosdatallado->users_id, ['class' => 'form-control' . ($errors->has('users_id') ? ' is-invalid' : ''), 'placeholder' => 'Users Id']) }}
            {!! $errors->first('users_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>