<table class="table table-striped table-hover">
    <thead class="thead">
        <tr>
            <th>No</th>
            
            <th>Descripcion</th>
            <th>Estado</th>
            <th>Cantidad</th>
            <th>Producto Id</th>

            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($codigoalternos as $codigoalterno)
            <tr>
                <td>{{ $codigoalterno->id }}</td>
                
                <td>{{ $codigoalterno->Descripcion }}</td>
                <td>{{ $codigoalterno->estado }}</td>
                <td>{{ $codigoalterno->cantidad }}</td>
                <td>{{ $codigoalterno->producto_id }}</td>

                <td>
                    <form action="{{ route('codigoalternos.destroy',$codigoalterno->id) }}" method="POST">
                        <a class="btn btn-sm btn-primary " href="{{ route('codigoalternos.show',$codigoalterno->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                        <a class="btn btn-sm btn-success" href="{{ route('codigoalternos.edit',$codigoalterno->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>