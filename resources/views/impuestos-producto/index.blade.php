@extends('layouts.app')

@section('template_title')
    Impuestos Producto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Impuestos Producto') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('impuestos-productos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        
                            @include('impuestos-producto.table')
                       
                    </div>
                </div>
                {!! $impuestosProductos->links() !!}
            </div>
        </div>
    </div>
@endsection
