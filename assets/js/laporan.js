$(document).ready( function () {
    // datatable
    $('#tabel-laporan').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
} );