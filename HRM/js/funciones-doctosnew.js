    
$(document).ready(function(){

    // File type validation
    $("#archivo_doctos").change(function(){
        var allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.openxmlformats-officedocument.presentationml.presentation','image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        var file = this.files[0];
        var fileType = file.type;
        if(!allowedTypes.includes(fileType)){
           // alert('Please select a valid file (PDF/DOC/DOCX/EXCEL/POWERPOINT/JPEG/JPG/PNG/GIF).');
            Swal.fire({
                title: 'Error en el proceso!',
                text: 'Seleccione un formato valido (PDF/DOC/XLXS/PPTX/JPEG/JPG/PNG/GIF).',
                icon: 'warning',
                confirmButtonText: 'Continuar'
            });
            $("#archivo_doctos").val('');
            return false;
        }
    });

});
function subir()
    {

        var Form = new FormData($('#filesForm')[0]);
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);
                        var number = Math.round(percentComplete);
                        $(".progress-bar").width(number + '%');
                        $(".progress-bar").html(number+'%');
                    }
                }, false);
                return xhr;
            },
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
           // $('#Agregar_Doctonew').modal('hide');
            $( '#Agregar_Doctonew').removeClass( "in" );
            $("body").removeClass("modal-open");
            $("#Agregar_Doctonew").css("display", "none");
                 }else{
                     //alert('fallo');
                  //alertify.error("Fallo en el servidor...");
		   console.log(data);
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

   