@php
    $PAGE_NUM = $PAGE_NUM ?? 1;
    $PAGE_COUNT = $PAGE_COUNT ?? 1;
@endphp
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <style>
        @if ($size === 'carta'||$size === 'ofici' )
            @import url('{{ asset('../resources/css/reportecarta.css') }}');
        @elseif ($size === 'tirilla')
            @import url('{{ asset('../resources/css/tirilla.css') }}');
        @endif

    </style>
</head>
<body>
    
    <div style="text-align: right; font-size: 10px; margin-bottom: 10px;">
        Página {{ $PAGE_NUM }} de {{ $PAGE_COUNT }}
    </div>
    <div class="row">
        <div class="col-sm-4 logo" >
            <img src="{{ asset('../storage/app/public/logos/' . basename($movimiento->caja->empresas->Logo ?? '')) }}" alt="Logo" style="max-width: 100px; max-height: 100px;">
        </div>
        <div class="col-sm-4">
            <div class="company-info">
                <div class="company-name">{{$movimiento->caja->empresas->nombre ?? null}}</div>
                <div class="company-details">
                    NIT: {{$movimiento->caja->empresas->nit ?? null}}<br>
                    Dirección: {{$movimiento->caja->empresas->Direccion ?? null}}<br>
                    TEL: {{$movimiento->caja->empresas->Telefono ?? null}}<br> 
                    Email: {{$movimiento->caja->empresas->Email ?? null}}<br> 
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <!-- Aquí va el código QR -->
            <div class="company-name"">
            <div class="additional-info" style="text-align: center;">
                @php
                    $url = request()->url();
                    try {
                        $qrcode = DNS2D::getBarcodeHTML($url, 'QRCODE', 2, 2);
                    } catch (\Exception $e) {
                        $qrcode = 'Error al generar el código QR: ' . $e->getMessage();
                    }
                @endphp
                <div style="text-align: center;">
                    <div style="display: inline-block; width: 80px; height: 80px; ">
                        {!! $qrcode !!}
                    </div>
                 </div>
                 {{$movimiento->movimientosbasico->Descripcion . " " .$movimiento->movimientosbasico->Codigo  ."0000". $movimiento->id ?? NULL}}
            </div>

        
            </div>
        </div>
        
    </div>
    
   
    <div class="additional-info">
        
            {{--  'AUTORIZADO DEL ' 
            . ($movimiento->movimientosbasico->resolucion->Codigo ?? '') . ' ' 
            . ($movimiento->movimientosbasico->resolucion->Inicio ?? '') . ' AL ' 
            . ($movimiento->movimientosbasico->resolucion->Codigo ?? '') . ' ' 
            . ($movimiento->movimientosbasico->resolucion->Inicio ?? '')  
            -- }}<br>
        {{--  'AUTORIZADO DEL AL VIGENCIA: DE  ' 
            . ($movimiento->movimientosbasico->resolucion->FechaInicio ?? '') . ' ' 
            . ' A: ' 
            . ($movimiento->movimientosbasico->resolucion->FechaFinal ?? '') . ' ' 
            -- }}<br>

        {{-- NO SOMOS GRANDES CONTRIBUYENTES - NO SOMOS AUTORETENEDORES - SERVICIO EXCLUIDO DE IVA<br>
        ESTAMOS EXENTOS DE RETEFUENTE SEGÚN ARTÍCULO 23 ET - SOMOS AGENTE RETENEDOR DE IMPUESTO DE RENTA --}}
    </div>
    <table class="customer-info">
        
        <tr class ="customer-info-label" >
            
            <td>   <span class="customer-info-label">Cliente:</span>
            @if($movimiento->usuariobasico)
            {{ ($movimiento->usuariobasico->Apellido1 ?? '') . ' ' . 
               ($movimiento->usuariobasico->Apeelido2 ?? '') . ' ' . 
               ($movimiento->usuariobasico->Nombre1 ?? '') . ' ' . 
               ($movimiento->usuariobasico->Nombre2 ?? '') }}
            @else
            N/A
        @endif
            </td>

            <td > <strong>NIT:</strong> {{$movimiento->usuariobasico->NDocumento  ?? ' '}}   </td>
        </tr>
        <tr >
            <td><span class="customer-info-label">Dirección:</span>
            <span>{{$movimiento->usuariobasico->Direccion ?? null}}</span></td>
            <td><span class="customer-info-label">Tipo de Operación:</span>
            <span> {{$movimiento->movimientosbasico->Descripcion ?? " " }}</span> </td>
        </tr>
        <tr >
            <td><span class="customer-info-label">Teléfono:</span>
            <span>{{$movimiento->usuariobasico->Telefono?? " " }}</span></td>
            <td ><span class="customer-info-label">Fecha de Facturación:</span>
            <span>{{$movimiento->updated_at ?? " " }}</span></td>
        </tr>
        <tr >
            <td><span class="customer-info-label">Forma de pago: {{$movimiento->metodoPago." " ?? null}}</span>
            </td>
            <td ><span class="customer-info-label">Fecha de Vencimiento:</span>
            <span>{{$movimiento->updated_at ?? " " }}</span></td>
        </tr>
        <tr >
            <td><span class="customer-info-label">Medio de pago:</span>
            <span>{{$movimiento->medioPago." " ?? null}}</span></td>
            <td ></td>
        </tr>
    </table>


    <table class="products-table">
    @if ($size === 'carta')
        <tr>
            <th>Ítem</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Total</th>
        </tr>
        @foreach($movimiento->movimientosdatallados as $productos)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$productos->productos->Descripcion.' '  }}  {{$productos->Obervacion}}</td>
            <td>{{$productos->Valor_Unitario  }}</td>
            <td>{{$productos->Cantidad_Ingreso  }}</td>
            <td>{{$productos->TotalValor  }}</td>
        </tr>
        @endforeach
        @endif
        @if ($size === 'tirilla')
        <tr>
            <th>id</th>
            <th>Descripción</th>
           
            <th>Can</th>
            <th>Total</th>
        </tr>
        @foreach($movimiento->movimientosdatallados as $productos)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$productos->productos->Descripcion.' '  }}  {{$productos->Obervacion}}</td>
            
            <td>{{$productos->Cantidad_Ingreso  }}</td>
            <td>{{$productos->TotalValor  }}</td>
        </tr>
        @endforeach
        @endif
    </table>
    <div class="company-name" style="font-weight: bold; text-align: center; margin-top: 20px; margin-bottom: 20px;">
    <storage> DETALLE IMPUESTOS</storage> 
    </div>
    <table class="total-section">
    <tr>
        <th>TIPO</th>
        <th>BASE/IMP</th>
        <th>IMP</th>
        <th>COMPRA</th>
    </tr>
    <tr class="total-row">
    <td></td> 
        <td class="amount">$ {{number_format($movimiento->ValorSinImpuesto, 2, '.', ',')}}</td>
        <td class="amount">$ {{number_format($movimiento->ValorImpuesto, 2, '.', ',')}}</td>
        <td class="amount">$ {{number_format($movimiento->Total, 2, '.', ',')}}</td>
    </tr>
    <tr class="total-row total">
        <td>TOTAL</td>
        <td class="amount">$ {{number_format($movimiento->ValorSinImpuesto, 2, '.', ',')}}</td>
        <td class="amount">$ {{number_format($movimiento->ValorImpuesto, 2, '.', ',')}}</td>
        <td class="amount">$ {{number_format($movimiento->Total, 2, '.', ',')}}</td>
    </tr>
    <tr class="total-a-pagar">
        <td colspan="3"><strong>TOTAL A PAGAR:</strong></td>
        <td class="amount">$ {{number_format($movimiento->Total, 2, '.', ',')}}</td>
    </tr>
</table>

    
</div>

    <div class="terms " >
        <h3>{{$movimiento->movimientosbasico->TituloPiePagina ?? NULL}}</h3>
        <ul style="font-size: 10px; padding-left: 20px;">
        {{$movimiento->movimientosbasico->PiePagina ?? NULL}}</ul>
    </div>
</body>
@if ($size === 'tirilla')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
            // Ajustar el ancho de las columnas
            var table = document.querySelector('.products-table');
            table.style.tableLayout = 'fixed';
            
            var cols = table.querySelectorAll('th, td');
            cols.forEach(function(col, index) {
                if (index % 4 === 0) col.style.width = '10%'; // Ítem
                if (index % 4 === 1) col.style.width = '15%'; // Cantidad
                if (index % 4 === 2) col.style.width = '55%'; // Descripción
                if (index % 4 === 3) col.style.width = '20%'; // Total
            });

            window.print();
    </script>
@endif

</html>
