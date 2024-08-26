<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nit') }}
            {{ Form::text('nit', $empresa->nit, ['class' => 'form-control' . ($errors->has('nit') ? ' is-invalid' : ''), 'placeholder' => 'Nit']) }}
            {!! $errors->first('nit', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $empresa->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo_regimen') }}
            {{ Form::text('tipo_regimen', $empresa->tipo_regimen, ['class' => 'form-control' . ($errors->has('tipo_regimen') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Regimen']) }}
            {!! $errors->first('tipo_regimen', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('NRegimen') }}
            {{ Form::text('NRegimen', $empresa->NRegimen, ['class' => 'form-control' . ($errors->has('NRegimen') ? ' is-invalid' : ''), 'placeholder' => 'Nregimen']) }}
            {!! $errors->first('NRegimen', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Email') }}
            {{ Form::text('Email', $empresa->Email, ['class' => 'form-control' . ($errors->has('Email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('Email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Direccion') }}
            {{ Form::text('Direccion', $empresa->Direccion, ['class' => 'form-control' . ($errors->has('Direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
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
            {{ Form::label('Telefono') }}
            {{ Form::text('Telefono', $empresa->Telefono, ['class' => 'form-control' . ($errors->has('Telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('Telefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('NombreReprent') }}
            {{ Form::text('NombreReprent', $empresa->NombreReprent, ['class' => 'form-control' . ($errors->has('NombreReprent') ? ' is-invalid' : ''), 'placeholder' => 'Nombrereprent']) }}
            {!! $errors->first('NombreReprent', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $empresa->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>