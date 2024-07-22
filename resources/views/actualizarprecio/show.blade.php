@extends('layouts.app')

@section('template_title')
    {{ $actualizarprecio->name ?? "{{ __('Show') Actualizarprecio" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Actualizarprecio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('actualizarprecios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Producto Id:</strong>
                            {{ $actualizarprecio->Producto_id }}
                        </div>
                        <div class="form-group">
                            <strong>Impuesto Id:</strong>
                            {{ $actualizarprecio->Impuesto_id }}
                        </div>
                        <div class="form-group">
                            <strong>Principal:</strong>
                            {{ $actualizarprecio->Principal }}
                        </div>
                        <div class="form-group">
                            <strong>Valorbase:</strong>
                            {{ $actualizarprecio->ValorBase }}
                        </div>
                        <div class="form-group">
                            <strong>Proveedor Id:</strong>
                            {{ $actualizarprecio->Proveedor_id }}
                        </div>
                        <div class="form-group">
                            <strong>Valorpublico:</strong>
                            {{ $actualizarprecio->ValorPublico }}
                        </div>
                        <div class="form-group">
                            <strong>Descuento1:</strong>
                            {{ $actualizarprecio->Descuento1 }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad1:</strong>
                            {{ $actualizarprecio->Cantidad1 }}
                        </div>
                        <div class="form-group">
                            <strong>Descuento2:</strong>
                            {{ $actualizarprecio->Descuento2 }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad2:</strong>
                            {{ $actualizarprecio->Cantidad2 }}
                        </div>
                        <div class="form-group">
                            <strong>Descuento3:</strong>
                            {{ $actualizarprecio->Descuento3 }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad3:</strong>
                            {{ $actualizarprecio->Cantidad3 }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
