@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Bodega
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Crear') }} Bodega</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('bodegas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('bodega.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
