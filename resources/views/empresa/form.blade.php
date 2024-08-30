<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('nit', 'NIT') }}
                    {{ Form::text('nit', $empresa->nit, ['class' => 'form-control' . ($errors->has('nit') ? ' is-invalid' : ''), 'placeholder' => 'NIT']) }}
                    {!! $errors->first('nit', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                
                <div class="form-group">
                    {{ Form::label('nombre', 'Nombre') }}
                    {{ Form::text('nombre', $empresa->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                
                <div class="form-group">
                    {{ Form::label('tipo_regimen', 'Tipo de Régimen') }}
                    {{ Form::select('tipo_regimen', [
                        'Natural' => 'Natural',
                        'Régimen Común' => 'Régimen Común',
                        'Régimen Simplificado' => 'Régimen Simplificado',
                        'Gran Contribuyente' => 'Gran Contribuyente',
                        'Régimen Especial' => 'Régimen Especial',
                        'No Responsable de IVA' => 'No Responsable de IVA'
                    ], $empresa->tipo_regimen, ['class' => 'form-control' . ($errors->has('tipo_regimen') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el tipo de régimen']) }}
                    {!! $errors->first('tipo_regimen', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                
                <div class="form-group">
                    {{ Form::label('NRegimen', 'Número de Régimen') }}
                    {{ Form::text('NRegimen', $empresa->NRegimen, ['class' => 'form-control' . ($errors->has('NRegimen') ? ' is-invalid' : ''), 'placeholder' => 'Número de Régimen']) }}
                    {!! $errors->first('NRegimen', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                
                <div class="form-group">
                    {{ Form::label('Email', 'Correo Electrónico') }}
                    {{ Form::email('Email', $empresa->Email, ['class' => 'form-control' . ($errors->has('Email') ? ' is-invalid' : ''), 'placeholder' => 'Correo Electrónico']) }}
                    {!! $errors->first('Email', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Direccion', 'Dirección') }}
                    {{ Form::text('Direccion', $empresa->Direccion, ['class' => 'form-control' . ($errors->has('Direccion') ? ' is-invalid' : ''), 'placeholder' => 'Dirección']) }}
                    {!! $errors->first('Direccion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                
                <div class="form-group">
                    {{ Form::label('Logo', 'Logo') }}
                    {{ Form::file('Logo', ['class' => 'form-control-file' . ($errors->has('Logo') ? ' is-invalid' : ''), 'accept' => 'image/*']) }}
                    @if($empresa->Logo)
                        <img src="{{ asset('storage/' . $empresa->Logo) }}" alt="Logo actual" class="mt-2" style="max-width: 200px;">
                    @endif
                    {!! $errors->first('Logo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                
                <div class="form-group">
                    {{ Form::label('Telefono', 'Teléfono') }}
                    {{ Form::text('Telefono', $empresa->Telefono, ['class' => 'form-control' . ($errors->has('Telefono') ? ' is-invalid' : ''), 'placeholder' => 'Teléfono']) }}
                    {!! $errors->first('Telefono', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                
                <div class="form-group">
                    {{ Form::label('NombreReprent', 'Nombre del Representante') }}
                    {{ Form::text('NombreReprent', $empresa->NombreReprent, ['class' => 'form-control' . ($errors->has('NombreReprent') ? ' is-invalid' : ''), 'placeholder' => 'Nombre del Representante']) }}
                    {!! $errors->first('NombreReprent', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                
                <div class="form-group">
                    {{ Form::label('estado', 'Estado') }}
                    {{ Form::select('estado', ['Activo'=>'Activo','Inactivo'=>'Inactivo'], $empresa->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el estado']) }}
                    {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>   <a href="{{ route('usuariobasicos.create') }}" class="btn btn-success">{{ __('Siguiente') }}</a>
    </div>
   
</div>