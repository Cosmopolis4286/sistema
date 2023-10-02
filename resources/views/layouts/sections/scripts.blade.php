<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>

<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            responsive: true,
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },dom: 'Bfrtip',
             buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        });
    });
    const Toast = Swal.mixin({
        toast: true,
        position: 'center',
        showConfirmButton: false,
        timer: 1850,
        timerProgressBar: false,
    })
    if ($("#msg").val() == 1) {
        Toast.fire({
            icon: 'success',
            title: 'Operacion Efectuada Con Exito',
        })

    } else if ($("#msg").val() == 2) {
        Toast.fire({
            icon: 'error',
            title: 'Lo Sentimo La Informacion esta Duplicada , Intente Nuevamente',
        })
    }
    
    $('.input-number').on('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>
@yield('scripts')
