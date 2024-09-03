<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Cuenta') }}
            {{ Form::text('Cuenta', $cuentasMovimiento->Cuenta, ['class' => 'form-control' . ($errors->has('Cuenta') ? ' is-invalid' : ''), 'placeholder' => 'Cuenta']) }}
            {!! $errors->first('Cuenta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('CuentaEgreso') }}
            {{ Form::text('CuentaEgreso', $cuentasMovimiento->CuentaEgreso, ['class' => 'form-control' . ($errors->has('CuentaEgreso') ? ' is-invalid' : ''), 'placeholder' => 'Cuentaegreso']) }}
            {!! $errors->first('CuentaEgreso', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Codigo_id') }}
            {{ Form::text('Codigo_id', $cuentasMovimiento->Codigo_id, ['class' => 'form-control' . ($errors->has('Codigo_id') ? ' is-invalid' : ''), 'placeholder' => 'Codigo Id']) }}
            {!! $errors->first('Codigo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Movimiento_id') }}
            {{ Form::text('Movimiento_id', $cuentasMovimiento->Movimiento_id, ['class' => 'form-control' . ($errors->has('Movimiento_id') ? ' is-invalid' : ''), 'placeholder' => 'Movimiento Id']) }}
            {!! $errors->first('Movimiento_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('TipoMovimiento') }}
            {{ Form::text('TipoMovimiento', $cuentasMovimiento->TipoMovimiento, ['class' => 'form-control' . ($errors->has('TipoMovimiento') ? ' is-invalid' : ''), 'placeholder' => 'Tipomovimiento']) }}
            {!! $errors->first('TipoMovimiento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('DescripcionMovimiento') }}
            {{ Form::text('DescripcionMovimiento', $cuentasMovimiento->DescripcionMovimiento, ['class' => 'form-control' . ($errors->has('DescripcionMovimiento') ? ' is-invalid' : ''), 'placeholder' => 'Descripcionmovimiento']) }}
            {!! $errors->first('DescripcionMovimiento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Valor') }}
            {{ Form::text('Valor', $cuentasMovimiento->Valor, ['class' => 'form-control' . ($errors->has('Valor') ? ' is-invalid' : ''), 'placeholder' => 'Valor']) }}
            {!! $errors->first('Valor', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>