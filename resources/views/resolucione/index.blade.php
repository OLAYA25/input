@extends('layouts.app')

@section('template_title')
    Resolucione
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Resolucione') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('resoluciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

                    @include('resolucione.table');
                </div>
                {!! $resoluciones->links() !!}
            </div>
        </div>
    </div>
@endsection
