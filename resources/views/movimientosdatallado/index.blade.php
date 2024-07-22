@extends('layouts.app')

@section('template_title')
    Movimientosdatallado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Movimientosdatallado') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('movimientosdatallados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Movimientos Id</th>
										<th>Producto Id</th>
										<th>Cantidad Ingreso</th>
										<th>Valorunitario</th>
										<th>Totalvalor</th>
										<th>Impuesto Id</th>
										<th>Cantidad Egreso</th>
										<th>Valor Unitario</th>
										<th>Users Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($movimientosdatallados as $movimientosdatallado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $movimientosdatallado->Movimientos_id }}</td>
											<td>{{ $movimientosdatallado->Producto_id }}</td>
											<td>{{ $movimientosdatallado->Cantidad_Ingreso }}</td>
											<td>{{ $movimientosdatallado->ValorUnitario }}</td>
											<td>{{ $movimientosdatallado->TotalValor }}</td>
											<td>{{ $movimientosdatallado->Impuesto_id }}</td>
											<td>{{ $movimientosdatallado->Cantidad_Egreso }}</td>
											<td>{{ $movimientosdatallado->Valor_Unitario }}</td>
											<td>{{ $movimientosdatallado->users_id }}</td>

                                            <td>
                                                <form action="{{ route('movimientosdatallados.destroy',$movimientosdatallado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('movimientosdatallados.show',$movimientosdatallado->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('movimientosdatallados.edit',$movimientosdatallado->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $movimientosdatallados->links() !!}
            </div>
        </div>
    </div>
@endsection
