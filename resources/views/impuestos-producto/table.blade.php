<div class="table-responsive">
   <table class="table table-striped table-hover">
    <thead class="thead">
        <tr>
            <th>No</th>
            
            <th>Descripcion</th>
            <th>Productos Id</th>
            <th>Impuestos Id</th>
            <th>Valor</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($impuestosProductos as $impuestosProducto)
            <tr>
                <td>{{ $impuestosProducto->id}}</td>
                
                <td>{{ $impuestosProducto->Descripcion }}</td>
                <td>{{ $impuestosProducto->producto->Descripcion ?? NULL }}</td>
                <td>{{ $impuestosProducto->impuesto->Descripcion ?? NULL }}</td>
                <td>{{ $impuestosProducto->impuesto->Valor ?? NULL }}</td>
                <td>
                    <form action="{{ route('impuestos-productos.destroy',$impuestosProducto->id) }}" method="POST">
                        <a class="btn btn-sm btn-primary " href="{{ route('impuestos-productos.show',$impuestosProducto->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                        <a class="btn btn-sm btn-success" href="{{ route('impuestos-productos.edit',$impuestosProducto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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