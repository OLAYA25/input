@extends('layouts.app')

@section('template_title')
    {{ $movimiento->name ?? "{{ __('Show') Movimiento" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Movimiento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('movimientos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tipomovimiento Id:</strong>
                            {{ $movimiento->TipoMovimiento_id }}
                        </div>
                        <div class="form-group">
                            <strong>Origenbodega Id:</strong>
                            {{ $movimiento->OrigenBodega_id }}
                        </div>
                        <div class="form-group">
                            <strong>Origenproveedor Id:</strong>
                            {{ $movimiento->OrigenProveedor_id }}
                        </div>
                        <div class="form-group">
                            <strong>Usuariodestino Id:</strong>
                            {{ $movimiento->UsuarioDestino_id }}
                        </div>
                        <div class="form-group">
                            <strong>Destinobodega Id:</strong>
                            {{ $movimiento->DestinoBodega_id }}
                        </div>
                        <div class="form-group">
                            <strong>Users Id:</strong>
                            {{ $movimiento->users_id }}
                        </div>
                        <div class="form-group">
                            <strong>Caja Id:</strong>
                            {{ $movimiento->Caja_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cuenta Id:</strong>
                            {{ $movimiento->Cuenta_id }}
                        </div>
                        <div class="form-group">
                            <strong>Valorimpuesto:</strong>
                            {{ $movimiento->ValorImpuesto }}
                        </div>
                        <div class="form-group">
                            <strong>Valorsinimpuesto:</strong>
                            {{ $movimiento->ValorSinImpuesto }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $movimiento->Total }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $movimiento->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Update At:</strong>
                            {{ $movimiento->update_at }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
