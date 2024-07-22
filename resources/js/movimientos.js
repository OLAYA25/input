let idCounter = 1;

document.addEventListener('keydown', function (event) {
    if (event.key === 'Enter') {
        addRow();
    } else if (event.key === 'Delete') {
        const productId = prompt('Ingrese el ID del producto a eliminar:');
        deleteRowById(productId);
    } else if (event.ctrlKey && event.key === 'f') {
        event.preventDefault();
        printInvoice('tirilla');
    } else if (event.ctrlKey && event.key === 'c') {
        event.preventDefault();
        printInvoice('carta');
    }
});

function addRow() {
    const codigo = document.getElementById('codigo').value || '';
    const descripcion = document.getElementById('descripcion').value || '';
    const cantidad = document.getElementById('cantidad').value || 0;
    const valor = document.getElementById('valor').value || 0;
    const impuesto = document.getElementById('impuesto').value || 0;

    const total = (Number(cantidad) * Number(valor)) + Number(impuesto);

    const table = document.getElementById('salesTable').getElementsByTagName('tbody')[0];
    const newRow = table.insertRow();

    newRow.innerHTML = `
        <td>${idCounter}</td>
        <td ondblclick="editCell(this)">${codigo}</td>
        <td ondblclick="editCell(this)">${descripcion}</td>
        <td ondblclick="editCell(this)">${cantidad}</td>
        <td ondblclick="editCell(this)">${valor}</td>
        <td ondblclick="editCell(this)">${impuesto}</td>
        <td ondblclick="editCell(this)">${total.toFixed(2)}</td>
        <td class="d-sm-none"><button class="btn btn-danger" onclick="deleteRowById(${idCounter})">Eliminar</button></td>
    `;

    updateTotal(total);
    idCounter++;
    clearInputs();
}

function deleteRowById(productId) {
    const table = document.getElementById('salesTable').getElementsByTagName('tbody')[0];
    for (let i = 0; i < table.rows.length; i++) {
        const row = table.rows[i];
        if (row.cells[0].innerText === productId.toString()) {
            const total = Number(row.cells[6].innerText);
            row.remove();
            updateTotal(-total);
            break;
        }
    }
}

function updateTotal(amount) {
    const grandTotal = document.getElementById('grandTotal');
    grandTotal.innerText = (Number(grandTotal.innerText) + amount).toFixed(2);
}

function clearInputs() {
    document.getElementById('codigo').value = '';
    document.getElementById('descripcion').value = '';
    document.getElementById('cantidad').value = '';
    document.getElementById('valor').value = '';
    document.getElementById('impuesto').value = '';
}

function editCell(cell) {
    const originalValue = cell.innerText;
    cell.innerHTML = `<input type='text' value='${originalValue}' />`;
    const input = cell.firstElementChild;
    input.focus();

    input.addEventListener('blur', () => {
        cell.innerText = input.value;
        updateRowTotals(cell.parentElement);
    });

    input.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            cell.innerText = input.value;
            updateRowTotals(cell.parentElement);
        }
    });
}

function updateRowTotals(row) {
    const cantidad = Number(row.cells[3].innerText);
    const valor = Number(row.cells[4].innerText);
    const impuesto = Number(row.cells[5].innerText);
    const total = (cantidad * valor) + impuesto;
    const previousTotal = Number(row.cells[6].innerText);

    row.cells[6].innerText = total.toFixed(2);

    updateTotal(total - previousTotal);
}

function printInvoice(type) {
    const table = document.getElementById('salesTable').getElementsByTagName('tbody')[0];
    let invoiceContent = `
        <h1>Factura</h1>
        <p>ID Usuario: ${document.getElementById('userId').value}</p>
        <p>Nombre Usuario: ${document.getElementById('userName').value}</p>
        <p>Nº FACTURA: ${document.getElementById('facturaNumber').value}</p>
        <p>Nº CAJA: ${document.getElementById('cajaNumber').value}</p>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Valor</th>
                    <th>Impuesto</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
    `;

    for (let i = 0; i < table.rows.length; i++) {
        const row = table.rows[i];
        invoiceContent += `
            <tr>
                <td>${row.cells[0].innerText}</td>
                <td>${row.cells[1].innerText}</td>
                <td>${row.cells[2].innerText}</td>
                <td>${row.cells[3].innerText}</td>
                <td>${row.cells[4].innerText}</td>
                <td>${row.cells[5].innerText}</td>
                <td>${row.cells[6].innerText}</td>
            </tr>
        `;
    }

    invoiceContent += `
            </tbody>
        </table>
        <h3>Total: ${document.getElementById('grandTotal').innerText}</h3>
    `;

    const printWindow = window.open('', '_blank', 'width=800,height=600');
    printWindow.document.open();
    printWindow.document.write(`
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Factura</title>
            <style>
                body { font-family: Arial, sans-serif; }
                table { width: 100%; border-collapse: collapse; }
                th, td { border: 1px solid black; padding: 8px; text-align: center; }
                h1 { text-align: center; }
                ${type === 'tirilla' ? 'table { font-size: 0.8em; }' : ''}
            </style>
        </head>
        <body>
            ${invoiceContent}
        </body>
        </html>
    `);
    printWindow.document.close();
    printWindow.print();
}
