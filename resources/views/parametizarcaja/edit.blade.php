@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Parametizarcaja
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Parametizarcaja</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('parametizarcajas.update', $parametizarcaja->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('parametizarcaja.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
