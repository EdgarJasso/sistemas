function AgregarViewServicio(datos){ 
	d = datos.split('||');

	$('#view_servicio_id').html(d[0]);
	$('#view_servicio_descripcion').html(d[1]);
}
function agregardatosServicio(descripcion){
	cadenaS="descripcion=" + descripcion;
	$.ajax({
		type:"post",
		url:"../../cuerpo/contenido/servicios/add.php",
		data:cadenaS,
		success:function(r){
		  if(r==1){  
			Swal.fire({
			title: 'Agregado Exitosamente!',
			icon: 'success',
			timer: 3000,
			timerProgressBar: true,
			showCancelButton: false,
			showConfirmButton: false
		});
		$('#marcadores').load('../../php/marcadores.php');
    $('#contenedor_area').load('../../cuerpo/contenido/area/tabla.php'); 
    $('#contenedor_empleados').load('../../cuerpo/contenido/empleados/tabla.php'); 
    $('#contenedor_usuarios').load('../../cuerpo/contenido/usuarios/tabla.php'); 
    $('#contenedor_servicios').load('../../cuerpo/contenido/servicios/tabla.php'); 
    $('#contenedor_peticiones').load('../../cuerpo/contenido/peticiones/tabla.php'); 
    $('#contenedor_bitacora').load('../../cuerpo/contenido/bitacora/tabla.php'); 
	      }else{
			console.log(data);
			Swal.fire({
				title: 'Error en el proceso!\n\n\n'+data,
				icon: 'error',
				confirmButtonText: 'Continuar'
			});
		   }
	    }
	});
}  

function agregarformServicio(datos){
    d = datos.split('||');
 
	$('#idservicio').val(d[0]);
	$('#servicio_descripcion_e').val(d[1]);
}

function actualizaDatosServicio(){
    idSA=$('#idservicio').val();
	descripcionSA=$('#servicio_descripcion_e').val();
    
	cadenaSA=
    "id="+ idSA +
	"&descripcion=" +descripcionSA;
    
		   $.ajax({
			type:"post",
			url:"../../cuerpo/contenido/servicios/edit.php",
			data:cadenaSA,
			success:function(r){
				if(r==1){  
					Swal.fire({
					title: 'Modificado Exitosamente!',
					icon: 'success',
					timer: 3000,
					timerProgressBar: true,
					showCancelButton: false,
					showConfirmButton: false
				});
				$('#marcadores').load('../../php/marcadores.php');
    $('#contenedor_area').load('../../cuerpo/contenido/area/tabla.php'); 
    $('#contenedor_empleados').load('../../cuerpo/contenido/empleados/tabla.php'); 
    $('#contenedor_usuarios').load('../../cuerpo/contenido/usuarios/tabla.php'); 
    $('#contenedor_servicios').load('../../cuerpo/contenido/servicios/tabla.php'); 
    $('#contenedor_peticiones').load('../../cuerpo/contenido/peticiones/tabla.php'); 
    $('#contenedor_bitacora').load('../../cuerpo/contenido/bitacora/tabla.php'); 
				  }else{
					console.log(data);
					Swal.fire({
						title: 'Error en el proceso!\n\n\n'+data,
						icon: 'error',
						confirmButtonText: 'Continuar'
					});
				   }
			}
		});

}

function preguntarServicio(id){
 alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
 function(){ eliminarDatosServicio(id) },
 function(){ alertify.error('Se cancelo')});
}

function eliminarDatosServicio(id){
	cadena = "id="+id;
	$.ajax({
		type:"post",
		url:"../../cuerpo/contenido/servicios/delete.php",
		data: cadena,
		success:function(r){
			if(r==1){  
				Swal.fire({
				title: 'Eliminado Exitosamente!',
				icon: 'success',
				timer: 3000,
				timerProgressBar: true,
				showCancelButton: false,
				showConfirmButton: false
			});
			$('#marcadores').load('../../php/marcadores.php');
    $('#contenedor_area').load('../../cuerpo/contenido/area/tabla.php'); 
    $('#contenedor_empleados').load('../../cuerpo/contenido/empleados/tabla.php'); 
    $('#contenedor_usuarios').load('../../cuerpo/contenido/usuarios/tabla.php'); 
    $('#contenedor_servicios').load('../../cuerpo/contenido/servicios/tabla.php'); 
    $('#contenedor_peticiones').load('../../cuerpo/contenido/peticiones/tabla.php'); 
    $('#contenedor_bitacora').load('../../cuerpo/contenido/bitacora/tabla.php'); 
			  }else{
				console.log(data);
				Swal.fire({
					title: 'Error en el proceso!\n\n\n'+data,
					icon: 'error',
					confirmButtonText: 'Continuar'
				});
			   }
		}

	});
}


