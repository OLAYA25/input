<div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Descripcion</th>
										<th>Valor</th>
										<th>Fechavigencia</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($impuestos as $impuesto)
                                        <tr>
                                            <td>{{ $impuesto->id }}</td>
                                            
											<td>{{ $impuesto->Descripcion }}</td>
											<td>{{ $impuesto->Valor }}</td>
											<td>{{ $impuesto->FechaVigencia }}</td>
											<td>{{ $impuesto->estado }}</td>

                                            <td>
                                                @if(Route::is('impuestos.index'))
                                                <form action="{{ route('impuestos.destroy',$impuesto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('impuestos.show',$impuesto->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('impuestos.edit',$impuesto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                                @else
                                                <a class="btn btn-sm btn-primary " data-dismiss="modal"  onclick="AgregarImpuestos({{$producto->id}},{{$impuesto->id}})" href="#"><i class="fa fa-fw fa-eye"></i> {{ __('Aceptar') }}</a>
                                                    
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <script>
                            function AgregarImpuestos(idProducto, impuestos_id) {
                                fetch('{{ route("impuestos-productos.store") }}', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'Accept': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: JSON.stringify({
                                        productos_id: idProducto,
                                        impuestos_id: impuestos_id
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    
                                    document.getElementById('modalImpuestos').style.display = 'none';
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    alert('Hubo un error al agregar el impuesto');
                                });
                            }
                        </script>