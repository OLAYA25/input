

@php
use App\Models\Impuesto;
use App\Models\Actualizarprecio;
use App\Models\Proveedore;
$impuestos = Impuesto::where('estado', 'Activo')->pluck('Descripcion', 'id');
$proveedores =Proveedore::where('estado', 'Activo')->get();
$actualizarprecios= Actualizarprecio::where('Producto_id',$producto->id)->get();
@endphp

<!-- Precios Tab -->
@if (Route::is('productos.edit'))
   <div class="row">
        <form id="proveedorForm">
            <div class="box-body">

                <div class=" form-group" style="display: none">
                    <label for="Producto_id">Producto Id</label>
                    <input class="form-control" placeholder="Producto Id" name="Producto_id"
                        type="text"  value ="{{$producto->id}} "id="Producto_id">

                </div>
                <div class="form-group col-sm-12">
                    <label for="Proveedor_id">Proveedor</label>
                    <div class="input-group mar-btn ">
                        <input disabled class="form-control" placeholder="Proveedor"
                            name="Proveedor_id" type="text" id="Proveedor_id">
                        <span class="input-group-btn">
                            <a href="#" data-toggle="modal" id="Buscar"
                                data-target=".bd-user-modal-lg" class="btn btn-success">Buscar </a>
                        </span>
                    </div>
                </div>
                <div class="form-group col-sm-3" style="display: none">
                    <label for="Principal">Principal</label>
                    <input class="form-control" placeholder="Principal" name="Principal"
                        type="checkbox" id="Principal">
                </div>
                <div class="form-group col-sm-3">
                    <label for="ValorBase">Valor Base</label>
                    <input class="form-control" onchange="base(event)" placeholder="Base"
                        name="ValorBase" type="number" id="ValorBase">
                </div>
                <div class="form-group col-sm-3">
                    <label for="ValorPublico">ValorPublico</label>
                    <input class="form-control" onchange="publico(event)" placeholder="Publico"
                        name="ValorPublico" type="number" id="ValorPublico">
                </div>
                <div class="form-group col-sm-3">
                    <label for="ValorPublico">Utilidad</label>
                    <input class="form-control" onchange="utilidad(event)" placeholder="Utilidad"
                        name="Utilidad" type="text" id="Utilidad">
                </div>
                <div class="form-group col-sm-3">
                    <label for="ValorPublico">Utilidad %</label>
                    <input class="form-control" onchange="utilidadpro(event)" placeholder="Utilidad"
                        name="UtilidadPorc" type="text" id="Utilidadproc">
                </div>
                <div class="form-group col-sm-12">
                    <label for="Impuesto_id">Impuesto Id</label>
                    <select name="Impuesto_id" id="Impuesto_id" class="form-control">
                        <option value="">Seleccionar..</option>
                        @foreach ($impuestos as $id => $descripcion)
                        <option value="{{ $id }}">{{ $descripcion }}</option>
                        @endforeach
                    </select>
                    
                </div>
                <div class="form-group col-sm-2">
                    <label for="Descuento1">Descuento1</label>
                    <input class="form-control" placeholder="Descuento1" name="Descuento1"
                        type="text" id="Descuento1">
                </div>
                <div class="form-group col-sm-2">
                    <label for="Cantidad1">Cantidad1</label>
                    <input class="form-control" placeholder="Cantidad1" name="Cantidad1" type="text"
                        id="Cantidad1">
                </div>
                <div class="form-group col-sm-2">
                    <label for="Descuento2">Descuento2</label>
                    <input class="form-control" placeholder="Descuento2" name="Descuento2"
                        type="text" id="Descuento2">
                </div>
                <div class="form-group col-sm-2">
                    <label for="Cantidad2">Cantidad2</label>
                    <input class="form-control" placeholder="Cantidad2" name="Cantidad2" type="text"
                        id="Cantidad2">
                </div>
                <div class="form-group col-sm-2">
                    <label for="Descuento3">Descuento3</label>
                    <input class="form-control" placeholder="Descuento3" name="Descuento3"
                        type="text" id="Descuento3">
                </div>
                <div class="form-group col-sm-2">
                    <label for="Cantidad3">Cantidad3</label>
                    <input class="form-control" placeholder="Cantidad3" name="Cantidad3" type="text"
                        id="Cantidad3">
                </div>
                <div class="box-footer mt20">
                    <button type="button" id="ActulizarPrecio" class="btn btn-info">Agregar</button>
                </div>
        </form>
          
    </div>
