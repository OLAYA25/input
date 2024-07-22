@extends('layouts.app')

@section('template_title')
    Codigo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Codigo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('codigos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            @include('codigo.tabla')
                        </div>
                    </div>
                </div>
                {!! $codigos->links() !!}
            </div>
        </div>
    </div>
@endsection
