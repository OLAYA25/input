let tabla;
$(document).ready(function () {
    
   


    // Configuraciones de DataTables con botones para '#demo-dt'
    $('#demo-dt').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5'
        ]
    });

   
});