@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Movimientosbasico
@endsection

@section('content')
@php
use App\Models\Resolucione;
$resolucione = new Resolucione();
$resoluciones = Resolucione::where('Movimientos_id',$movimientosbasico->id)->get();

@endphp
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                        <h2 class="card-title">{{ __('Actualizar') }} Movimientos basico</h2>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('movimientosbasicos.updates', $movimientosbasico->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('movimientosbasico.form')
                            
                        </form>
                    </div>
                    <div class="card-header">
                        <span class="card-title">{{ __('Aregar') }} Resolucione</span>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('resoluciones.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('resolucione.form')

                        </form>
                    </div>
                    @include('resolucione.table');
                </div>
            </div>
        </div>
    </section>
@endsection
