function AgregarVac(datos){ 
    // alert(datos);
     d = datos.split('||');
 
     nombre_e =" - ".concat(d[2]);
     empleado = d[1].concat(nombre_e);
 
     $('#view_vac_id').html(d[0]);
     $('#view_vac_emp').html(empleado);
     $('#view_vac_fecha').html(d[3]);
     $('#view_vac_dia').html(d[4]);
     $('#view_color_dia').css("background-color",d[5]);
     $('#view_vac_estado').html(d[6]);
 }
 
 function agregardatosVac(ide_vac, dia_vac, estado_vac){
     cadena="ide=" + ide_vac +
            "&dia=" + dia_vac+
            "&estado=" + estado_vac;
     //alert(cadena);
     $.ajax({
         type:"post",
         url:"../contenido/vacaciones/add.php",
         data:cadena,
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

 function agregardatosVacU(dia_vac_u, ){
    cadena="dia=" + dia_vac_u;
   // alert(cadena);
    $.ajax({
        type:"post",
        url:"../contenido/vacaciones/addu.php",
        data:cadena,
        success:function(r){
          if(r==1){
            $('#vacaciones_usuario').load('vacaciones/tabla_u.php'); 
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
 
 function agregarformVac(datos){
     d = datos.split('||');
  
     $('#Vac_idvacaciones_e').val(d[0]);
     $('#Vac_idempleado_e').val(d[1]);
     $('#vac_fecha_e').val(d[2]);
     $('#vac_dia_e').val(d[3]);
     $('#vac_estado_e').val(d[4]);
 }

 function agregarformVacU(datos){
    d = datos.split('||');
 
    $('#Vac_idvacaciones_eu').val(d[0]);
    $('#Vac_idempleado_eu').val(d[1]);
    $('#Vac_idjefe_eu').val(d[2]);
    $('#Vac_fecha_eu').val(d[3]);
    $('#vac_dia_eu').val(d[4]);
    $('#Vac_color_eu').val(d[5]);
    $('#Vac_estado_eu').val(d[6]);
}

function actualizaDatosVac(){
    idv_vac=$('#Vac_idvacaciones_e').val();
    ide_vac=$('#Vac_idempleado_e').val();
    fecha_vac=$('#vac_fecha_e').val();
    dia_vac=$('#vac_dia_e').val();
    estado_vac=$('#vac_estado_e').val();

    cadenaVac=
    "idv="+ idv_vac +
    "&ide=" + ide_vac +
    "&fecha="+ fecha_vac+
    "&dia="+ dia_vac+
    "&estado="+ estado_vac;
    
    //alert(cadenaVac);

           $.ajax({
            type:"post",
            url:"../contenido/vacaciones/edit.php",
            data:cadenaVac,
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

 function actualizaDatosVacU(){ 
     idv_vac=$('#Vac_idvacaciones_eu').val();
     ide_vac=$('#Vac_idempleado_eu').val();
     idj_vac=$('#Vac_idjefe_eu').val();
     fecha_vac=$('#Vac_fecha_eu').val();
     dia_vac=$('#vac_dia_eu').val();
     color_vac=$('#Vac_color_eu').val();
     estado_vac=$('#Vac_estado_eu').val();

     cadenaVac=
     "idv="+ idv_vac +
     "&ide=" + ide_vac +
     "&jefe=" + idj_vac +
     "&fecha=" + fecha_vac +
     "&dia="+ dia_vac+
     "&color="+ color_vac+
     "&estado="+ estado_vac;
     
     //alert(cadenaVac);
 
            $.ajax({
             type:"post",
             url:"../contenido/vacaciones/edit.php",
             data:cadenaVac,
             success:function(r){
              if(r==1){
               
             $('#vacaciones_usuario').load('vacaciones/tabla_u.php'); 
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
 
 function preguntarVac(id){
  alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
  function(){ eliminarDatosVac(id) },
  function(){ alertify.error('Se cancelo')});
 }
 
 function eliminarDatosVac(id){
     cadena = "id="+id;
     $.ajax({
         type:"post",
         url:"../contenido/vacaciones/delete.php",
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
            $('#contenedor_documentos').load('documentos/tabla.php'); 
            $('#contenedor_imagen').load('imagen/tabla.php'); 
            Swal.fire({
                title: 'Eliminado Exitosamente!',
                icon: 'success',
                timer: 3000,
                timerProgressBar: true,
                showCancelButton: false,
                showConfirmButton: false
            });
             }else{
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
 
 function preguntarDen(id){
     valor = "Denegado";
    alertify.confirm('Negar Dia', '¿Esta seguro de negar este dia?', 
    function(){ UpdateVac(id, valor) },
    function(){ alertify.error('Se cancelo')});
   }
function preguntarApr(id){
    valor = "Aprobado";
   alertify.confirm('Aprobar Dia', '¿Esta seguro de Aprobar este dia?', 
   function(){ UpdateVac(id, valor) },
   function(){ alertify.error('Se cancelo')});
  }

function UpdateVac(id, valor){
    idv_vac_btn=id;
    estado_vac_btn=valor;

    cadenaVacBtn=
    "idv="+ idv_vac_btn+
    "&estado="+ estado_vac_btn;
    
    //alert(cadenaVac);

           $.ajax({
            type:"post",
            url:"../contenido/vacaciones/editbtn.php",
            data:cadenaVacBtn,
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
	$("#guardar_vacacion").click(validarNuevoVacacion);
        $("#vac_dia").click(validarVacFecha);

    $("#actualizar_vacaciones").click(validarNuevoVacacion_E);
    $("#vac_dia_e").click(validarVacFecha_E);
        
		
});

function validarNuevoVacacion(){
	var fn_vac = validarVacFecha();

	if (fn_vac=="true") {
        alertify.success("Enviando datos...");
          ide_vac = $('#Vac_idempleado').val();
            dia_vac = $('#vac_dia').val();
            estado_vac = $('#vac_estado').val();
             agregardatosVac(ide_vac, dia_vac, estado_vac);
         } else{
		alertify.error('Favor de revisar datos');
	}
}
function validarVacFecha(){
	
	var valor = document.getElementById("vac_dia").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_vac_f').remove();
		$('#vac_dia').parent().attr("class", "form-group has-error has-feedback");
		$('#vac_dia').parent().append('<span id="icono_texto_vac_f" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_vac_f').text("Ingrese una fecha valida").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_vac_f').remove();
		$('#vac_dia').parent().attr("class", "form-group has-success has-feedback");
		$('#vac_dia').parent().children("span").text("").hide();
		$('#vac_dia').parent().append('<span id="icono_texto_vac_f" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("formato FA: "+valor);
	console.log("final FECHA ADMIN  :"+estado);
	return estado;
}


function validarNuevoVacacion_E(){
    var fn_vac_e = validarVacFecha_E();
    
	if (fn_vac_e=="true") {
        alertify.success("Enviando datos...");
         actualizaDatosVac();
         } else{
		alertify.error('Favor de revisar datos');
	}
}
function validarVacFecha_E(){
	
	var valor = document.getElementById("vac_dia_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_vac_f_e').remove();
		$('#vac_dia_e').parent().attr("class", "form-group has-error has-feedback");
		$('#vac_dia_e').parent().append('<span id="icono_texto_vac_f_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_vac_f_e').text("Ingrese una fecha valida").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_vac_f_e').remove();
		$('#vac_dia_e').parent().attr("class", "form-group has-success has-feedback");
		$('#vac_dia_e').parent().children("span").text("").hide();
		$('#vac_dia_e').parent().append('<span id="icono_texto_vac_f_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("formato: "+valor);
	console.log("final :"+estado);
	return estado;
}