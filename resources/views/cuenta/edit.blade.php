@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Cuenta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Actualizar') }} Cuenta</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('cuentas.update', $cuenta->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('cuenta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
