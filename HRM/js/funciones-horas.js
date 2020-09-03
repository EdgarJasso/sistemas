function AgregarHoras(datos){ 
    // alert(datos);
     d = datos.split('||');
 
     nombrewp =" ".concat(d[3]);
     wp = d[2].concat(nombrewp);

     nombre_e =" - ".concat(wp);
     empleado = d[1].concat(nombre_e);

     $('#view_horas_id').html(d[0]);
     $('#view_horas_emp').html(empleado);
     $('#view_horas_fecha').html(d[4]);
     $('#view_horas_horas').html(d[5]);
 }
 
 function agregardatosHoras(id_empleado, fecha, horas){
     cadenaH="ide=" + id_empleado+
            "&fecha=" + fecha+
            "&horas=" + horas;
     //alert(cadena);
     $.ajax({
         type:"post",
         url:"../contenido/horas/add.php",
         data:cadenaH,
         success:function(r){
           if(r==1){
            $('#contenedor_empleados').load('empleados/tabla.php'); 
            $('#contenedor_usuarios').load('usuarios/tabla.php'); 
            $('#contenedor_direccion').load('direccion/tabla.php'); 
            $('#contenedor_area').load('area/tabla.php'); 
            $('#contenedor_categoria').load('categoria/tabla.php'); 
            $('#contenedor_antiguedad').load('antiguedad/tabla.php'); 
            $('#contenedor_objetivos').load('objetivos/tabla.php'); 
            $('#contenedor_asignacion').load('asignacion/tabla.php'); 
            $('#contenedor_vacaciones').load('vacaciones/tabla.php'); 
            $('#contenedor_horas').load('horas/tabla.php');
            $('#contenedor_documentos').load('documentos/tabla.php'); 
            $('#contenedor_imagen').load('imagen/tabla.php'); 
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

 function agregarformHoras(datos){
     d = datos.split('||');
  
     $('#Horas_idhoras_e').val(d[0]);
     $('#Horas_idempleado_e').val(d[1]);
     $('#Horas_fecha_e').val(d[2]);
     $('#Horas_horas_e').val(d[3]);
 }

function actualizaDatosHoras(){
    idh_horas=$('#Horas_idhoras_e').val();
    ide_horas=$('#Horas_idempleado_e').val();
    fecha_horas=$('#Horas_fecha_e').val();
    horas_horas=$('#Horas_horas_e').val();

    cadenaHoras=
    "idh="+ idh_horas +
    "&ide=" + ide_horas +
    "&fecha="+ fecha_horas+
    "&horas="+ horas_horas;
    
    //alert(cadenaVac);

           $.ajax({
            type:"post",
            url:"../contenido/horas/edit.php",
            data:cadenaHoras,
            success:function(r){
             if(r==1){
                $('#contenedor_empleados').load('empleados/tabla.php'); 
                $('#contenedor_usuarios').load('usuarios/tabla.php'); 
                $('#contenedor_direccion').load('direccion/tabla.php'); 
                $('#contenedor_area').load('area/tabla.php'); 
                $('#contenedor_categoria').load('categoria/tabla.php'); 
                $('#contenedor_antiguedad').load('antiguedad/tabla.php'); 
                $('#contenedor_objetivos').load('objetivos/tabla.php'); 
                $('#contenedor_asignacion').load('asignacion/tabla.php'); 
                $('#contenedor_vacaciones').load('vacaciones/tabla.php'); 
                $('#contenedor_horas').load('horas/tabla.php');
                $('#contenedor_documentos').load('documentos/tabla.php'); 
                $('#contenedor_imagen').load('imagen/tabla.php'); 
            //alertify.success("Datos Actualizados!");
				Swal.fire({
                    title: 'Actualizado Exitosamente!',
                    icon: 'success',
                    timer: 3000,
                    timerProgressBar: true,
                    showCancelButton: false,
                    showConfirmButton: false
                });
              }else{
               // alertify.error("fallo en el servidor...");
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

 
 function preguntarHoras(id){
  alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
  function(){ eliminarDatoHoras(id) },
  function(){ alertify.error('Se cancelo')});
 }
 
 function eliminarDatoHoras(id){
     cadena = "id="+id;
     $.ajax({
         type:"post",
         url:"../contenido/horas/delete.php",
         data: cadena,
         success:function(r){
          if(r==1){
             
            $('#contenedor_empleados').load('empleados/tabla.php'); 
            $('#contenedor_usuarios').load('usuarios/tabla.php'); 
            $('#contenedor_direccion').load('direccion/tabla.php'); 
            $('#contenedor_area').load('area/tabla.php'); 
            $('#contenedor_categoria').load('categoria/tabla.php'); 
            $('#contenedor_antiguedad').load('antiguedad/tabla.php'); 
            $('#contenedor_objetivos').load('objetivos/tabla.php'); 
            $('#contenedor_asignacion').load('asignacion/tabla.php'); 
            $('#contenedor_vacaciones').load('vacaciones/tabla.php'); 
            $('#contenedor_horas').load('horas/tabla.php');
            $('#contenedor_documentos').load('documentos/tabla.php'); 
            $('#contenedor_imagen').load('imagen/tabla.php'); 
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
 
$(document).ready(function(){
	$("#guardar_horas").click(validarNuevaHoras);
    $("#Horas_dia").click(validarHorasFecha);

    $("#actualizar_horas").click(validarNuevaHoras_E);
    $("#Horas_fecha_e").click(validarHorasFecha_E);
        	
});

function validarNuevaHoras(){
	var fn_vac = validarHorasFecha();

	if (fn_vac=="true") {
        alertify.success("Enviando datos...");
          ide_horas = $('#Horas_idempleado').val();
            dia_horas = $('#Horas_dia').val();
            horas_horas = $('#Horas_horas').val();
            agregardatosHoras(ide_horas, dia_horas, horas_horas);
         } else{
		alertify.error('Favor de revisar datos');
	}
}
function validarHorasFecha(){
	
	var valor = document.getElementById("Horas_dia").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_horas_f').remove();
		$('#Horas_dia').parent().attr("class", "form-group has-error has-feedback");
		$('#Horas_dia').parent().append('<span id="icono_texto_horas_f" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_horas_f').text("Ingrese una fecha valida").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_horas_f').remove();
		$('#Horas_dia').parent().attr("class", "form-group has-success has-feedback");
		$('#Horas_dia').parent().children("span").text("").hide();
		$('#Horas_dia').parent().append('<span id="icono_texto_horas_f" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("formato FA: "+valor);
	console.log("final FECHA ADMIN  :"+estado);
	return estado;
}


function validarNuevaHoras_E(){
    var fn_horas_e = validarHorasFecha_E();
    
	if (fn_horas_e=="true") {
        alertify.success("Enviando datos...");
        actualizaDatosHoras();
         } else{
		alertify.error('Favor de revisar datos');
	}
}
function validarHorasFecha_E(){
	
	var valor = document.getElementById("Horas_fecha_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_horas_f_e').remove();
		$('#Horas_fecha_e').parent().attr("class", "form-group has-error has-feedback");
		$('#Horas_fecha_e').parent().append('<span id="icono_texto_horas_f_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_horas_f_e').text("Ingrese una fecha valida").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_horas_f_e').remove();
		$('#Horas_fecha_e').parent().attr("class", "form-group has-success has-feedback");
		$('#Horas_fecha_e').parent().children("span").text("").hide();
		$('#Horas_fecha_e').parent().append('<span id="icono_texto_horas_f_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("formato: "+valor);
	console.log("final :"+estado);
	return estado;
}