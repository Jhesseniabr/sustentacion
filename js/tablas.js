$(document).ready(function() {
    var table = $('#example').DataTable({
        autoFill: true,
        paging: true,
        searching: true,
        order: [
            [0, 'desc'] // Ordenar la primera columna (índice 0) de manera descendente
        ],
        columnDefs: [{
            targets: 1, // Segunda columna (índice 1 en base 0) para las fechas
            render: function(data, type, row) {
                if (type === 'display' || type === 'filter') {
                    // La fecha ya está en el formato correcto
                    return data;
                }
                return data; // Devolver la fecha en su formato original para otros tipos
            }
        }],
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });

    // Filtrar por fecha y estado
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var min = $('#min').datepicker("getDate");
            var max = $('#max').datepicker("getDate");
            var startDate = new Date(data[1]); // Convertir la fecha a un objeto de fecha
            var status = $('#status').val().toLowerCase().trim();
            var recordStatus = data[10].toLowerCase().trim(); // Ajusta según la columna de estado

            if ((min === null && max === null) ||
                (min === null && startDate <= max) ||
                (max === null && startDate >= min) ||
                (startDate <= max && startDate >= min)) {
                if (status === "" || recordStatus.toLowerCase() === status.toLowerCase()) {
                    return true;
                }
            }
            return false;
        }
    );

    // Inicializar Datepicker con el formato 'yy-mm-dd'
    $('#min, #max').datepicker({ dateFormat: 'yy-mm-dd' });

    // Evento para actualizar el filtrado por fecha y estado
    $('#min, #max, #status').change(function() {
        table.draw();
    });
});

function openFormRegistrar() {
    document.getElementById("formRegistrar").style.display = "block";
}

function openFormTicket(id) {
    // Aquí puedes agregar lógica para obtener los datos del cliente usando AJAX
    // y llenar los campos del formulario de edición con esos datos.
    // Por ahora, simplemente mostramos el modal.
    document.getElementById("formTicket").style.display = "block";
}

function closeModal() {
    document.getElementById("formRegistrar").style.display = "none";
    document.getElementById("formTicket").style.display = "none";
}

document.getElementById("registrarBtn").addEventListener("click", openFormRegistrar);

// función para el botón actualizar
document.getElementById("updateForm").addEventListener("submit", function(event) {
    // Prevenir el envío del formulario
    event.preventDefault();
    // Redireccionar a la otra vista después de enviar el formulario
    window.location.href = "../vistas/dashboard.php";
});

function mostrarFormulario(id) {
    $('.popup-form1').hide(); // Ocultar todos los formularios con la clase popup-form1
    $('#' + id).fadeIn(); // Mostrar el formulario correspondiente
}

$(document).mouseup(function(e) {
    var container = $(".popup-form1");
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        container.fadeOut();
    }
});