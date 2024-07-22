@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Producto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Producto</span>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('productos.update', $producto->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('producto.form')

                        </form>
                   
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" onclick="precios()" href="#precios" role="tab">Precios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" onclick="codigosalternos()" href="#codigoalternos" role="tab">Codigos Alternos</a>
                            </li>
                            <!-- Agrega más pestañas según sea necesario -->
                        </ul>
                        <div class="tab-content">
                            <div class="tab-panel active" id="precios"   role="tabpanel">
                                <br>
                                @include('actualizarprecio.precios')
                                <br>
                            </div>
                            <div class="tab-panel" id="codigoalternos" style="display:none" role="tabpanel">
                                <br>
                                @include('codigoalterno.formulario')
                            </div>
                        </div>
                        <script>
                            function precios() {
                                document.getElementById("codigoalternos").style.display="none";
                                document.getElementById("precios").style.display="";
                            }
                            function codigosalternos() {
                                document.getElementById("precios").style.display="none";
                                 document.getElementById("codigoalternos").style.display="";
                            }

                        </script>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
