
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('Descripcion') }}
                    {{ Form::text('Descripcion', $caja->Descripcion, ['class' => 'form-control' . ($errors->has('Descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                    {!! $errors->first('Descripcion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('estado') }}
                    {{ Form::select('estado',['Activo'=>'Activo','Inactivo'=>'Inactivo'], $caja->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
                    {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('numero') }}
                    {{ Form::text('numero', $caja->numero, ['class' => 'form-control' . ($errors->has('numero') ? ' is-invalid' : ''), 'placeholder' => 'Numero']) }}
                    {!! $errors->first('numero', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        
        
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>