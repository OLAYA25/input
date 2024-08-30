@php
    $codes = App\Models\Codigo::where('estado','Activo')->get();
@endphp

<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::select('estado',['Activo'=>'Activo','Inactivo'=>'Inactivo'], $codigo->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Subcodigo') }}
            {{ Form::text('Subcodigo', $codigo->Subcodigo, ['class' => 'form-control' . ($errors->has('Subcodigo') ? ' is-invalid' : ''), 'placeholder' => 'Subcodigo', 'id' => 'subcodigo']) }}
            {!! $errors->first('Subcodigo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#codesModal">
            Ver Códigos
        </button>
        <div class="form-group">
            {{ Form::label('Codigo') }}
            {{ Form::text('Codigo', $codigo->Codigo, ['class' => 'form-control' . ($errors->has('Codigo') ? ' is-invalid' : ''), 'placeholder' => 'Codigo', 'id' => 'codigo']) }}
            {!! $errors->first('Codigo', '<div class="invalid-feedback">:message</div>') !!}
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


<!-- Botón para activar el modal -->

<!-- Modal -->
<div class="modal fade" id="codesModal" tabindex="-1" role="dialog" aria-labelledby="codesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="codesModalLabel">Lista de Códigos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                           
                            <th>Código</th>
                            <th>Subcódigo</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($codes as $code)
                        <tr>
                           
                            <td>{{ $code->Codigo }}</td>
                            <td>{{ $code->Subcodigo }}</td>
                            <td>{{ $code->Descipcion }}</td>
                            <td>{{ $code->estado }}</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" onclick="seleccionarCodigo('{{ $code->Codigo }}', '{{ $code->Descipcion }}'); $('#codesModal').modal('hide');">
                                    Seleccionar
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    
    function seleccionarCodigo(codigo, descripcion) {
        
        // Modificar el campo de subcodigo con el código
        document.getElementById('subcodigo').value = codigo;
        document.getElementById('codigo').value = codigo;
        
    }
    
</script>
