@php
use App\Models\Impuesto;
use App\Models\Actualizarprecio;
use App\Models\Proveedore;
use App\Models\ImpuestosProducto;
$impuestos = Impuesto::where('estado', 'Activo')->pluck('Descripcion', 'id');
$impuestos  = Impuesto::where('estado', 'Activo')->get();
$proveedores =Proveedore::where('estado', 'Activo')->get();
$actualizarprecios= Actualizarprecio::where('Producto_id',$producto->id)->get();
// Este código busca el precio actual del producto
// Obtiene el primer registro de Actualizarprecio donde:
// - El Producto_id coincide con el id del producto actual
// - El campo Principal es igual a '1' (indicando que es el precio principal)
// El resultado se guarda en la variable $precioActual
$precioActual = Actualizarprecio::where('Producto_id', $producto->id)->where('Principal', '1')->first();
$valortotal;
$impuestosProductos = ImpuestosProducto::where('productos_id',$producto->id)->get();
@endphp

<!-- Precios Tab -->
@if (Route::is('productos.edit'))      
<div class="row">
      
        <div class="row">
            <div class="col-12">
                <h4 class="text-center">Parametrizar Precio de Compra</h4>
                <hr>
            </div>
        </div>
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
                @php
                $valortotal = 0;
                foreach($impuestosProductos as $impuestosProducto) {
                    $valortotal += $impuestosProducto->impuesto->Valor;
                }
                @endphp
                <div class="form-group col-sm-12">
                    <label for="Proveedor_id">Impuestos %</label>
                    <div class="input-group mar-btn ">
                        <input  class="form-control" value ="{{$valortotal }}" placeholder="Impuestos"
                            name="ImpuestoPorcentageTotal" type="text" id="PorcentajeValor">
                            
                        <span class="input-group-btn">
                            <a href="#" data-toggle="modal" id="Buscar"
                                data-target=".bd-impuestos-modal-lg" class="btn btn-success">Buscar </a>
                        </span>
                    </div>
                </div>
                <div class="form-group col-sm-3" style="display: none">
                    <label for="Principal">Principal</label>
                    <input class="form-control" placeholder="Principal" name="Principal"
                        type="checkbox" id="Principal">
                </div>
                <div class="form-group col-sm-2">
                    <label for="ValorBase">Costo Base</label>
                    <input class="form-control" onchange="base(event)" value ="{{$precioActual->ValorBase ?? NULL}}" placeholder="Base"
                        name="ValorBase" type="number" id="ValorBase">
                </div>
                <div class="form-group col-sm-2">
                    <label for="ValorBase">Valor Impuesto</label>
                    <input class="form-control" onchange="ImpuestoValor(event)" value="{{ $precioActual->Impuesto_id ??Null }}" placeholder="Base"
                        name="Impuesto_id" type="number" id="ImpuestoValor">
                </div>
                
                <div class="form-group col-sm-2">
                    <label for="ValorPublico">Subtotal </label>
                    <input class="form-control" onchange="publico(event)" placeholder="Publico"  value ="{{$precioActual->ValorPublico ?? NULL}}" 
                        name="ValorPublico" type="number" id="ValorPublico">
                </div>

                <div class="form-group col-sm-2">
                    <label for="ValorBase">Subtotal+Impuesto</label>
                    <input class="form-control" onchange="ImpuestoPublico(event)" value="{{$precioActual->ImpuestoPublico ??Null}}" placeholder="Base"
                        name="ImpuestoPublico" type="number" id="ValorPublicoConImpuestos">
                </div>

                <div class="form-group col-sm-2">
                    <label for="ValorPublico">Utilidad</label>
                    <input class="form-control" onchange="utilidad(event)" placeholder="Utilidad" value ="{{$precioActual->UtilidadPorc ?? NULL}}" 
                        name="Utilidad" type="text" id="Utilidad">
                </div>
                <div class="form-group col-sm-2">
                    <label for="ValorPublico">Utilidad %</label>
                    <input class="form-control" onchange="utilidadpro(event)" placeholder="Utilidad"  value ="{{$precioActual->UtilidadPorc ?? NULL}}"
                        name="UtilidadPorc" type="text" id="Utilidadproc">
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
<div class="panel-body">
    @include('impuestos-producto.table')
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

<div class="modal fade bd-impuestos-modal-lg " id="modalImpuestos" tabindex="-1">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Impuesto</h5>
            </div>
            <div class="modal-body">
            @include("impuesto.table")
            </div>
        </div>
    </div>
