@extends('layouts.app')

@section('template_title')
    {{ $proveedore->name ?? "{{ __('Show') Proveedore" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Proveedore</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('proveedores.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tipopersona:</strong>
                            {{ $proveedore->TipoPersona }}
                        </div>
                        <div class="form-group">
                            <strong>Numerodocumento:</strong>
                            {{ $proveedore->NumeroDocumento }}
                        </div>
                        <div class="form-group">
                            <strong>Razonsocial:</strong>
                            {{ $proveedore->RazonSocial }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono1:</strong>
                            {{ $proveedore->Telefono1 }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono2:</strong>
                            {{ $proveedore->Telefono2 }}
                        </div>
                        <div class="form-group">
                            <strong>Ciudad:</strong>
                            {{ $proveedore->Ciudad }}
                        </div>
                        <div class="form-group">
                            <strong>Departamento:</strong>
                            {{ $proveedore->Departamento }}
                        </div>
                        <div class="form-group">
                            <strong>Regimen:</strong>
                            {{ $proveedore->Regimen }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $proveedore->Tipo }}
                        </div>
                        <div class="form-group">
                            <strong>Correofacturacion:</strong>
                            {{ $proveedore->CorreoFacturacion }}
                        </div>
                        <div class="form-group">
                            <strong>Observacion:</strong>
                            {{ $proveedore->Observacion }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $proveedore->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
