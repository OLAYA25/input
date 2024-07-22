@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Movimientosbasico
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h2 class="card-title">{{ __('Crear') }} Movimientos basico</h2>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('movimientosbasicos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('movimientosbasico.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
