@extends('layouts.app')

@section('template_title')
    {{ $resolucione->name ?? "{{ __('Show') Resolucione" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Resolucione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('resoluciones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Movimientos Id:</strong>
                            {{ $resolucione->Movimientos_id }}
                        </div>
                        <div class="form-group">
                            <strong>Prefijo:</strong>
                            {{ $resolucione->Prefijo }}
                        </div>
                        <div class="form-group">
                            <strong>Desdenumero:</strong>
                            {{ $resolucione->DesdeNumero }}
                        </div>
                        <div class="form-group">
                            <strong>Hastanumero:</strong>
                            {{ $resolucione->HastaNumero }}
                        </div>
                        <div class="form-group">
                            <strong>Fechainicio:</strong>
                            {{ $resolucione->FechaInicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fechafin:</strong>
                            {{ $resolucione->FechaFin }}
                        </div>
                        <div class="form-group">
                            <strong>Vigencia:</strong>
                            {{ $resolucione->Vigencia }}
                        </div>
                        <div class="form-group">
                            <strong>Upated At:</strong>
                            {{ $resolucione->upated_at }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
