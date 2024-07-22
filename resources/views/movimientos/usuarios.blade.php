<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Usuarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  id="Usarios" >
                    @csrf
                    <div class="box box-info padding-1">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="TipoDocumento">Tipo Id</label>
                                        <select class="form-control" id="TipoDocumento" name="TipoDocumento">
                                            <option selected="selected" value="">Tipo Id</option>
                                            <option value="CC">CC</option>
                                            <option value="TI">TI</option>
                                            <option value="AS">AS</option>
                                            <option value="CE">CE</option>
                                            <option value="CN">CN</option>
                                            <option value="DE">DE</option>
                                            <option value="MS">MS</option>
                                            <option value="NI">NI</option>
                                            <option value="NU">NU</option>
                                            <option value="PA">PA</option>
                                            <option value="PE">PE</option>
                                            <option value="PT">PT</option>
                                            <option value="RC">RC</option>
                                            <option value="SC">SC</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="NDocumento">NDocumento</label>
                                        <input class="form-control" placeholder="Ndocumento" name="NDocumento"
                                            type="text" id="NDocumento">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Nombre1">Nombre1</label>
                                        <input class="form-control" placeholder="Nombre1" name="Nombre1" type="text"
                                            id="Nombre1">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Nombre2">Nombre2</label>
                                        <input class="form-control" placeholder="Nombre2" name="Nombre2" type="text"
                                            id="Nombre2">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Apellido1">Apellido1</label>
                                        <input class="form-control" placeholder="Apellido1" name="Apellido1" type="text"
                                            id="Apellido1">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Apellido2">Apellido2</label>
                                        <input class="form-control" placeholder="Apellido2" name="Apellido2" type="text"
                                            id="Apellido2">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Telefono">Telefono</label>
                                        <input class="form-control" placeholder="Telefono" name="Telefono" type="text"
                                            id="Telefono">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Email">Email</label>
                                        <input class="form-control" placeholder="Email" name="Email" type="text"
                                            id="Email">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="TelefonoFijo">TelefonoFijo</label>
                                        <input class="form-control" placeholder="Telefonofijo" name="TelefonoFijo"
                                            type="text" id="TelefonoFijo">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="TelefonoMovil">TelefonoMovil</label>
                                        <input class="form-control" placeholder="Telefonomovil" name="TelefonoMovil"
                                            type="text" id="TelefonoMovil">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Genero">Genero</label>
                                        <select class="form-control" id="Genero" name="Genero">
                                            <option selected="selected" value="">Genero</option>
                                            <option value="MUJER">MUJER</option>
                                            <option value="HOMBRE">HOMBRE</option>
                                            <option value="OTRO">OTRO</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Sexo">Sexo</label>
                                        <select class="form-control" id="Sexo" name="Sexo">
                                            <option selected="selected" value="">Sexo</option>
                                            <option value="HOMBRE">HOMBRE</option>
                                            <option value="MUJER">MUJER</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Fecha Nacimiento">Fecha Nacimiento</label>
                                        <input class="form-control" placeholder="Fechanacimiento" name="FechaNacimiento"
                                            type="date">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <select class="form-control" id="estado" name="estado">
                                            <option selected="selected" value="">Estado</option>
                                            <option value="Activo">Activo</option>
                                            <option value="Inactivo">Inactivo</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <br>
                        <div class="box-footer mt20">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('keydown', function (event) {
        if (event.ctrlKey && event.key === 'u') {
            event.preventDefault();
            $('#exampleModal').modal('show');
        }
       
    });

    document.getElementById('Usarios').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting via the browser

    const formData = new FormData(this);
    const data = {};

    formData.forEach((value, key) => {
        data[key] = value;
    });

    fetch('{{ route("usuariobasicos.store") }}', {
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
       
        
    })
    .catch((error) => {
        // Handle error response for the first request
        console.error('Error:', error);
    });
});
</script>