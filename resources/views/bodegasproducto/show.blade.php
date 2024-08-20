@extends('layouts.app')

@section('template_title')
    {{ $bodegasproducto->name ?? "{{ __('Show') Bodegasproducto" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Bodegasproducto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('bodegasproductos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Producto:</strong>
                            {{ $bodegasproducto->Producto }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $bodegasproducto->Cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Bodega:</strong>
                            {{ $bodegasproducto->Bodega }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $bodegasproducto->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
