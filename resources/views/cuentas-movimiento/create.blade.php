@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Cuentas Movimiento
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Cuentas Movimiento</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cuentas-movimientos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('cuentas-movimiento.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
