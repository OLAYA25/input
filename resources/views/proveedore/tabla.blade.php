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
                
                <th>Tipo persona</th>
                <th>Numero documento</th>
                <th>Razon social</th>
                <th>Regimen</th>
                <th>Tipo</th>
                <th>Correofacturacion</th>
                <th>Observacion</th>
                <th>Estado</th>

                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedores as $proveedore)
                <tr>
                    <td>{{ $proveedore->id ?? null}}</td>
                    
                    <td>{{ $proveedore->TipoPersona }}</td>
                    <td>{{ $proveedore->NumeroDocumento }}</td>
                    <td>{{ $proveedore->RazonSocial }}</td>
                   
                    <td>{{ $proveedore->Regimen }}</td>
                    <td>{{ $proveedore->Tipo }}</td>
                    <td>{{ $proveedore->CorreoFacturacion }}</td>
                    <td>{{ $proveedore->Observacion }}</td>
                    <td>{{ $proveedore->estado }}</td>

                    <td>
                        <form action="{{ route('proveedores.destroy',$proveedore->id) }}" method="POST">
                            @if (Route::is('usuariobasicos.edit') )
                                <a class="btn btn-sm btn-info " onclick="agregarusers('{{$usuariobasico->id }}','{{$proveedore->id}}')" href="#"><i class="fa fa-fw fa-eye"></i> {{ __('Agregar') }}</a>
                            @endif
                            @if (Route::is('productos.edit') )
                                <a class="btn btn-sm btn-info " data-dismiss="modal" onclick="agregar('{{$proveedore->id}}')" href="#"><i class="fa fa-fw fa-eye"></i> {{ __('Agregar') }}</a>
                            <script>
                                function agregar (id) {
                                    document.getElementById('Proveedor_id').value ="";
                                    document.getElementById('Proveedor_id').value = id;
                                }
                            </script>
                            @else
                            <a class="btn btn-sm btn-primary " href="{{ route('proveedores.show',$proveedore->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                            <a class="btn btn-sm btn-success" href="{{ route('proveedores.edit',$proveedore->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                            
                            @csrf
                            @method('DELETE')
                            <button type="submit"  class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>