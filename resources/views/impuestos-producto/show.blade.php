@extends('layouts.app')

@section('template_title')
    {{ $impuestosProducto->name ?? "{{ __('Show') Impuestos Producto" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Impuestos Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('impuestos-productos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $impuestosProducto->Descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Productos Id:</strong>
                            {{ $impuestosProducto->productos_id }}
                        </div>
                        <div class="form-group">
                            <strong>Impuestos Id:</strong>
                            {{ $impuestosProducto->impuestos_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
