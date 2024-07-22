@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Bodega
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Actualizar') }} Bodega</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('bodegas.update', $bodega->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('bodega.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
