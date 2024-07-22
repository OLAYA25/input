@extends('layouts.app')

@section('template_title')
    {{ $impuesto->name ?? "{{ __('Show') Impuesto" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Impuesto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('impuestos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $impuesto->Descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Valor:</strong>
                            {{ $impuesto->Valor }}
                        </div>
                        <div class="form-group">
                            <strong>Fechavigencia:</strong>
                            {{ $impuesto->FechaVigencia }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $impuesto->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