<br>
<div class="panel-body">
    @include('actualizarprecio.tabla')
</div>


<div class="modal fade bd-user-modal-lg " tabindex="-1">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Buscar Equipo</h5>
            </div>
            <div class="modal-body">
                @include('proveedore.tabla');
            </div>
        </div>
    </div>
</div>
<!-- More pricing fields as needed -->
</div>
<script>
   var impuestos = document.getElementById("Impuesto_id");
var bs = document.getElementById("ValorBase");
var public = document.getElementById("ValorPublico");
var ut = document.getElementById("Utilidad");
var utp = document.getElementById("Utilidadproc");

var impuestoPorcentaje = 0; // Variable global para guardar el porcentaje de impuesto

bs.addEventListener('input', base);
public.addEventListener('input', publico);
ut.addEventListener('input', utilidad);
utp.addEventListener('input', utilidadpro);
impuestos.addEventListener('change', function() {
    ObtenerValorImpuesto(impuestos.value);
});

function base(event) {
    updatePublicValue();
    updateUtilidad();
    updateUtilidadproc();
}

function publico(event) {
    updateUtilidad();
    updateUtilidadproc();
}

function utilidad(event) {
    updatePublicValue();
    updateUtilidadproc();
}

function utilidadpro(event) {
    ut.value = ((parseFloat(bs.value) * parseFloat(utp.value)) / 100).toFixed(2);
    updatePublicValue();
}

function updateUtilidad() {
    ut.value = (parseFloat(public.value) - parseFloat(bs.value) - (parseFloat(bs.value) * impuestoPorcentaje / 100)).toFixed(2);
}

function updateUtilidadproc() {
    utp.value = ((parseFloat(ut.value) / parseFloat(bs.value)) * 100).toFixed(2);
}

function updatePublicValue() {
    public.value = (parseFloat(bs.value) + parseFloat(ut.value) + (parseFloat(bs.value) * impuestoPorcentaje / 100)).toFixed(2);
}

function ObtenerValorImpuesto(id) {
    if (!id) {
        // Si el ID está vacío, establecer impuestoPorcentaje a 0 y actualizar los valores
        impuestoPorcentaje = 0;
        updatePublicValue();
        updateUtilidad();
        updateUtilidadproc();
        return;
    }

    fetch("{{ route('impuestos.show','/') }}" + "/" + id, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': CSRF,
        },
    })
    .then(response => response.json())
    .then(data => {
        impuestoPorcentaje = parseFloat(data.Valor) || 0; // Si el valor es vacío o inválido, usar 0
        updatePublicValue(); // Actualizar el valor público con el nuevo porcentaje de impuesto
        updateUtilidad();
        updateUtilidadproc();
    })
    .catch(error => {
        console.error('Error:', error);
        impuestoPorcentaje = 0; // En caso de error, usar 0
        updatePublicValue();
        updateUtilidad();
        updateUtilidadproc();
    });
}




        document.getElementById('ActulizarPrecio').addEventListener('click', function (event) {
        var forms= document.getElementById('proveedorForm');
        event.preventDefault();
        
        const formData = new FormData(forms);
        const data = {};
        
        formData.forEach((value, key) => {
            data[key] = value;
        });

        fetch('{{ route("actualizarprecios.store") }}', {
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
            // Manejar la respuesta exitosa
            alert ('Datos Ingresado' );
            location.reload()
        })
        .catch(error => {
            // Manejar el error
            console.error('Error:', error);
        });
    }); 
       
   
</script>
@endif