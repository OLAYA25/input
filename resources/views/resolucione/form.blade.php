<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            @if(Route::is('movimientosbasicos.edit'))
            
            
            
                <div class="form-group">
                
                    {{ Form::text('Movimientos_id', $movimientosbasico->id, ['class' => 'form-control' . ($errors->has('Movimientos_id') ? ' is-invalid' : ''), 'placeholder' => 'ID Movimientos', 'style'=>'Display:none']) }}
                    {!! $errors->first('Movimientos_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
        
            @endif
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Prefijo') }}
                    {{ Form::text('Prefijo', $resolucione->Prefijo, ['class' => 'form-control' . ($errors->has('Prefijo') ? ' is-invalid' : ''), 'placeholder' => 'Prefijo']) }}
                    {!! $errors->first('Prefijo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('estado', 'Estado') }}
                    {{ Form::select('estado', ['Activo' => 'Activo', 'Inactivo' => 'Inactivo'], $resolucione->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione']) }}
                    {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('DesdeNumero', 'Desde') }}
                    {{ Form::number('DesdeNumero', $resolucione->DesdeNumero, ['class' => 'form-control' . ($errors->has('DesdeNumero') ? ' is-invalid' : ''), 'placeholder' => 'Desde']) }}
                    {!! $errors->first('DesdeNumero', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('HastaNumero', 'Hasta') }}
                    {{ Form::number('HastaNumero', $resolucione->HastaNumero, ['class' => 'form-control' . ($errors->has('HastaNumero') ? ' is-invalid' : ''), 'placeholder' => 'Hasta']) }}
                    {!! $errors->first('HastaNumero', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('FechaInicio', 'Inicio') }}
                    {{ Form::date('FechaInicio', $resolucione->FechaInicio, ['class' => 'form-control' . ($errors->has('FechaInicio') ? ' is-invalid' : ''), 'placeholder' => 'Inicio']) }}
                    {!! $errors->first('FechaInicio', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('FechaFin', 'Fin') }}
                    {{ Form::date('FechaFin', $resolucione->FechaFin, ['class' => 'form-control' . ($errors->has('FechaFin') ? ' is-invalid' : ''), 'placeholder' => 'Fin']) }}
                    {!! $errors->first('FechaFin', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('Vigencia') }}
            {{ Form::number('Vigencia', $resolucione->Vigencia, ['class' => 'form-control' . ($errors->has('Vigencia') ? ' is-invalid' : ''), 'placeholder' => 'Vigencia']) }}
            {!! $errors->first('Vigencia', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        {{ Form::hidden('updated_at', now()) }}
    </div>
    
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
        
        <a href="{{ route('productos.create') }}" class="btn btn-success">Siguiente</a>
    </div>
</div>