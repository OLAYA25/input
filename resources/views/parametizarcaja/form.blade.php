<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-2">
                @php
                    
                use App\Models\Bodega;
                use App\Models\Cuenta;
                
                use App\Models\Parametizarcaja;
                use App\Models\Usuariobasico;
                $cuenta=Cuenta::where('estado','Activo')->pluck('descripcion','id');
                $bodega=Bodega::where('estado','Activo')->pluck('Descripcion','id');
                $usuario =Usuariobasico::where('estado','Activo')->pluck('NDocumento','id');
                $parametizarcajas = Parametizarcaja::where('caja_id',$caja->id)->get();
                @endphp
                <div class="form-group">
                    {{ Form::label('Bodegas') }}
                    {{ Form::select('bodegad_id',$bodega, $parametizarcaja->bodegad_id, ['class' => 'form-control' . ($errors->has('bodegad_id') ? ' is-invalid' : ''), 'placeholder' => 'Bodega']) }}
                    {!! $errors->first('bodegad_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    {{ Form::label('Cuentas Ingreso') }}
                    {{ Form::select('cuentas_id',$cuenta,$parametizarcaja->cuentas_id, ['class' => 'form-control' . ($errors->has('cuentas_id') ? ' is-invalid' : ''), 'placeholder' => 'Cuentas']) }}
                    {!! $errors->first('cuentas_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    {{ Form::label('Cuenta Egreso') }}
                    {{ Form::select('cuentas_egre',$cuenta,$parametizarcaja->cuentas_egre, ['class' => 'form-control' . ($errors->has('cuentas_egre') ? ' is-invalid' : ''), 'placeholder' => 'Cuentas']) }}
                    {!! $errors->first('cuentas_egre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    {{ Form::label('Estado') }}
                    {{ Form::select('estado',['Activo'=>'Activo','Inactivo'=>'Inactivo'],$parametizarcaja->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
                    {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    {{ Form::label('Cliente Defecto ') }}
                    {{ Form::select('usuario_predeterminado',$usuario,$parametizarcaja->usuario_predeterminado, ['class' => 'form-control' . ($errors->has('usuario_predeterminado') ? ' is-invalid' : ''), 'placeholder' => 'Cuentas']) }}
                    {!! $errors->first('usuario_predeterminado', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            
           
        </div>
        

        @if (Route::is('cajas.edit'))
            <div class="form-group" style="display: none" >
                {{ Form::label('Caja') }}
                {{ Form::text('caja_id', $caja->id, ['class' => 'form-control' . ($errors->has('caja_id') ? ' is-invalid' : ''), 'placeholder' => 'Caja Id']) }}
                {!! $errors->first('caja_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>


        @else
            <div class="form-group" >
                {{ Form::label('caja ') }}
                {{ Form::text('caja_id', $parametizarcaja->caja_id, ['class' => 'form-control' . ($errors->has('caja_id') ? ' is-invalid' : ''), 'placeholder' => 'Caja']) }}
                {!! $errors->first('caja_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        @endif

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>

@include('parametizarcaja.tabla')