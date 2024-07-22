<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $codigo->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Codigo') }}
            {{ Form::text('Codigo', $codigo->Codigo, ['class' => 'form-control' . ($errors->has('Codigo') ? ' is-invalid' : ''), 'placeholder' => 'Codigo']) }}
            {!! $errors->first('Codigo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Subcodigo') }}
            {{ Form::text('Subcodigo', $codigo->Subcodigo, ['class' => 'form-control' . ($errors->has('Subcodigo') ? ' is-invalid' : ''), 'placeholder' => 'Subcodigo']) }}
            {!! $errors->first('Subcodigo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descipcion') }}
            {{ Form::text('Descipcion', $codigo->Descipcion, ['class' => 'form-control' . ($errors->has('Descipcion') ? ' is-invalid' : ''), 'placeholder' => 'Descipcion']) }}
            {!! $errors->first('Descipcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>