</div>
<!-- More pricing fields as needed -->
</div>
<script>
var bs = document.getElementById("ValorBase");
var valorPublico = document.getElementById("ValorPublico");
var ut = document.getElementById("Utilidad");
var utp = document.getElementById("Utilidadproc");
var Impuestos = document.getElementById("ImpuestoValor");
var impuestoPorcentaje = document.getElementById("PorcentajeValor");
var valorPublicoConImpuestos = document.getElementById("ValorPublicoConImpuestos");

bs.addEventListener('input', base);
valorPublico.addEventListener('input', publico);
ut.addEventListener('input', utilidad);
utp.addEventListener('input', utilidadpro);
Impuestos.addEventListener('input', ImpuestoValor);
impuestoPorcentaje.addEventListener('input', base);
valorPublicoConImpuestos.addEventListener('input', ImpuestoConValor);

function base(event) {
    const total = parseFloat(ValorPublicoConImpuestos.value) || 0;
    const porcentajeImpuesto = parseFloat(impuestoPorcentaje.value) || 0;
    const valorPorcentajeDivido =  (1+(porcentajeImpuesto)/100);
    const subtotal = (total  / valorPorcentajeDivido).toFixed(2);
    const valorImpuesto = total-subtotal ;
    valorPublico.value  =subtotal;
    Impuestos.value=valorImpuesto.toFixed(2);

    
    
    actualizarUtilidad();
}

function ImpuestoValor(event) {
    const valorImpuesto = parseFloat(event.target.value) || 0;
    const valorPublicoActual = parseFloat(valorPublico.value) || 0;
    const total = valorPublicoActual + valorImpuesto;
    valorPublicoConImpuestos.value = total.toFixed(2);
}

function publico(event) {
    const valorPublicoActual = parseFloat(event.target.value) || 0;
    const valorImpuesto = parseFloat(Impuestos.value) || 0;
    const total = valorPublicoActual + valorImpuesto;
    valorPublicoConImpuestos.value = total.toFixed(2);
    
    actualizarUtilidad();
}

function ImpuestoConValor(event) {
    const total = parseFloat(event.target.value) || 0;
    const porcentajeImpuesto = parseFloat(impuestoPorcentaje.value) || 0;
    const porcimpuestos = (1+(porcentajeImpuesto)/100);
    const subtotal =((total / porcimpuestos )).toFixed(2);
    valorPublico.value  = subtotal
    
    const impuesto = total - subtotal;
    Impuestos.value = impuesto.toFixed(2);
    
    actualizarUtilidad();
}

function utilidad(event) {
    const utilidadValor = parseFloat(event.target.value) || 0;
    const valorBase = parseFloat(bs.value) || 0;
    const valorPublicoNuevo = valorBase + utilidadValor;
    valorPublico.value = valorPublicoNuevo.toFixed(2);
    
    const valorImpuesto = parseFloat(Impuestos.value) || 0;
    const total = valorPublicoNuevo + valorImpuesto;
    valorPublicoConImpuestos.value = total.toFixed(2);
    
    actualizarUtilidadPorcentaje();
}

function utilidadpro(event) {
    const utilidadPorc = parseFloat(event.target.value) || 0;
    const valorBase = parseFloat(bs.value) || 0;
    const utilidadValor = (valorBase * utilidadPorc) / 100;
    ut.value = utilidadValor.toFixed(2);
    
    const valorPublicoNuevo = valorBase + utilidadValor;
    valorPublico.value = valorPublicoNuevo.toFixed(2);
    
    const valorImpuesto = parseFloat(Impuestos.value) || 0;
    const total = valorPublicoNuevo + valorImpuesto;
    valorPublicoConImpuestos.value = total.toFixed(2);
}

function actualizarUtilidad() {
    const valorBase = parseFloat(bs.value) || 0;
    const valorPublicoActual = parseFloat(valorPublico.value) || 0;
    const utilidadValor = valorPublicoActual - valorBase;
    ut.value = utilidadValor.toFixed(2);
    actualizarUtilidadPorcentaje();
}

function actualizarUtilidadPorcentaje() {
    const valorBase = parseFloat(bs.value) || 0;
    const utilidadValor = parseFloat(ut.value) || 0;
    const utilidadPorcentaje = (utilidadValor / valorBase) * 100;
    utp.value = utilidadPorcentaje.toFixed(2);
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