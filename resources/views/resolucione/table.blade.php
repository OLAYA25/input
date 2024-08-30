<div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Movimientos Id</th>
										<th>Prefijo</th>
										<th>Desdenumero</th>
										<th>Hastanumero</th>
										<th>Fechainicio</th>
										<th>Fechafin</th>
										<th>Vigencia</th>
										<th>Upated At</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($resoluciones as $resolucione)
                                        <tr>
                                            <td>{{ $resolucione->id }}</td>
                                            
											<td>{{ $resolucione->Movimientos_id }}</td>
											<td>{{ $resolucione->Prefijo }}</td>
											<td>{{ $resolucione->DesdeNumero }}</td>
											<td>{{ $resolucione->HastaNumero }}</td>
											<td>{{ $resolucione->FechaInicio }}</td>
											<td>{{ $resolucione->FechaFin }}</td>
											<td>{{ $resolucione->Vigencia }}</td>
											<td>{{ $resolucione->estado }}</td>

                                            <td>
                                                <form action="{{ route('resoluciones.destroy',$resolucione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('resoluciones.show',$resolucione->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('resoluciones.edit',$resolucione->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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