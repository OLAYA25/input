@extends('layouts.app')

@section('template_title')
    Proveedoreusuario
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Proveedoreusuario') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('proveedoreusuarios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Usuario Id</th>
										<th>Proveedor Id</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proveedoreusuarios as $proveedoreusuario)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $proveedoreusuario->Usuario_id }}</td>
											<td>{{ $proveedoreusuario->Proveedor_id }}</td>
											<td>{{ $proveedoreusuario->estado }}</td>

                                            <td>
                                                <form action="{{ route('proveedoreusuarios.destroy',$proveedoreusuario->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('proveedoreusuarios.show',$proveedoreusuario->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('proveedoreusuarios.edit',$proveedoreusuario->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $proveedoreusuarios->links() !!}
            </div>
        </div>
    </div>
@endsection
