@extends('layouts.app')

@section('template_title')
    {{ $familia1->name ?? "{{ __('Show') Familia1" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Familia1</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('familia1s.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $familia1->Descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $familia1->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
