@extends('layouts.app')

@section('template_title')
    {{ $empresa->name ?? "{{ __('Show') Empresa" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Empresa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empresas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nit:</strong>
                            {{ $empresa->nit }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $empresa->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Regimen:</strong>
                            {{ $empresa->tipo_regimen }}
                        </div>
                        <div class="form-group">
                            <strong>Nregimen:</strong>
                            {{ $empresa->NRegimen }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $empresa->Email }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $empresa->Direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Logo:</strong>
                            {{ $empresa->Logo }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $empresa->Telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Nombrereprent:</strong>
                            {{ $empresa->NombreReprent }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $empresa->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