$(document).ready(function(){
	$("#guardar_servicio").click(validarNuevoServicio);
		$("#servicio_descripcion").keyup(validarServicioDescripcion);

	$("#actualizar_servicio").click(validarNuevoServicio_e);
		$("#servicio_descripcion_e").keyup(validarServicioDescripcion_e);
		
});

function validarNuevoServicio(){
	var servicio_descripcion = validarServicioDescripcion();

	if (servicio_descripcion=="true") {
		//alertify.success("Enviando datos...");
		descripcion_sa = $('#servicio_descripcion').val();
		  agregardatosServicio(descripcion_sa);
	}else{
		console.log('Error al agregar informacion(Servicio)');
        Swal.fire({
            title: 'Error en la validacion \n Favor de revisar',
            icon: 'warning',
            timer: 2000,
            timerProgressBar: true,
            showCancelButton: false,
            showConfirmButton: false
        });
	}
}
function validarServicioDescripcion(){  
	var valor = document.getElementById("servicio_descripcion").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,50}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,50}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,50}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_servicio_descripcion').remove();
		$('#servicio_descripcion').parent().attr("class", "form-group has-error has-feedback");
		$('#servicio_descripcion').parent().append('<span id="icono_servicio_descripcion" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_servicio_descripcion').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_servicio_descripcion').remove();
		$('#servicio_descripcion').parent().attr("class", "form-group has-error has-feedback");
		$('#servicio_descripcion').parent().append('<span id="icono_servicio_descripcion" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_servicio_descripcion').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_servicio_descripcion').remove();
		$('#servicio_descripcion').parent().attr("class", "form-group has-error has-feedback");
		$('#servicio_descripcion').parent().append('<span id="icono_servicio_descripcion" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_servicio_descripcion').text("Longitud no valida 5-50").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_servicio_descripcion').remove();
		$('#servicio_descripcion').parent().attr("class", "form-group has-success has-feedback");
		$('#servicio_descripcion').parent().children("span").text("").hide();
		$('#servicio_descripcion').parent().append('<span id="icono_servicio_descripcion" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}


function validarNuevoServicio_e(){
	var servicio_descripcion = validarServicioDescripcion_e();

	if (servicio_descripcion == "true") {
		//alertify.success("Enviando datos...");
		actualizaDatosServicio();
	}else{
		console.log('Error al agregar informacion(Servicio)');
        Swal.fire({
            title: 'Error en la validacion \n Favor de revisar',
            icon: 'warning',
            timer: 2000,
            timerProgressBar: true,
            showCancelButton: false,
            showConfirmButton: false
        });
	}
}
function validarServicioDescripcion_e(){  
	var valor = document.getElementById("servicio_descripcion_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,50}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,50}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,50}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_servicio_descripcion_e').remove();
		$('#servicio_descripcion_e').parent().attr("class", "form-group has-error has-feedback");
		$('#servicio_descripcion_e').parent().append('<span id="icono_servicio_descripcion_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_servicio_descripcion_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_servicio_descripcion_e').remove();
		$('#servicio_descripcion_e').parent().attr("class", "form-group has-error has-feedback");
		$('#servicio_descripcion_e').parent().append('<span id="icono_servicio_descripcion_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_servicio_descripcion_e').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_servicio_descripcion_e').remove();
		$('#servicio_descripcion_e').parent().attr("class", "form-group has-error has-feedback");
		$('#servicio_descripcion_e').parent().append('<span id="icono_servicio_descripcion_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_servicio_descripcion_e').text("Longitud no valida 5-50").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_servicio_descripcion_e').remove();
		$('#servicio_descripcion_e').parent().attr("class", "form-group has-success has-feedback");
		$('#servicio_descripcion_e').parent().children("span").text("").hide();
		$('#servicio_descripcion_e').parent().append('<span id="icono_servicio_descripcion_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}


