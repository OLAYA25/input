
@if (Route::is('usuariobasicos.edit'))
<h4 class="text-center" > <i i data-toggle="collapse" href="#detallepc" role="button" aria-expanded="true" aria-controls="detallepc" >Crear proveedores</i>    </h4>

<div class=" collapse" id="detallepc">
@else
<div id="detallepc">
@endif



<div class="container mt-4">
    <div class="panel-body">
        <form id="proveedorForm">
            <div class="box box-info padding-1">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Tipo Persona">Tipo Persona</label>
                                <select name="TipoPersona" class="form-control" id="TipoPersona">
                                    <option value="">Seleccionar</option>
                                    <option value="Natural">Persona Natural</option>
                                    <option value="Juridica">Persona Juridica</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Numero Documento">Numero Documento</label>
                                <input class="form-control" placeholder="Numero documento" name="NumeroDocumento" type="text" id="NumeroDocumento">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Razon Social">Razon Social</label>
                                <input class="form-control" placeholder="Razon social" name="RazonSocial" type="text" id="RazonSocial">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Telefono1">Telefono1</label>
                                <input class="form-control" placeholder="Telefono1" name="Telefono1" type="text" id="Telefono1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Telefono2">Telefono2</label>
                                <input class="form-control" placeholder="Telefono2" name="Telefono2" type="text" id="Telefono2">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Ciudad">Ciudad</label>
                                <input class="form-control" placeholder="Ciudad" name="Ciudad" type="text" id="Ciudad">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Departamento">Departamento</label>
                                <input class="form-control" placeholder="Departamento" name="Departamento" type="text" id="Departamento">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Regimen">Regimen</label>
                                <select name="Regimen" id="Regimen" class="form-control"> 
                                    <option value="">Seleccionar</option>
                                    <option value="Tributario">Tributario</option>
                                    <option value="Ordinario">Ordinario</option>
                                    <option value="Simple">Simple</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Tipo">Tipo</label>
                                <input class="form-control" placeholder="Tipo" name="Tipo" type="text" id="Tipo">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Correo Facturacion">Correo Facturacion</label>
                                <input class="form-control" placeholder="Correo facturacion" name="CorreoFacturacion" type="email" id="CorreoFacturacion">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Observacion">Observacion</label>
                                <input class="form-control" placeholder="Observacion" name="Observacion" type="text" id="Observacion">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <select name="estado" class="form-control" id="estado">
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer mt20">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

</div>
<!-- JavaScript to handle form submission -->
<script>
   document.getElementById('proveedorForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting via the browser

    const formData = new FormData(this);
    const data = {};

    formData.forEach((value, key) => {
        data[key] = value;
    });

    fetch('{{ route("proveedores.store") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': CSRF,
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        // Handle success response
        console.log('Success:', data.id);
        @if (Route::is('usuariobasicos.edit') )
            var cx ='{{ $usuariobasico->id }}';
        @endif
        agregarusers(cx,data.id);
        
    })
    .catch((error) => {
        // Handle error response for the first request
        console.error('Error:', error);
    });
});

function agregarusers(Usuario_id,Proveedor_id) {
    @if (Route::is('usuariobasicos.edit'))
            const datax = {
                Usuario_id:Usuario_id,
                Proveedor_id: Proveedor_id,  // Usa la respuesta de la primera petición
                estado: 'Activo',
            };

            fetch('{{ route("proveedoreusuarios.store") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': CSRF,
                },
                body: JSON.stringify(datax)
            })
            .then(response => response.json())
            .then(data => {
                alert("Agregado");
                // Handle success response for the second request
                console.log('Success:', data);
            })
            .catch((error) => {
                // Handle error response for the second request
                console.error('Error:', error);
            });
        @endif
    
}
</script>