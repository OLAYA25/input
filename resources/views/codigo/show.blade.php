@extends('layouts.app')

@section('template_title')
    {{ $codigo->name ?? "{{ __('Show') Codigo" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Codigo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('codigos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $codigo->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Codigo:</strong>
                            {{ $codigo->Codigo }}
                        </div>
                        <div class="form-group">
                            <strong>Subcodigo:</strong>
                            {{ $codigo->Subcodigo }}
                        </div>
                        <div class="form-group">
                            <strong>Descipcion:</strong>
                            {{ $codigo->Descipcion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
