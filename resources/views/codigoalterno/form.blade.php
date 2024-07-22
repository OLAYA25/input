<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('Descripcion') }}
                    {{ Form::text('Descripcion', $codigoalterno->Descripcion, ['class' => 'form-control' . ($errors->has('Descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                    {!! $errors->first('Descripcion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('estado') }}
                    {{ Form::select('estado', ['Activo'=>'Activo','Inactivo'=>'Inactivo'],$codigoalterno->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('cantidad') }}
                    <div class="input-group mar-btn ">
                        {{ Form::number('cantidad', $codigoalterno->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                        <span class="input-group-btn">
                            <a href="#" data-toggle="modal" id="Buscar"
                                    data-target=".bd-user-modal-lg" class="btn btn-success">Buscar </a>
                        </span>
                        {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('producto_id') }}
                    {{ Form::text('producto_id', $codigoalterno->producto_id, ['class' => 'form-control' . ($errors->has('producto_id') ? ' is-invalid' : ''), 'placeholder' => 'Producto Id']) }}
                    {!! $errors->first('producto_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            
            
           
            
        </div>
        

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>