  
function agregarformDocto(datos){ 
	//alert(datos);
	d = datos.split('||');

	$('#iddocto_act').val(d[0]);
    $('#id_empleado_act').val(d[1]);
	$('#empleado_act').val(d[2]);
	$('#titulo_act').val(d[3]);
	$('#descripcion_act').val(d[4]);
	$('#archivo_act').val(d[5]);
}

function actualizaDatos(){
	id=$('#idpersona').val();
    ide=$('#idempleado').val();
	clave=$('#clave_u').val();
	permiso=$('#permiso_u').val();

	cadena="id="+id+
           "&ide="+ ide+
	       "&clave=" + clave +
		   "&permiso=" + permiso;
	
		   $.ajax({
			type:"post",
			url:"../contenido/usuarios/edit.php",
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

function preguntar(datos){
	d = datos.split('||');
	
    esp = "&";
	enlace="http://localhost:8080/HRM/cuerpo/contenido/documentos/delete.php?";
	id="id=";
	docto = id.concat(d[0]);
	path="path=";
	link = path.concat(d[3]);
	out = enlace.concat(docto);
	out_= out.concat(esp);
	OUT = out_.concat(link);
	 alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
 function(){ window.location=OUT; },
 function(){ alertify.error('Se cancelo')});
}
function agregardelete(datos){
	d = datos.split('||');
	signo = "?";
	espacio = " - ";
	title = d[1].concat(espacio);
    cadena = title.concat(d[2], signo);
    $('#iddocto').val(d[0]);
    $('#titulo_delete').html(cadena);
    $('#path').val(d[3]);
}
