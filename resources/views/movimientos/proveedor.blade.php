<!-- Modal -->
<div class="modal fade " id="ProveedorModal" tabindex="-1" role="dialog" aria-labelledby="ProveedorModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ProveedorModalLabel">Usuarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('proveedore.form')
            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('keydown', function (event) {
        if (event.ctrlKey && event.key === 'o') {
            event.preventDefault();
            $('#ProveedorModal').modal('show');
        }
       
    });
</script>