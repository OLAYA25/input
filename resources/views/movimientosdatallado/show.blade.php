@extends('layouts.app')

@section('template_title')
    {{ $movimientosdatallado->name ?? "{{ __('Show') Movimientosdatallado" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Movimientosdatallado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('movimientosdatallados.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Movimientos Id:</strong>
                            {{ $movimientosdatallado->Movimientos_id }}
                        </div>
                        <div class="form-group">
                            <strong>Producto Id:</strong>
                            {{ $movimientosdatallado->Producto_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad Ingreso:</strong>
                            {{ $movimientosdatallado->Cantidad_Ingreso }}
                        </div>
                        <div class="form-group">
                            <strong>Valorunitario:</strong>
                            {{ $movimientosdatallado->ValorUnitario }}
                        </div>
                        <div class="form-group">
                            <strong>Totalvalor:</strong>
                            {{ $movimientosdatallado->TotalValor }}
                        </div>
                        <div class="form-group">
                            <strong>Impuesto Id:</strong>
                            {{ $movimientosdatallado->Impuesto_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad Egreso:</strong>
                            {{ $movimientosdatallado->Cantidad_Egreso }}
                        </div>
                        <div class="form-group">
                            <strong>Valor Unitario:</strong>
                            {{ $movimientosdatallado->Valor_Unitario }}
                        </div>
                        <div class="form-group">
                            <strong>Users Id:</strong>
                            {{ $movimientosdatallado->users_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
