<form id="CodigoAlternos">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="Descripcion">Descripcion</label>
                <input class="form-control" placeholder="Descripcion" name="Descripcion" type="text" id="Descripcion">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="estado">Estado</label>
                <select class="form-control" id="estado" name="estado"><option value="Activo">Activo</option><option value="Inactivo">Inactivo</option></select>
                
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <div class="input-group mar-btn ">
                    <input class="form-control" placeholder="Cantidad" name="cantidad" type="number" id="cantidad">
                    <span class="input-group-btn">
                        <button type="submit"  class="btn btn-success "> Agregar</button>
                    </span>
                    
                </div>
            </div>
        </div>
        <div class="col-sm-4" style="display: none">
            <div class="form-group">
                <label for="producto_id">Producto Id</label>
                <input class="form-control" placeholder="Producto Id" value="{{$producto->id}}" name="producto_id" type="text" id="producto_id">
                
            </div>
        </div>
    </div>
</form>
@php
    use App\Models\Codigoalterno;
    $codigoalternos = Codigoalterno::where('producto_id', $producto->id)->get();
@endphp
@include('codigoalterno.tabla')

<script>
      document.getElementById('CodigoAlternos').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting via the browser
    const formData = new FormData(this);
    const data = {};

    formData.forEach((value, key) => {
        data[key] = value;
    });

    fetch('{{ route("codigoalternos.store") }}', {
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
        alert('Codigo Agregado');
        location.reload();
    })
    .catch((error) => {
        // Handle error response for the first request
        console.error('Error:', error);
    });
});
</script>