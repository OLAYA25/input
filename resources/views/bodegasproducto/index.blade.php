@extends('layouts.app')

@section('template_title')
    Bodegasproducto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Bodegasproducto') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('bodegasproductos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Producto</th>
										<th>Cantidad</th>
										<th>Bodega</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bodegasproductos as $bodegasproducto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $bodegasproducto->Producto }}</td>
											<td>{{ $bodegasproducto->Cantidad }}</td>
											<td>{{ $bodegasproducto->Bodega }}</td>
											<td>{{ $bodegasproducto->estado }}</td>

                                            <td>
                                                <form action="{{ route('bodegasproductos.destroy',$bodegasproducto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('bodegasproductos.show',$bodegasproducto->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('bodegasproductos.edit',$bodegasproducto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $bodegasproductos->links() !!}
            </div>
        </div>
    </div>
@endsection
