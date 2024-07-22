@extends('layouts.app')

@section('template_title')
    {{ $parametizarcaja->name ?? "{{ __('Show') Parametizarcaja" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Parametizarcaja</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('parametizarcajas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Caja Id:</strong>
                            {{ $parametizarcaja->caja_id }}
                        </div>
                        <div class="form-group">
                            <strong>Bodegad Id:</strong>
                            {{ $parametizarcaja->bodegad_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cuentas Id:</strong>
                            {{ $parametizarcaja->cuentas_id }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $parametizarcaja->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
