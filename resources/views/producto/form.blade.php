<style>
    /* Estilo para el cuadro de firma */
    .signature-box {
        border: 2px dashed #ccc;
        min-height: 150px;
        /* Altura mínima del cuadro de firma */
        max-width: 100%;
        /* Ancho máximo del cuadro de firma */
        max-height: 200px;
        /* Altura máxima del cuadro de firma */
        overflow: hidden;
        /* Ocultar partes de la imagen que se desborden */
        margin-bottom: 10px;
        position: relative;
        /* Añade una posición relativa para ajustar la imagen */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Estilo para la imagen dentro del cuadro de firma */
    .signature-box img {
        max-width: 100%;
        /* Ancho máximo de la imagen */
        max-height: 100%;
        /* Altura máxima de la imagen */
        display: block;
        /* Eliminar espacios en blanco alrededor de la imagen */
    }
</style>

<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <!-- Datos Básicos -->
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('Descripcion') }}
                            {{ Form::text('Descripcion', $producto->Descripcion, ['class' => 'form-control' .
                            ($errors->has('Descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                            {!! $errors->first('Descripcion', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('Referencia') }}
                            {{ Form::text('NumeroSerial', $producto->NumeroSerial, ['class' => 'form-control' .
                            ($errors->has('NumeroSerial') ? ' is-invalid' : ''), 'placeholder' => 'Numeroserial']) }}
                            {!! $errors->first('NumeroSerial', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('Estado') }}
                            {{ Form::select('Estado', ['Activo'=>'Activo','Inactivo'=>'Inactivo'],$producto->Estado,
                            ['class' => 'form-control' . ($errors->has('Estado') ? ' is-invalid' : ''), 'placeholder' =>
                            'Estado']) }}
                            {!! $errors->first('Estado', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('Imagen') }}
                            {{ Form::file('Imagen', ['class' => 'signature-box' . ($errors->has('Imagen') ? '
                            is-invalid' : ''), 'placeholder' => 'Imagen']) }}
                            {!! $errors->first('Imagen', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('familia1_id') }}
                            {{ Form::text('familia1_id', $producto->familia1_id, ['class' => 'form-control' .
                            ($errors->has('familia2_id') ? ' is-invalid' : ''), 'placeholder' => 'Familia1 Id']) }}
                            {!! $errors->first('familia1_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('familia3_id') }}
                            {{ Form::text('familia3_id', $producto->familia3_id, ['class' => 'form-control' .
                            ($errors->has('familia2_id') ? ' is-invalid' : ''), 'placeholder' => 'Familia3 Id']) }}
                            {!! $errors->first('familia3_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('familia2_id') }}
                            {{ Form::text('familia2_id', $producto->familia2_id, ['class' => 'form-control' .
                            ($errors->has('familia2_id') ? ' is-invalid' : ''), 'placeholder' => 'Familia2 Id']) }}
                            {!! $errors->first('familia2_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Tabs para Datos Detallados -->
                <ul class="nav nav-tabs" id="productDetailsTabs" role="tablist">
                    
                    <li class="nav-item">
                        <a class="nav-link" id="details-tab" data-toggle="tab" href="#details" role="tab"
                            aria-controls="details" aria-selected="false">Detalles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="packages-tab" data-toggle="tab" href="#packages" role="tab"
                            aria-controls="packages" aria-selected="false">Paquetes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="warehouse-tab" data-toggle="tab" href="#warehouse" role="tab"
                            aria-controls="warehouse" aria-selected="false">Almacen</a>
                    </li>
                  
                </ul>

                <div class="tab-content" id="productDetailsTabsContent">
                    <div class="tab-pane fade" id="warehouse" role="tabpanel" aria-labelledby="warehouse-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('VenderNegativos') }}
                                    {{ Form::text('VenderNegativos', $producto->VenderNegativos, ['class' =>
                                    'form-control' . ($errors->has('VenderNegativos') ? ' is-invalid' : ''),
                                    'placeholder' => 'Vendernegativos']) }}
                                    {!! $errors->first('VenderNegativos', '<div class="invalid-feedback">:message</div>
                                    ') !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('DescInventario') }}
                                    {{ Form::text('DescInventario', $producto->DescInventario, ['class' =>
                                    'form-control' . ($errors->has('DescInventario') ? ' is-invalid' : ''),
                                    'placeholder' => 'Descinventario']) }}
                                    {!! $errors->first('DescInventario', '<div class="invalid-feedback">:message</div>')
                                    !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('Existencias') }}
                                    {{ Form::text('Existencias', $producto->Existencias, ['class' => 'form-control' .
                                    ($errors->has('Existencias') ? ' is-invalid' : ''), 'placeholder' => 'Existencias'])
                                    }}
                                    {!! $errors->first('Existencias', '<div class="invalid-feedback">:message</div>')
                                    !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('Stock_Max') }}
                                    {{ Form::text('Stock_Max', $producto->Stock_Max, ['class' => 'form-control' .
                                    ($errors->has('Stock_Max') ? ' is-invalid' : ''), 'placeholder' => 'Stock Max']) }}
                                    {!! $errors->first('Stock_Max', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('Stock_Min') }}
                                    {{ Form::text('Stock_Min', $producto->Stock_Min, ['class' => 'form-control' .
                                    ($errors->has('Stock_Min') ? ' is-invalid' : ''), 'placeholder' => 'Stock Min']) }}
                                    {!! $errors->first('Stock_Min', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                        </div>
                        <!-- More warehouse fields as needed -->
                    </div>
                  

                <!-- Detalles Tab -->
                <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('Talla') }}
                                {{ Form::text('Talla', $producto->Talla, ['class' => 'form-control' .
                                ($errors->has('Talla') ? ' is-invalid' : ''), 'placeholder' => 'Talla']) }}
                                {!! $errors->first('Talla', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('Largor') }}
                                {{ Form::text('Largor', $producto->Largor, ['class' => 'form-control' .
                                ($errors->has('Largor') ? ' is-invalid' : ''), 'placeholder' => 'Largor']) }}
                                {!! $errors->first('Largor', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('Alto') }}
                                {{ Form::text('Alto', $producto->Alto, ['class' => 'form-control' .
                                ($errors->has('Alto') ? ' is-invalid' : ''), 'placeholder' => 'Alto']) }}
                                {!! $errors->first('Alto', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('Ancho') }}
                                {{ Form::text('Ancho', $producto->Ancho, ['class' => 'form-control' .
                                ($errors->has('Ancho') ? ' is-invalid' : ''), 'placeholder' => 'Ancho']) }}
                                {!! $errors->first('Ancho', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('Observaciones') }}
                                {{ Form::text('Observaciones', $producto->Observaciones, ['class' => 'form-control' .
                                ($errors->has('Observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones'])
                                }}
                                {!! $errors->first('Observaciones', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('unidadmedida_id') }}
                                {{ Form::text('unidadmedida_id', $producto->unidadmedida_id, ['class' => 'form-control'
                                . ($errors->has('unidadmedida_id') ? ' is-invalid' : ''), 'placeholder' => 'Unidadmedida
                                Id']) }}
                                {!! $errors->first('unidadmedida_id', '<div class="invalid-feedback">:message</div>')
                                !!}
                            </div>
                        </div>
                    </div>
                    <!-- More detail fields as needed -->
                </div>



                <!-- Paquetes Tab -->
                <div class="tab-pane fade" id="packages" role="tabpanel" aria-labelledby="packages-tab">
                    <!-- Package-related fields go here -->
                </div>

                <!-- Almacen Tab -->

                <!-- Seriales Tab -->
                <div class="tab-pane fade" id="serials" role="tabpanel" aria-labelledby="serials-tab">
                    <!-- Serial-related fields go here -->
                </div>
                
                <!-- Impuestos Tab -->
                <div class="tab-pane fade" id="taxes" role="tabpanel" aria-labelledby="taxes-tab">
                    <!-- Tax-related fields go here -->
                </div>



            
                
            </div>

        </div>

    </div>
   
</div>
<div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
</div>
</div>
 <br>
<!-- jQuery and Bootstrap scripts for enabling tabs -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>


    document.addEventListener('DOMContentLoaded', function () {
  
       
       
    $(document).ready(function () {
        $('#productDetailsTabs a').on('click', function (e) {
            e.preventDefault();
            
            });
        }); 
    });
</script>