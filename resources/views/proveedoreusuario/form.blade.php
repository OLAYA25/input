<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Usuario_id') }}
            {{ Form::text('Usuario_id', $proveedoreusuario->Usuario_id, ['class' => 'form-control' . ($errors->has('Usuario_id') ? ' is-invalid' : ''), 'placeholder' => 'Usuario Id']) }}
            {!! $errors->first('Usuario_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Proveedor_id') }}
            {{ Form::text('Proveedor_id', $proveedoreusuario->Proveedor_id, ['class' => 'form-control' . ($errors->has('Proveedor_id') ? ' is-invalid' : ''), 'placeholder' => 'Proveedor Id']) }}
            {!! $errors->first('Proveedor_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $proveedoreusuario->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>