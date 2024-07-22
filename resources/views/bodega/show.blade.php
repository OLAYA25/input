@extends('layouts.app')

@section('template_title')
    {{ $bodega->name ?? "{{ __('Show') Bodega" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Bodega</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('bodegas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $bodega->Descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Empresa:</strong>
                            {{ $bodega->empresa }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $bodega->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
