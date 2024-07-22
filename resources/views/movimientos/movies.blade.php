<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz de Ventas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('../resources/css/movimientos.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container mt-1">
        
        <div class="card mb-1">
            <div class="card-header">
                Información del Usuario
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="userId">ID Usuario</label>
                        <input type="text" class="form-control" id="userId" name="userId">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="userName">Nombre Usuario</label>
                        <input type="text" class="form-control" id="userName" name="userName">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="facturaNumber">Nº FACTURA</label>
                        <input type="text" class="form-control" id="facturaNumber" name="facturaNumber">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cajaNumber">Nº CAJA</label>
                        <input type="text" class="form-control" id="cajaNumber" name="cajaNumber">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card mb-1">
            <div class="card-header">
                Información del Producto
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="codigo">Código</label>
                        <input type="text" class="form-control" id="codigo" name="codigo">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="valor">Valor</label>
                        <input type="number" class="form-control" id="valor" name="valor">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="impuesto">Impuesto</label>
                        <input type="number" class="form-control" id="impuesto" name="impuesto">
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table id="salesTable" class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Valor</th>
                        <th>Impuesto</th>
                        <th>Total</th>
                        <th class="d-none d-sm-table-cell">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-end">
            <h5>Total: <span id="grandTotal">0</span></h5>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{asset('../resources/js/movimientos.js')}}"></script>
</body>
</html>