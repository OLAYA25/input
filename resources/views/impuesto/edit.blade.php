@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Impuesto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Actualizar') }} Impuesto</span>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('impuestos.update', $impuesto->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('impuesto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
