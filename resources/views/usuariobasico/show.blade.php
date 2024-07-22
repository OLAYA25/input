@extends('layouts.app')

@section('template_title')
    {{ $usuariobasico->name ?? "{{ __('Show') Usuariobasico" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Usuariobasico</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('usuariobasicos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tipodocumento:</strong>
                            {{ $usuariobasico->TipoDocumento }}
                        </div>
                        <div class="form-group">
                            <strong>Ndocumento:</strong>
                            {{ $usuariobasico->NDocumento }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre1:</strong>
                            {{ $usuariobasico->Nombre1 }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre2:</strong>
                            {{ $usuariobasico->Nombre2 }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido1:</strong>
                            {{ $usuariobasico->Apellido1 }}
                        </div>
                        <div class="form-group">
                            <strong>Apeelido2:</strong>
                            {{ $usuariobasico->Apeelido2 }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $usuariobasico->Telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $usuariobasico->Email }}
                        </div>
                        <div class="form-group">
                            <strong>Checkproveedor:</strong>
                            {{ $usuariobasico->Checkproveedor }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $usuariobasico->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Fechanacimiento:</strong>
                            {{ $usuariobasico->FechaNacimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Genero:</strong>
                            {{ $usuariobasico->Genero }}
                        </div>
                        <div class="form-group">
                            <strong>Telefonofijo:</strong>
                            {{ $usuariobasico->TelefonoFijo }}
                        </div>
                        <div class="form-group">
                            <strong>Telefonomovil:</strong>
                            {{ $usuariobasico->TelefonoMovil }}
                        </div>
                        <div class="form-group">
                            <strong>Sexo:</strong>
                            {{ $usuariobasico->Sexo }}
                        </div>
                        <div class="form-group">
                            <strong>Empleado Id:</strong>
                            {{ $usuariobasico->Empleado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Proveedor Id:</strong>
                            {{ $usuariobasico->Proveedor_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
