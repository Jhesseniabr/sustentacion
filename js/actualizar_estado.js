function confirmarActualizacion(numero_registro, estado_actual) {
    let nuevo_estado;
    switch (estado_actual) {
        case 'Pendiente':
            nuevo_estado = 'Proceso';
            break;
        case 'Proceso':
            nuevo_estado = 'Finalizado';
            break;
        case 'Finalizado':
            nuevo_estado = 'Entregado';
            break;
        case 'Entregado':
            alert('El estado ya está en "Entregado" y no se puede actualizar más.');
            return;
        default:
            alert('Estado desconocido.');
            return;
    }

    // Mostrar mensaje personalizado con SweetAlert2
    Swal.fire({
        title: 'Confirmación',
        text: `¿Está seguro de que desea cambiar el estado a "${nuevo_estado}"?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, cambiar estado',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Hacer la solicitud AJAX
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `../logica/actualizar_estado.php?numero_registro=${numero_registro}&nuevo_estado=${nuevo_estado}`, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    Swal.fire(
                        '¡Estado actualizado!',
                        xhr.responseText,
                        'success'
                    );
                    // Opcional: recargar la página para ver el cambio reflejado
                    location.reload();
                }
            };
            xhr.send();
        }
    });
}