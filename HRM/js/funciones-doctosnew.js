    
$(document).ready(function(){
    
});
function subir()
    {

        var Form = new FormData($('#filesForm')[0]);
        $.ajax({

            url: "files.php",
            type: "post",
            data : Form,
            processData: false,
            contentType: false,
            success: function(data)
            {
                if(data==1){
                    $('#contenedor_documentosnuevos').load('documentos/tabla.php'); 
                   // alertify.success("agregado con exito!");
			 Swal.fire({
				title: 'Agregado Exitosamente!',
				icon: 'success',
				timer: 3000,
				timerProgressBar: true,
				showCancelButton: false,
				showConfirmButton: false
			});
                 }else{
                     //alert('fallo');
                  //alertify.error("Fallo en el servidor...");
		   console.log(r);
           Swal.fire({
               title: 'Error en el proceso!\n\n\n'+r,
               icon: 'error',
               confirmButtonText: 'Continuar'
           });
                  }
            }
        });
    }

    function subirIMG()
    {

        var Form = new FormData($('#filesFormIMG')[0]);
        $.ajax({

            url: "filesIMG.php",
            type: "post",
            data : Form,
            processData: false,
            contentType: false,
            success: function(data)
            {
                if(data==1){
                    $('#contenedor_imagen').load('imagen/tabla.php'); alertify.success("agregado con exito!");
                    // alertify.success("agregado con exito!");
			 Swal.fire({
				title: 'Agregado Exitosamente!',
				icon: 'success',
				timer: 3000,
				timerProgressBar: true,
				showCancelButton: false,
				showConfirmButton: false
			});
                 }else{
                   //alertify.error("Fallo en el servidor...");
		   console.log(r);
           Swal.fire({
               title: 'Error en el proceso!\n\n\n'+r,
               icon: 'error',
               confirmButtonText: 'Continuar'
           });
        }
            }
        });
    }

    

function preguntarDoctoNew(data){
    alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este documento?', 
    function(){ eliminarDatosDoctoNew(data) },
    function(){ alertify.error('Se cancelo')});
   }
    
   function eliminarDatosDoctoNew(data){
    d = data.split('||');
       cadena = "id="+d[0]+
                "&path=" + d[1];
      $.ajax({
        type:"post",
        url:"../contenido/documentos/delete.php",
        data: cadena,
        success:function(r){
         if(r==1){
            $('#contenedor_documentosnuevos').load('documentos/tabla.php'); 
             $('#contenedor_imagen').load('imagen/tabla.php'); alertify.success("agregado con exito!");
             //alertify.success("Eliminado con exito!");
				Swal.fire({
                    title: 'Eliminado Exitosamente!',
                    icon: 'success',
                    timer: 3000,
                    timerProgressBar: true,
                    showCancelButton: false,
                    showConfirmButton: false
                });
            }else{
               //alertify.error("Error en el servidor...")
				console.log(r);
                Swal.fire({
                    title: 'Error en el proceso!\n\n\n'+r,
                    icon: 'error',
                    confirmButtonText: 'Continuar'
                });
            }
        }

    });
   }