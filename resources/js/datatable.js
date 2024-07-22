datatable(document).ready(function () {
    // Inicializar DataTable para tuTabla
    var table = datatable('#demo-dt-basic').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5'
        ]
    });



    // Configuraciones de DataTables con botones para '#demo-dt'
    datatable('#demo-dt').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5'
        ]
    });

    // Marcar o desmarcar todos los checkboxes, incluyendo los de todas las páginas
    function seleccionarTodo() {
        var seleccionado = document.getElementById('todo').checked;
        var checkboxes = datatable('#demo-dt-basic').DataTable().rows().nodes().to$().find('input[type="checkbox"]');
        checkboxes.prop('checked', seleccionado);
    }
    document.getElementById('todo').addEventListener('click', function () {
        seleccionarTodo();
    });


    // Obtener todos los checkboxes seleccionados, incluyendo los de todas las páginas
    document.getElementById('obtenerValores').addEventListener('click', function () {
        table.clear().draw();
    });

});