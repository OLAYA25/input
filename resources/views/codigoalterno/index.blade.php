@extends('layouts.app')

@section('template_title')
    Codigoalterno
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <h3 id="card_title">
                                {{ __('Codigo alterno') }}
                            </h3> 

                             <div class="float-right">
                                <a href="{{ route('codigoalternos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

                    <div class="panel-body">
                        <div class="table-responsive">
                            @include('codigoalterno.tabla')
                        </div>
                    </div>
                </div>
                {!! $codigoalternos->links() !!}
            </div>
        </div>
    </div>
@endsection
