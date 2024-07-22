@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Usuariobasico
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Usuariobasico</span>
                    </div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="panel-body">
                    <style>
                        /* Custom styles for the tabs */
                        .nav-tabs .nav-link {
                            border: 1px solid transparent;
                            border-top-left-radius: .25rem;
                            border-top-right-radius: .25rem;
                            transition: all 0.3s ease;
                        }
                        .nav-tabs .nav-link:hover {
                            background-color: #f8f9fa;
                            border-color: #dee2e6 #dee2e6 #fff;
                        }
                        .nav-tabs .nav-link.active {
                            color: #495057;
                            background-color: #fff;
                            border-color: #dee2e6 #dee2e6 #fff;
                        }
                        .nav-tabs .nav-link.disabled {
                            color: #6c757d;
                        }
                    </style>
                    
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" id="Usuarios-tab" href="#Usuarios" aria-selected="true">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Proveedores-tab" href="#Proveedores" aria-selected="false">Proveedores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Empleados-tab" href="#Empleados" aria-selected="false">Empleados</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3">
                        <div class="tab-pane active" id="Usuarios" role="tabpanel" aria-labelledby="Usuarios-tab">
                            <form method="POST" action="{{ route('usuariobasicos.update', $usuariobasico->id) }}"  role="form" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf
                
                                @include('usuariobasico.form')
                
                            </form>
                        </div>
                        <div class="tab-pane" id="Proveedores" role="tabpanel" aria-labelledby="Proveedores-tab">
                            @include('proveedore.form')
                            @php
                            use App\Models\Proveedore;
                                $proveedores = Proveedore::paginate();
                            @endphp
                            @include('proveedore.tabla')
                        </div>
                        <div class="tab-pane" id="Empleados" role="tabpanel" aria-labelledby="Empleados-tab">
                            Contenido de Empleados
                        </div>
                    </div>
                    
                    
                </div>
                
                </div>
            </div>
        </div>
    </section>
@endsection

