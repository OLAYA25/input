@extends('layouts.app')

@section('template_title')
    {{ $proveedoreusuario->name ?? "{{ __('Show') Proveedoreusuario" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Proveedoreusuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('proveedoreusuarios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Usuario Id:</strong>
                            {{ $proveedoreusuario->Usuario_id }}
                        </div>
                        <div class="form-group">
                            <strong>Proveedor Id:</strong>
                            {{ $proveedoreusuario->Proveedor_id }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $proveedoreusuario->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
