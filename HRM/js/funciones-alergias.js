function AgregarAlergias(datos){ 
    // alert(datos);
     d = datos.split('||');
 
     nombrewp =" ".concat(d[3]);
     wp = d[2].concat(nombrewp);

     nombre_e =" - ".concat(wp);
     empleado = d[1].concat(nombre_e);

     $('#view_alergia_id').html(d[0]);
     $('#view_alergia_emp').html(empleado);
     $('#view_alergia_descripcion').html(d[4]);
     $('#view_alergia_sangre').html(d[5]);
     $('#view_alergia_nombre_contacto').html(d[6]);
     $('#view_alergia_tel_contacto').html(d[7]);
     $('#view_alergia_par_contacto').html(d[8]);
     $('#view_alergia_nombre_contacto_extra').html(d[9]);
     $('#view_alergia_tel_contacto_extra').html(d[10]);
     $('#view_alergia_par_contacto_extra').html(d[11]);
     
 }
 
 function agregardatosAlergias(id_empleado, descripcion, tipo_sangre, nombre_contacto,  tel_contacto, par_contacto, nombre_contacto_extra,  tel_contacto_extra, par_contacto_extra){
     cadenaH="id_empleado=" + id_empleado+
            "&descripcion=" + descripcion+
            "&tipo_sangre=" + tipo_sangre+
            "&nombre_contacto=" + nombre_contacto+
            "&tel_contacto=" + tel_contacto +
            "&par_contacto=" + par_contacto +
            "&nombre_contacto_ex=" + nombre_contacto_extra+
            "&tel_contacto_ex=" + tel_contacto_extra +
            "&par_contacto_ex=" + par_contacto_extra;
     //alert(cadena);
     $.ajax({
         type:"post",
         url:"../contenido/alergias/add.php",
         data:cadenaH,
         success:function(r){
           if(r==1){
            $('#contenedor_empleados').load('empleados/tabla.php'); 
            $('#contenedor_usuarios').load('usuarios/tabla.php'); 
            $('#contenedor_direccion').load('direccion/tabla.php'); 
            $('#contenedor_alergias').load('alergias/tabla.php'); 
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

 function agregarformAlergias(datos){
     d = datos.split('||');
  
     $('#Alergias_idalergia_e').val(d[0]);
     $('#Alergias_idempleado_e').val(d[1]);
     $('#Alergias_descripcion_e').val(d[2]);
     $('#Alergias_tipo_sangre_e').val(d[3]);
     $('#Alergias_nombre_contacto_e').val(d[4]);
     $('#Alergias_tel_contacto_e').val(d[5]);
     $('#Alergias_par_contacto_e').val(d[6]);
     $('#Alergias_nombre_contacto_extra_e').val(d[7]);
     $('#Alergias_tel_contacto_extra_e').val(d[8]);
     $('#Alergias_par_contacto_extra_e').val(d[9]);

 }

function actualizaDatosAlergias(){
    idal=$('#Alergias_idalergia_e').val();
    ide=$('#Alergias_idempleado_e').val();
    descripcion=$('#Alergias_descripcion_e').val();
    tipo_sangre=$('#Alergias_tipo_sangre_e').val();
    nombre_contacto=$('#Alergias_nombre_contacto_e').val();
    tel_contacto=$('#Alergias_tel_contacto_e').val();
    par_contacto=$('#Alergias_par_contacto_e').val();
    nombre_contacto_extra=$('#Alergias_nombre_contacto_extra_e').val();
    tel_contacto_extra=$('#Alergias_tel_contacto_extra_e').val();
    par_contacto_extra=$('#Alergias_par_contacto_extra_e').val();


    cadenaAlergias=
    "idal="+ idal +
    "&ide=" + ide +
    "&descripcion="+ descripcion+
    "&tipo_sangre="+ tipo_sangre+
    "&nombre_contacto="+ nombre_contacto+
    "&tel_contacto="+ tel_contacto +
    "&par_contacto="+ par_contacto +
    "&nombre_contacto_ex="+ nombre_contacto_extra+
    "&tel_contacto_ex="+ tel_contacto_extra +
    "&par_contacto_ex="+ par_contacto_extra;
    
    //alert(cadenaAlergias);

           $.ajax({
            type:"post",
            url:"../contenido/alergias/edit.php",
            data:cadenaAlergias,
            success:function(r){
             if(r==1){
                $('#contenedor_empleados').load('empleados/tabla.php'); 
                $('#contenedor_usuarios').load('usuarios/tabla.php');
                
            $('#contenedor_alergias').load('alergias/tabla.php');  
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

 
 function preguntarAlergias(id){
  alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
  function(){ eliminarDatoAlergia(id) },
  function(){ alertify.error('Se cancelo')});
 }
 
 function eliminarDatoAlergia(id){
     cadena = "id="+id;
     $.ajax({
         type:"post",
         url:"../contenido/alergias/delete.php",
         data: cadena,
         success:function(r){
          if(r==1){
             
            $('#contenedor_empleados').load('empleados/tabla.php'); 
            $('#contenedor_usuarios').load('usuarios/tabla.php'); 
            $('#contenedor_direccion').load('direccion/tabla.php');
            
            $('#contenedor_alergias').load('alergias/tabla.php');  
            $('#contenedor_area').load('area/tabla.php'); 
            $('#contenedor_categoria').load('categoria/tabla.php'); 
            $('#contenedor_alergias').load('alergias/tabla.php'); 
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
	$("#guardar_alergias").click(validarNuevaAlergia);

    $("#actualizar_alergias").click(validarNuevaHoras_E);
        	
});

function validarNuevaAlergia(){
	alertify.success("Enviando datos...");
    id_empleado = $('#Alergias_idempleado').val();
    descripcion = $('#Alergias_descripcion').val();
    tipo_sangre = $('#Alergias_tipo_sangre').val();
    nombre_contacto = $('#Alergias_nombre_contacto').val();
    tel_contacto = $('#Alergias_tel_contacto').val();
    par_contacto = $('#Alergias_par_contacto').val();
    nombre_contacto_extra = $('#Alergias_nombre_contacto_extra').val();
    tel_contacto_extra = $('#Alergias_tel_contacto_extra').val();
    par_contacto_extra = $('#Alergias_par_contacto_extra').val();
    agregardatosAlergias(id_empleado, descripcion, tipo_sangre, nombre_contacto, tel_contacto, par_contacto, nombre_contacto_extra, tel_contacto_extra, par_contacto_extra)
    
} 


function validarNuevaHoras_E(){
    alertify.success("Enviando datos...");
    actualizaDatosAlergias();
}