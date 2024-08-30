



    <div class="box box-info padding-1">
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('TipoDocumento', 'Tipo Id') }}
                        {{ Form::select('TipoDocumento', ['CC'=>'CC' ,'TI'=>'TI','AS'=>'AS','CE'=>'CE','CN'=>'CN','DE'=>'DE','MS'=>'MS','NI'=>'NI','NU'=>'NU','PA'=>'PA','MS'=>'MS','PE'=>'PE','PT'=>'PT','RC'=>'RC','SC'=>'SC'],$usuariobasico->TipoDocumento, ['class' => 'form-control' . ($errors->has('TipoDocumento') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Id']) }}
                        {!! $errors->first('TipoDocumento', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('NDocumento') }}
                        {{ Form::text('NDocumento', $usuariobasico->NDocumento, ['class' => 'form-control' . ($errors->has('NDocumento') ? ' is-invalid' : ''), 'placeholder' => 'Ndocumento']) }}
                        {!! $errors->first('NDocumento', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('Nombre1') }}
                        {{ Form::text('Nombre1', $usuariobasico->Nombre1, ['class' => 'form-control' . ($errors->has('Nombre1') ? ' is-invalid' : ''), 'placeholder' => 'Nombre1']) }}
                        {!! $errors->first('Nombre1', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('Nombre2') }}
                        {{ Form::text('Nombre2', $usuariobasico->Nombre2, ['class' => 'form-control' . ($errors->has('Nombre2') ? ' is-invalid' : ''), 'placeholder' => 'Nombre2']) }}
                        {!! $errors->first('Nombre2', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('Apellido1') }}
                        {{ Form::text('Apellido1', $usuariobasico->Apellido1, ['class' => 'form-control' . ($errors->has('Apellido1') ? ' is-invalid' : ''), 'placeholder' => 'Apellido1']) }}
                        {!! $errors->first('Apellido1', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('Apellido2') }}
                        {{ Form::text('Apellido2', $usuariobasico->Apellido2, ['class' => 'form-control' . ($errors->has('Apellido2') ? ' is-invalid' : ''), 'placeholder' => 'Apellido2']) }}
                        {!! $errors->first('Apellido2', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('Telefono') }}
                        {{ Form::text('Telefono', $usuariobasico->Telefono, ['class' => 'form-control' . ($errors->has('Telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
                        {!! $errors->first('Telefono', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('Email') }}
                        {{ Form::text('Email', $usuariobasico->Email, ['class' => 'form-control' . ($errors->has('Email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                        {!! $errors->first('Email', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('TelefonoFijo') }}
                        {{ Form::text('TelefonoFijo', $usuariobasico->TelefonoFijo, ['class' => 'form-control' . ($errors->has('TelefonoFijo') ? ' is-invalid' : ''), 'placeholder' => 'Telefonofijo']) }}
                        {!! $errors->first('TelefonoFijo', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('TelefonoMovil') }}
                        {{ Form::text('TelefonoMovil', $usuariobasico->TelefonoMovil, ['class' => 'form-control' . ($errors->has('TelefonoMovil') ? ' is-invalid' : ''), 'placeholder' => 'Telefonomovil']) }}
                        {!! $errors->first('TelefonoMovil', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('Genero') }}
                        {{ Form::select('Genero', ['MUJER'=>'MUJER','HOMBRE'=>'HOMBRE','OTRO'=>'OTRO'],$usuariobasico->Genero, ['class' => 'form-control' . ($errors->has('Genero') ? ' is-invalid' : ''), 'placeholder' => 'Genero']) }}
                        {!! $errors->first('Genero', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('Sexo') }}
                        {{ Form::select('Sexo', ['HOMBRE'=>'HOMBRE','MUJER'=>'MUJER'],$usuariobasico->Sexo, ['class' => 'form-control' . ($errors->has('Sexo') ? ' is-invalid' : ''), 'placeholder' => 'Sexo']) }}
                        {!! $errors->first('Sexo', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('Fecha Nacimiento') }}
                        {{ Form::date('FechaNacimiento', $usuariobasico->FechaNacimiento, ['class' => 'form-control' . ($errors->has('FechaNacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fechanacimiento']) }}
                        {!! $errors->first('FechaNacimiento', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('estado') }}
                        {{ Form::select('estado', ['Activo'=>'Activo','Inactivo'=>'Inactivo'],$usuariobasico->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
                        {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-3">
                    <div class="form-check">
                        {{ Form::label('Empleado') }}
                        {{ Form::checkbox('CheckEmpleado', 1, $usuariobasico->CheckEmpleado, ['class' => 'form-check-input' . ($errors->has('CheckEmpleado') ? ' is-invalid' : '')]) }}
                        {!! $errors->first('CheckEmpleado', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        {{ Form::label('Proveedor') }}
                        {{ Form::checkbox('Checkproveedor', 1, $usuariobasico->Checkproveedor, ['class' =>  'form-check-input' . ($errors->has('Checkproveedor') ? ' is-invalid' : ''), 'id' => 'Checkproveedor']) }}
                        {!! $errors->first('Checkproveedor', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    
                </div>

            </div>
        </div>
        <br>
        <div class="box-footer mt20">
            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>   <a href="{{ route('bodegas.create') }}" class="btn btn-success">{{ __('Siguiente') }}</a>
        </div>
    </div>
  
  <script>
  document.addEventListener("DOMContentLoaded", function() {
        // Obtener todas las pestañas
        const tabs = document.querySelectorAll('.nav-link');

        // Manejar el clic en cada pestaña
        tabs.forEach(tab => {
            tab.addEventListener('click', function(event) {
                event.preventDefault();

                // Obtener el ID del panel correspondiente a la pestaña
                const tabId = this.getAttribute('href').substring(1);

                // Ocultar todos los paneles
                const panes = document.querySelectorAll('.tab-pane');
                panes.forEach(pane => {
                    pane.classList.remove('active');
                });

                // Mostrar solo el panel correspondiente a la pestaña clickeada
                const activePane = document.getElementById(tabId);
                activePane.classList.add('active');

                // Quitar la clase 'active' de todas las pestañas
                tabs.forEach(t => {
                    t.classList.remove('active');
                });

                // Agregar la clase 'active' a la pestaña clickeada
                this.classList.add('active');
            });
        });
    });
</script>
  </script>










