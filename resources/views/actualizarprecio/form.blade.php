<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Producto_id') }}
            {{ Form::text('Producto_id', $actualizarprecio->Producto_id, ['class' => 'form-control' . ($errors->has('Producto_id') ? ' is-invalid' : ''), 'placeholder' => 'Producto Id']) }}
            {!! $errors->first('Producto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Impuesto_id') }}
            {{ Form::text('Impuesto_id', $actualizarprecio->Impuesto_id, ['class' => 'form-control' . ($errors->has('Impuesto_id') ? ' is-invalid' : ''), 'placeholder' => 'Impuesto Id']) }}
            {!! $errors->first('Impuesto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Principal') }}
            {{ Form::text('Principal', $actualizarprecio->Principal, ['class' => 'form-control' . ($errors->has('Principal') ? ' is-invalid' : ''), 'placeholder' => 'Principal']) }}
            {!! $errors->first('Principal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ValorBase') }}
            {{ Form::text('ValorBase', $actualizarprecio->ValorBase, ['class' => 'form-control' . ($errors->has('ValorBase') ? ' is-invalid' : ''), 'placeholder' => 'Valorbase']) }}
            {!! $errors->first('ValorBase', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Proveedor_id') }}
            {{ Form::text('Proveedor_id', $actualizarprecio->Proveedor_id, ['class' => 'form-control' . ($errors->has('Proveedor_id') ? ' is-invalid' : ''), 'placeholder' => 'Proveedor Id']) }}
            {!! $errors->first('Proveedor_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ValorPublico') }}
            {{ Form::text('ValorPublico', $actualizarprecio->ValorPublico, ['class' => 'form-control' . ($errors->has('ValorPublico') ? ' is-invalid' : ''), 'placeholder' => 'Valorpublico']) }}
            {!! $errors->first('ValorPublico', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descuento1') }}
            {{ Form::text('Descuento1', $actualizarprecio->Descuento1, ['class' => 'form-control' . ($errors->has('Descuento1') ? ' is-invalid' : ''), 'placeholder' => 'Descuento1']) }}
            {!! $errors->first('Descuento1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad1') }}
            {{ Form::text('Cantidad1', $actualizarprecio->Cantidad1, ['class' => 'form-control' . ($errors->has('Cantidad1') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad1']) }}
            {!! $errors->first('Cantidad1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descuento2') }}
            {{ Form::text('Descuento2', $actualizarprecio->Descuento2, ['class' => 'form-control' . ($errors->has('Descuento2') ? ' is-invalid' : ''), 'placeholder' => 'Descuento2']) }}
            {!! $errors->first('Descuento2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad2') }}
            {{ Form::text('Cantidad2', $actualizarprecio->Cantidad2, ['class' => 'form-control' . ($errors->has('Cantidad2') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad2']) }}
            {!! $errors->first('Cantidad2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descuento3') }}
            {{ Form::text('Descuento3', $actualizarprecio->Descuento3, ['class' => 'form-control' . ($errors->has('Descuento3') ? ' is-invalid' : ''), 'placeholder' => 'Descuento3']) }}
            {!! $errors->first('Descuento3', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad3') }}
            {{ Form::text('Cantidad3', $actualizarprecio->Cantidad3, ['class' => 'form-control' . ($errors->has('Cantidad3') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad3']) }}
            {!! $errors->first('Cantidad3', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>