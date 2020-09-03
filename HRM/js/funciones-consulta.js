$(document).ready(function(){
    
    $('#consultas').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'pdfHtml5'
        ],
      "info": true,
      "searching": false,
      "pagingType": "full",
      "lengthMenu": [ 25, 50 ],
        "language":{
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrada de _MAX_ registros)",
                "loadingRecords": "Cargando...",
                "processing":     "Procesando...",
                "search": "Buscar:",
                "zeroRecords":    "No se encontraron registros coincidentes",
                "paginate": {
                    "next":       "Siguiente",
                    "previous":   "Anterior",
                     "first": "Inicio",
                     "last":"Fin"
                },					
        }
    });

	$('#formFechas').submit(function(evt){
        evt.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        
        $.ajax({
            type:"POST",
            url:"../contenido/consulta/search.php",
            data: form.serialize(),
            success:function(data){
                $('#table_resultado').html('');
                $('#table_resultado').append(data);
            }

            

        });
       
    
    });
});