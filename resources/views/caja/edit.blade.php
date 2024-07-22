@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Caja
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')
                
                <div class="card card-default">
                    
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Update') }} Caja</h3>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="panel-body">
                        <form method="POST" action="{{ route('cajas.update', $caja->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('caja.form')

                        </form>
                    </div>
                    @php
                        use App\Models\Parametizarcaja;
                        $parametizarcaja = new Parametizarcaja();
                    @endphp
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Actualización ') }} parametizar cajas</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('parametizarcajas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('parametizarcaja.form')
                            
                        </form>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
@endsection
