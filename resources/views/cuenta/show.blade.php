@extends('layouts.app')

@section('template_title')
    {{ $cuenta->name ?? "{{ __('Show') Cuenta" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Cuenta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cuentas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Bancos Id:</strong>
                            {{ $cuenta->bancos_id }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $cuenta->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $cuenta->tipo }}
                        </div>
                        <div class="form-group">
                            <strong>Numero:</strong>
                            {{ $cuenta->numero }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $cuenta->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
