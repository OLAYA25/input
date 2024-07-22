@extends('layouts.app')

@section('template_title')
    Movimiento
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Movimiento') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('movimientos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Tipomovimiento Id</th>
										<th>Origenbodega Id</th>
										<th>Origenproveedor Id</th>
										<th>Usuariodestino Id</th>
										<th>Destinobodega Id</th>
										<th>Users Id</th>
										<th>Caja Id</th>
										<th>Cuenta Id</th>
										<th>Valorimpuesto</th>
										<th>Valorsinimpuesto</th>
										<th>Total</th>
										<th>Estado</th>
										<th>Update At</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($movimientos as $movimiento)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $movimiento->TipoMovimiento_id }}</td>
											<td>{{ $movimiento->OrigenBodega_id }}</td>
											<td>{{ $movimiento->OrigenProveedor_id }}</td>
											<td>{{ $movimiento->UsuarioDestino_id }}</td>
											<td>{{ $movimiento->DestinoBodega_id }}</td>
											<td>{{ $movimiento->users_id }}</td>
											<td>{{ $movimiento->Caja_id }}</td>
											<td>{{ $movimiento->Cuenta_id }}</td>
											<td>{{ $movimiento->ValorImpuesto }}</td>
											<td>{{ $movimiento->ValorSinImpuesto }}</td>
											<td>{{ $movimiento->Total }}</td>
											<td>{{ $movimiento->estado }}</td>
											<td>{{ $movimiento->update_at }}</td>

                                            <td>
                                                <form action="{{ route('movimientos.destroy',$movimiento->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('movimientos.show',$movimiento->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('movimientos.edit',$movimiento->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $movimientos->links() !!}
            </div>
        </div>
    </div>
@endsection
