
@php
$empresas = App\Models\Empresa::where('estado', 'Activo')->pluck('nombre', 'id');
$bodega = App\Models\Bodega::where('estado', 'Activo')->pluck('Descripcion', 'id');
$usuario = App\Models\Usuariobasico::where('estado', 'Activo')->pluck('Nombre1', 'id');
$cuenta= App\Models\Cuenta::where('estado', 'Activo')->pluck('descripcion', 'id');
@endphp

<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('Descripcion') }}
                    {{ Form::text('Descripcion', $caja->Descripcion, ['class' => 'form-control' . ($errors->has('Descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                    {!! $errors->first('Descripcion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('estado') }}
                    {{ Form::select('estado',['Activo'=>'Activo','Inactivo'=>'Inactivo'], $caja->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
                    {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('numero') }}
                    {{ Form::text('numero', $caja->numero, ['class' => 'form-control' . ($errors->has('numero') ? ' is-invalid' : ''), 'placeholder' => 'Numero']) }}
                    {!! $errors->first('numero', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('Empresa') }}
                    {{ Form::select('Empresas_id', $empresas,$caja->Empresas_id, ['class' => 'form-control' . ($errors->has('numero') ? ' is-invalid' : ''), 'placeholder' => 'Empresas']) }}
                    {!! $errors->first('Empresas_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('Cuenta Defecto Entrada') }}
                    {{ Form::select('CuentaDefectoIngreso', $cuenta,$caja->CuentaDefectoIngreso, ['class' => 'form-control' . ($errors->has('numero') ? ' is-invalid' : ''), 'placeholder' => 'Cuenta Defecto']) }}
                    {!! $errors->first('CajaDefecto', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('Cuenta Defecto Salida') }}
                    {{ Form::select('CuentaDefectoSalida', $cuenta,$caja->CuentaDefectoSalida, ['class' => 'form-control' . ($errors->has('numero') ? ' is-invalid' : ''), 'placeholder' => 'Caja Defecto Salida']) }}
                    {!! $errors->first('CajaDefectoSalida', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    {{ Form::label('Usuario Defecto') }}
                    {{ Form::select('UsuarioDefecto', $usuario,$caja->UsuarioDefecto, ['class' => 'form-control' . ($errors->has('numero') ? ' is-invalid' : ''), 'placeholder' => 'Usuario Defecto']) }}
                    {!! $errors->first('UsuarioDefecto', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    {{ Form::label('Origen Bodega Defecto') }}
                    {{ Form::select('OrigenBodegaDefecto', $bodega,$caja->OrigenBodegaDefecto, ['class' => 'form-control' . ($errors->has('numero') ? ' is-invalid' : ''), 'placeholder' => 'Origen Bodega Defecto']) }}
                    {!! $errors->first('OrigenBodegaDefecto', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    {{ Form::label('Destino Bodega Defecto') }}
                    {{ Form::select('DestinoBodegaDefecto', $bodega,$caja->DestinoBodegaDefecto, ['class' => 'form-control' . ($errors->has('numero') ? ' is-invalid' : ''), 'placeholder' => 'Destino Bodega Defecto']) }}
                    {!! $errors->first('DestinoBodegaDefecto', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

        </div>
        
        
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>