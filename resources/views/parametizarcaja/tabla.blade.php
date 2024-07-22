<table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Caja Id</th>
										<th>Bodegad Id</th>
										<th>Cuentas Id</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($parametizarcajas as $parametizarcaja)
                                        <tr>
                                            <td>{{ $parametizarcaja->id }}</td>
                                            
											<td>{{ $parametizarcaja->caja->Descripcion ?? null }}</td>
											<td>{{ $parametizarcaja->bodega ->Descripcion ?? null }}</td>
											<td>{{ $parametizarcaja->cuenta ->descripcion ?? null }}</td>
											<td>{{ $parametizarcaja->estado }}</td>

                                            <td>
                                                @if (Route::is('cajas.edit'))
                                                <a class="btn btn-sm btn-primary " href="{{ route('parametizarcajas.show',$parametizarcaja->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('parametizarcajas.edit',$parametizarcaja->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                
                                                @else
                                                <form action="{{ route('parametizarcajas.destroy',$parametizarcaja->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('parametizarcajas.show',$parametizarcaja->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('parametizarcajas.edit',$parametizarcaja->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                                @endif
                                               
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>