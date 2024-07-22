@extends('layouts.app')

@section('template_title')
    {{ $producto->name ?? "{{ __('Show') Producto" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('productos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $producto->Descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $producto->Imagen }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $producto->Estado }}
                        </div>
                        <div class="form-group">
                            <strong>Existencias:</strong>
                            {{ $producto->Existencias }}
                        </div>
                        <div class="form-group">
                            <strong>Stock Max:</strong>
                            {{ $producto->Stock_Max }}
                        </div>
                        <div class="form-group">
                            <strong>Stock Min:</strong>
                            {{ $producto->Stock_Min }}
                        </div>
                        <div class="form-group">
                            <strong>Vendernegativos:</strong>
                            {{ $producto->VenderNegativos }}
                        </div>
                        <div class="form-group">
                            <strong>Descinventario:</strong>
                            {{ $producto->DescInventario }}
                        </div>
                        <div class="form-group">
                            <strong>Numeroserial:</strong>
                            {{ $producto->NumeroSerial }}
                        </div>
                        <div class="form-group">
                            <strong>Talla:</strong>
                            {{ $producto->Talla }}
                        </div>
                        <div class="form-group">
                            <strong>Largor:</strong>
                            {{ $producto->Largor }}
                        </div>
                        <div class="form-group">
                            <strong>Alto:</strong>
                            {{ $producto->Alto }}
                        </div>
                        <div class="form-group">
                            <strong>Ancho:</strong>
                            {{ $producto->Ancho }}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $producto->Observaciones }}
                        </div>
                        <div class="form-group">
                            <strong>Familia1 Id:</strong>
                            {{ $producto->familia1_id }}
                        </div>
                        <div class="form-group">
                            <strong>Familia2 Id:</strong>
                            {{ $producto->familia2_id }}
                        </div>
                        <div class="form-group">
                            <strong>Familia3 Id:</strong>
                            {{ $producto->familia3_id }}
                        </div>
                        <div class="form-group">
                            <strong>Unidadmedida Id:</strong>
                            {{ $producto->unidadmedida_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
