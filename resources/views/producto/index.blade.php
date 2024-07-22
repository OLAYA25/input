@extends('layouts.app')

@section('template_title')
    Producto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Producto') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('productos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Descripcion</th>
										<th>Imagen</th>
										<th>Estado</th>
										<th>Existencias</th>
										<th>Stock Max</th>
										<th>Stock Min</th>
										<th>Vendernegativos</th>
										<th>Descinventario</th>
										<th>Numeroserial</th>
										<th>Talla</th>
										<th>Largor</th>
										<th>Alto</th>
										<th>Ancho</th>
										<th>Observaciones</th>
										<th>Familia1 Id</th>
										<th>Familia2 Id</th>
										<th>Familia3 Id</th>
										<th>Unidadmedida Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $producto->Descripcion }}</td>
											<td>{{ $producto->Imagen }}</td>
											<td>{{ $producto->Estado }}</td>
											<td>{{ $producto->Existencias }}</td>
											<td>{{ $producto->Stock_Max }}</td>
											<td>{{ $producto->Stock_Min }}</td>
											<td>{{ $producto->VenderNegativos }}</td>
											<td>{{ $producto->DescInventario }}</td>
											<td>{{ $producto->NumeroSerial }}</td>
											<td>{{ $producto->Talla }}</td>
											<td>{{ $producto->Largor }}</td>
											<td>{{ $producto->Alto }}</td>
											<td>{{ $producto->Ancho }}</td>
											<td>{{ $producto->Observaciones }}</td>
											<td>{{ $producto->familia1_id }}</td>
											<td>{{ $producto->familia2_id }}</td>
											<td>{{ $producto->familia3_id }}</td>
											<td>{{ $producto->unidadmedida_id }}</td>

                                            <td>
                                                <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('productos.show',$producto->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('productos.edit',$producto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $productos->links() !!}
            </div>
        </div>
    </div>
@endsection
