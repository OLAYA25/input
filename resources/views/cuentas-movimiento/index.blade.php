@extends('layouts.app')

@section('template_title')
    Cuentas Movimiento
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cuentas Movimiento') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('cuentas-movimientos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Cuenta</th>
										<th>Cuentaegreso</th>
										<th>Codigo Id</th>
										<th>Movimiento Id</th>
										<th>Tipomovimiento</th>
										<th>Descripcionmovimiento</th>
										<th>Valor</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cuentasMovimientos as $cuentasMovimiento)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $cuentasMovimiento->Cuenta }}</td>
											<td>{{ $cuentasMovimiento->CuentaEgreso }}</td>
											<td>{{ $cuentasMovimiento->Codigo_id }}</td>
											<td>{{ $cuentasMovimiento->Movimiento_id }}</td>
											<td>{{ $cuentasMovimiento->TipoMovimiento }}</td>
											<td>{{ $cuentasMovimiento->DescripcionMovimiento }}</td>
											<td>{{ $cuentasMovimiento->Valor }}</td>

                                            <td>
                                                <form action="{{ route('cuentas-movimientos.destroy',$cuentasMovimiento->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('cuentas-movimientos.show',$cuentasMovimiento->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('cuentas-movimientos.edit',$cuentasMovimiento->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $cuentasMovimientos->links() !!}
            </div>
        </div>
    </div>
@endsection
