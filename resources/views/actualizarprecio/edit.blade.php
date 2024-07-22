@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Actualizarprecio
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Actualizarprecio</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('actualizarprecios.update', $actualizarprecio->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('actualizarprecio.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
