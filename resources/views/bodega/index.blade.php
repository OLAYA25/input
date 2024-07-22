@extends('layouts.app')

@section('template_title')
    Bodega
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <h3 id="card_title">
                                {{ __('Bodegas') }}
                            </h3>

                             <div class="float-right">
                                <a href="{{ route('bodegas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevos') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Descripcion</th>
										<th>Empresa</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bodegas as $bodega)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $bodega->Descripcion }}</td>
											<td>{{ $bodega->empresas->nombre ?? null }}</td>
											<td>{{ $bodega->estado }}</td>

                                            <td>
                                                <form action="{{ route('bodegas.destroy',$bodega->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('bodegas.show',$bodega->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('bodegas.edit',$bodega->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $bodegas->links() !!}
            </div>
        </div>
    </div>
@endsection
