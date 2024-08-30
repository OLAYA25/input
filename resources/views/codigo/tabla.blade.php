<div class="container mt-4">
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Estado</th>
                <th>Código</th>
                <th>Subcódigo</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($codigos as $codigo)
                
                    <!-- Fila principal de la categoría -->
                    <tr class="main-category" data-codigo="{{ $codigo->Codigo }}">
                        <td>{{ $codigo->id }}</td>
                        <td>
                            <span class="badge {{ $codigo->estado == 'activo' ? 'badge-success' : 'badge-secondary' }}">
                                {{ ucfirst($codigo->estado) }}
                            </span>
                        </td>
                        <td>{{ $codigo->Codigo }}</td>
                        <td>-</td>
                        <td>{{ $codigo->Descipcion }}</td>
                        <td>
                            <form action="{{ route('codigos.destroy', $codigo->id) }}" method="POST">
                                <a class="btn btn-sm btn-primary" href="{{ route('codigos.show', $codigo->id) }}">
                                    <i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}
                                </a>
                                <a class="btn btn-sm btn-success" href="{{ route('codigos.edit', $codigo->id) }}">
                                    <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
                                </button>
                            </form>
                        </td>
                    </tr>
                
               
            @endforeach
        </tbody>
    </table>
</div>

<script>
// Define la URL de la API en tu Blade y pásala al script
const baseUrl = "{{ route('codigos.mostarcodigos', '/') }}";

// Función para manejar el clic y desplegar subniveles
function handleRowClick(row) {
    row.addEventListener('click', async function (event) {
        event.stopPropagation(); // Evita que el evento se propague a filas superiores

        const codigo = this.getAttribute('data-codigo'); // Obtener el código del elemento actual

        // Verificar si ya se han cargado los subcódigos para esta fila
        const subcodigosRow = this.nextElementSibling;
        if (subcodigosRow && subcodigosRow.classList.contains('subcodigos-row')) {
            // Si ya está abierto, eliminarlo para cerrarlo
            subcodigosRow.remove();
            return;
        }

        try {
            // Construir la URL completa agregando el código a la base URL
            const url = `${baseUrl}/${codigo}`;
            
            // Realiza la petición a la API
            const response = await fetch(url, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                }
            });

            if (!response.ok) {
                throw new Error(`Error: ${response.statusText}`);
            }

            const data = await response.json(); // Procesar la respuesta JSON

            // Crear una fila nueva para mostrar los subcódigos debajo de la categoría seleccionada
            const newRow = document.createElement('tr');
            newRow.classList.add('subcodigos-row');
            newRow.innerHTML = `
                <td colspan="6">
                    <ul class="subcodigo-list">
                        ${data.map(subcodigo => `
                            <li class="subcodigo-item" data-codigo="${subcodigo.Codigo}">
                                ${subcodigo.Descipcion} (${subcodigo.Codigo})
                            </li>`).join('')}
                    </ul>
                    <button class="btn btn-sm btn-primary crear-nuevo-codigo">Crear Nuevo Código</button>
                    <div class="formulario-nuevo-codigo" style="display: none;">
                        <form id="form-nuevo-codigo">
                            <input type="text" class="form-control" name="Codigo" value="${codigo}" placeholder="Nuevo Código" required>
                            <input type="text" class="form-control" name="Subcodigo" value="${codigo}" style="display:none" placeholder="Subcodigo" required>
                             <input type="text" class="form-control" name="estado"  value="Activo" style="display:none" placeholder="Descripción" required>
                           
                            <input type="text" class="form-control" name="Descipcion" placeholder="Descripción" required>
                            <button type="submit" class="btn btn-sm btn-success">Guardar</button>
                        </form>
                    </div>
                </td>
            `;
            // Insertar la nueva fila justo después de la fila actual
            this.parentNode.insertBefore(newRow, this.nextSibling);

            // Añadir evento de clic a los nuevos subcódigos para continuar expandiendo
            newRow.querySelectorAll('.subcodigo-item').forEach((item) => {
                handleRowClick(item); // Aplicar la misma lógica a los subcódigos
            });

            // Manejar el clic en el botón "Crear Nuevo Código"
            const crearNuevoBtn = newRow.querySelector('.crear-nuevo-codigo');
            const formularioNuevo = newRow.querySelector('.formulario-nuevo-codigo');
            crearNuevoBtn.addEventListener('click', () => {
                formularioNuevo.style.display = formularioNuevo.style.display === 'none' ? 'block' : 'none';
            });

            // Manejar el envío del formulario de nuevo código
            const formNuevoCodigo = newRow.querySelector('#form-nuevo-codigo');
            formNuevoCodigo.addEventListener('submit', async (e) => {
                e.preventDefault();
                const formData = new FormData(formNuevoCodigo);
                try {
                    const response = await fetch("{{ route('codigos.store') }}", {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });
                    if (response.ok) {
                        alert('Nuevo código creado con éxito');
                        formularioNuevo.style.display = 'none';
                        // Aquí puedes agregar lógica para actualizar la lista de subcódigos
                    } else {
                        throw new Error('Error al crear el nuevo código');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert('Hubo un error al crear el nuevo código');
                }
            });

        } catch (error) {
            console.error('Error al consumir la API:', error);
            alert('Hubo un error al consumir la API.');
        }
    });
}

// Escuchar eventos de clic en las filas principales
document.querySelectorAll('.main-category').forEach((row) => {
    handleRowClick(row); // Aplicar la función de clic a las categorías principales
});





</script>