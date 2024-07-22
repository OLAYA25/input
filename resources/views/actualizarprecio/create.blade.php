
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Actualizarprecio</span>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('actualizarprecios.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('actualizarprecio.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

