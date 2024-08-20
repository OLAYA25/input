<div class="table-responsive">
    <table id="demo-dt-basic" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead class="thead">
            <tr>
                <th>No</th>
                
                <th>Producto Id</th>
                <th>Impuesto Id</th>
                <th>Principal</th>
                <th>Valorbase</th>
                <th>Proveedor Id</th>
                <th>Valorpublico</th>
                <th>Descuento1</th>
                <th>Cantidad1</th>
                <th>Descuento2</th>
                <th>Cantidad2</th>
                <th>Descuento3</th>
                <th>Cantidad3</th>

                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($actualizarprecios as $actualizarprecio)
                <tr>
                    <td>{{ $actualizarprecio->id }}</td>
                    
                    <td>{{ $actualizarprecio->producto->Descripcion ?? null}}</td>
                    <td>{{ $actualizarprecio->Impuesto_id ?? null }}</td>
                    <td>{{ $actualizarprecio->Principal }}</td>
                    <td>{{ $actualizarprecio->ValorBase }}</td>
                    <td>{{ $actualizarprecio->Proveedor_id }}</td>
                    <td>{{ $actualizarprecio->ValorPublico }}</td>
                    <td>{{ $actualizarprecio->Descuento1 }}</td>
                    <td>{{ $actualizarprecio->Cantidad1 }}</td>
                    <td>{{ $actualizarprecio->Descuento2 }}</td>
                    <td>{{ $actualizarprecio->Cantidad2 }}</td>
                    <td>{{ $actualizarprecio->Descuento3 }}</td>
                    <td>{{ $actualizarprecio->Cantidad3 }}</td>

                    <td>
                        <form action="{{ route('actualizarprecios.destroy',$actualizarprecio->id) }}" method="POST">
                            <a class="btn btn-sm btn-primary " href="{{ route('actualizarprecios.show',$actualizarprecio->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                            <a class="btn btn-sm btn-success" href="{{ route('actualizarprecios.edit',$actualizarprecio->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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