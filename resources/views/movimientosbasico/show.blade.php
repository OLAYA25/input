@extends('layouts.app')

@section('template_title')
    {{ $movimientosbasico->name ?? "{{ __('Show') Movimientosbasico" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Movimientosbasico</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('movimientosbasicos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Codigo:</strong>
                            {{ $movimientosbasico->Codigo }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $movimientosbasico->Descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Descuento:</strong>
                            {{ $movimientosbasico->Descuento }}
                        </div>
                        <div class="form-group">
                            <strong>Agregar:</strong>
                            {{ $movimientosbasico->Agregar }}
                        </div>
                        <div class="form-group">
                            <strong>Alerta:</strong>
                            {{ $movimientosbasico->Alerta }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
