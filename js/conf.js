document.addEventListener('DOMContentLoaded', function() {
    const tableFilter = document.getElementById('table-filter');
    const tables = document.querySelectorAll('.data-table');

    tableFilter.addEventListener('change', function() {
        const selectedTable = tableFilter.value;
        tables.forEach(table => {
            if (table.id === `${selectedTable}-table`) {
                table.classList.add('active');
            } else {
                table.classList.remove('active');
            }
        });
        // Ocultar todas las tablas excepto la tabla seleccionada
        tables.forEach(table => {
            if (table.id === `${selectedTable}-table`) {
                table.style.display = 'table';
            } else {
                table.style.display = 'none';
            }
        });
    });

    // Trigger the change event to display the initial table
    tableFilter.dispatchEvent(new Event('change'));
});