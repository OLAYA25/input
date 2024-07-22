<table class="table table-striped table-hover">
    <thead class="thead">
        <tr>
            <th>No</th>
            
            <th>Estado</th>
            <th>Codigo</th>
            <th>Subcodigo</th>
            <th>Descipcion</th>

            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($codigos as $codigo)
            <tr>
                <td>{{ ++$i }}</td>
                
                <td>{{ $codigo->estado }}</td>
                <td>{{ $codigo->Codigo }}</td>
                <td>{{ $codigo->Subcodigo }}</td>
                <td>{{ $codigo->Descipcion }}</td>

                <td>
                    <form action="{{ route('codigos.destroy',$codigo->id) }}" method="POST">
                        <a class="btn btn-sm btn-primary " href="{{ route('codigos.show',$codigo->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                        <a class="btn btn-sm btn-success" href="{{ route('codigos.edit',$codigo->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>