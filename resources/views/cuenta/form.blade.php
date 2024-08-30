
@php
$bancos = App\Models\Banco::where('estado', 'Activo')->pluck('nombre', 'id');
@endphp
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('bancos_id', 'Banco') }}
                    {{ Form::select('bancos_id', $bancos ?? [], $cuenta->bancos_id, ['class' => 'form-control' . ($errors->has('bancos_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un banco']) }}
                    {!! $errors->first('bancos_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('descripcion', 'Descripción') }}
                    {{ Form::text('descripcion', $cuenta->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese una descripción']) }}
                    {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('tipo', 'Tipo de cuenta') }}
                    {{ Form::select('tipo', ['Corriente' => 'Corriente', 'Ahorros' => 'Ahorros','Efectivo' =>'Efectivo'], $cuenta->tipo, ['class' => 'form-control' . ($errors->has('tipo') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el tipo de cuenta']) }}
                    {!! $errors->first('tipo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('numero', 'Número de cuenta') }}
                    {{ Form::text('numero', $cuenta->numero, ['class' => 'form-control' . ($errors->has('numero') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el número de cuenta']) }}
                    {!! $errors->first('numero', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('estado', 'Estado') }}
                    {{ Form::select('estado', ['Activo' => 'Activo', 'Inactivo' => 'Inactivo'], $cuenta->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el estado']) }}
                    {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
        <a href="{{ route('cajas.create') }}" class="btn btn-success">Siguiente</a>
    </div>
</div>