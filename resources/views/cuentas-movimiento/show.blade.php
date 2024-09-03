@extends('layouts.app')

@section('template_title')
    {{ $cuentasMovimiento->name ?? "{{ __('Show') Cuentas Movimiento" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Cuentas Movimiento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cuentas-movimientos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cuenta:</strong>
                            {{ $cuentasMovimiento->Cuenta }}
                        </div>
                        <div class="form-group">
                            <strong>Cuentaegreso:</strong>
                            {{ $cuentasMovimiento->CuentaEgreso }}
                        </div>
                        <div class="form-group">
                            <strong>Codigo Id:</strong>
                            {{ $cuentasMovimiento->Codigo_id }}
                        </div>
                        <div class="form-group">
                            <strong>Movimiento Id:</strong>
                            {{ $cuentasMovimiento->Movimiento_id }}
                        </div>
                        <div class="form-group">
                            <strong>Tipomovimiento:</strong>
                            {{ $cuentasMovimiento->TipoMovimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcionmovimiento:</strong>
                            {{ $cuentasMovimiento->DescripcionMovimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Valor:</strong>
                            {{ $cuentasMovimiento->Valor }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
