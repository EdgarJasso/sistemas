function AgregarViewArea(datos){ 
	d = datos.split('||');

	$('#view_area_id').html(d[0]);
	$('#view_area_nombre').html(d[1]);
}
 
function agregardatosArea(nombre){
	cadenaA="nombre=" + nombre;
	$.ajax({
		type:"post",
		url:"../contenido/area/add.php",
		data:cadenaA,
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

function agregarformArea(datos){
    d = datos.split('||');
 
	$('#idareaAct').val(d[0]);
	$('#Area_nombreAct').val(d[1]);
}

function actualizaDatosArea(){
    idA=$('#idareaAct').val();
	nombreA=$('#Area_nombreAct').val();
    
	cadenaAr=
    "id="+ idA +
	"&nombre=" +nombreA;
    
		   $.ajax({
			type:"post",
			url:"../contenido/area/edit.php",
			data:cadenaAr,
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

function preguntarArea(id){
 alertify.confirm('Emininar Datos', '¿Esta seguro de eliminar este registro?', 
 function(){ eliminarDatosArea(id) },
 function(){ alertify.error('Se cancelo')});
}

function eliminarDatosArea(id){
	cadena = "id="+id;
	$.ajax({
		type:"post",
		url:"../contenido/area/delete.php",
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
	$("#guardar_area").click(validarNuevaArea);
		$("#Area_nombre").keyup(validarAreaNombre);

	$("#actualizar_area").click(validarNuevaArea_E);
		$("#Area_nombreAct").keyup(validarAreaNombre_e);
		
});

function validarNuevaArea(){
	var area_nombre = validarAreaNombre();

	if (area_nombre=="true") {
		alertify.success("Enviando datos...");
		nombre = $('#Area_nombre').val();
		  agregardatosArea(nombre);
	}else{
		alertify.error('Favor de revisar datos');
	}
}
function validarAreaNombre(){  
	var valor = document.getElementById("Area_nombre").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_area_nombre').remove();
		$('#Area_nombre').parent().attr("class", "form-group has-error has-feedback");
		$('#Area_nombre').parent().append('<span id="icono_area_nombre" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_area_nombre').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_area_nombre').remove();
		$('#Area_nombre').parent().attr("class", "form-group has-error has-feedback");
		$('#Area_nombre').parent().append('<span id="icono_area_nombre" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_area_nombre').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_area_nombre').remove();
		$('#Area_nombre').parent().attr("class", "form-group has-error has-feedback");
		$('#Area_nombre').parent().append('<span id="icono_area_nombre" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_area_nombre').text("Longitud no valida 5-20").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_area_nombre').remove();
		$('#Area_nombre').parent().attr("class", "form-group has-success has-feedback");
		$('#Area_nombre').parent().children("span").text("").hide();
		$('#Area_nombre').parent().append('<span id="icono_area_nombre" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}


function validarNuevaArea_E(){
	var area_nombre_e = validarAreaNombre_e();

	if (area_nombre_e == "true") {
		alertify.success("Enviando datos...");
		actualizaDatosArea();
	}else{
		alertify.error('Favor de revisar datos');
	}
}
function validarAreaNombre_e(){  
	var valor = document.getElementById("Area_nombreAct").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_area_nombreAct').remove();
		$('#Area_nombreAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Area_nombreAct').parent().append('<span id="icono_area_nombreAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_area_nombreAct').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_area_nombreAct').remove();
		$('#Area_nombreAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Area_nombreAct').parent().append('<span id="icono_area_nombreAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_area_nombreAct').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_area_nombreAct').remove();
		$('#Area_nombreAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Area_nombreAct').parent().append('<span id="icono_area_nombreAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_area_nombreAct').text("Longitud no valida 5-20").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_area_nombreAct').remove();
		$('#Area_nombreAct').parent().attr("class", "form-group has-success has-feedback");
		$('#Area_nombreAct').parent().children("span").text("").hide();
		$('#Area_nombreAct').parent().append('<span id="icono_area_nombreAct" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}


