@extends('layouts.app')

@section('template_title')
    {{ $familia3->name ?? "{{ __('Show') Familia3" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Familia3</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('familia3s.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $familia3->Descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $familia3->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
