@extends('layouts.app')

@section('template_title')
    Usuariobasico
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Usuariobasico') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('usuariobasicos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                        <div class="table-responsive">
                            <table id="demo-dt-basic" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Tipodocumento</th>
										<th>Ndocumento</th>
										<th>Nombre1</th>
										<th>Nombre2</th>
										<th>Apellido1</th>
										<th>Apeelido2</th>
										<th>Telefono</th>
										<th>Email</th>
										<th>Checkproveedor</th>
										<th>Estado</th>
										<th>Fechanacimiento</th>
										<th>Genero</th>
										<th>Telefonofijo</th>
										<th>Telefonomovil</th>
										<th>Sexo</th>
										<th>Empleado Id</th>
										<th>Proveedor Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuariobasicos as $usuariobasico)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $usuariobasico->TipoDocumento }}</td>
											<td>{{ $usuariobasico->NDocumento }}</td>
											<td>{{ $usuariobasico->Nombre1 }}</td>
											<td>{{ $usuariobasico->Nombre2 }}</td>
											<td>{{ $usuariobasico->Apellido1 }}</td>
											<td>{{ $usuariobasico->Apeelido2 }}</td>
											<td>{{ $usuariobasico->Telefono }}</td>
											<td>{{ $usuariobasico->Email }}</td>
											<td>{{ $usuariobasico->Checkproveedor }}</td>
											<td>{{ $usuariobasico->estado }}</td>
											<td>{{ $usuariobasico->FechaNacimiento }}</td>
											<td>{{ $usuariobasico->Genero }}</td>
											<td>{{ $usuariobasico->TelefonoFijo }}</td>
											<td>{{ $usuariobasico->TelefonoMovil }}</td>
											<td>{{ $usuariobasico->Sexo }}</td>
											<td>{{ $usuariobasico->Empleado_id }}</td>
											<td>{{ $usuariobasico->Proveedor_id }}</td>

                                            <td>
                                                <form action="{{ route('usuariobasicos.destroy',$usuariobasico->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('usuariobasicos.show',$usuariobasico->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('usuariobasicos.edit',$usuariobasico->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $usuariobasicos->links() !!}
            </div>
        </div>
    </div>
@endsection
