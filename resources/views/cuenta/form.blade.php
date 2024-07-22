@php
    use App\Models\Banco;
    $bancos= Banco ::where('estado','Activo') -> pluck("nombre","id");
@endphp
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('bancos') }}
            {{ Form::select('bancos_id', $bancos,$cuenta->bancos_id, ['class' => 'form-control' . ($errors->has('bancos_id') ? ' is-invalid' : ''), 'placeholder' => 'Bancos']) }}
            {!! $errors->first('bancos_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $cuenta->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo') }}
            {{ Form::select('tipo', ['Efectivo'=>'Efectivo','Corriente'=>'Corriente','Ahorro'=>'Ahorro'],$cuenta->tipo, ['class' => 'form-control' . ($errors->has('tipo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo']) }}
            {!! $errors->first('tipo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('numero') }}
            {{ Form::text('numero', $cuenta->numero, ['class' => 'form-control' . ($errors->has('numero') ? ' is-invalid' : ''), 'placeholder' => 'Numero']) }}
            {!! $errors->first('numero', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::select('estado', ['Activo'=>'Activo','Inactivo'=>'Inactivo'],$cuenta->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
           {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>