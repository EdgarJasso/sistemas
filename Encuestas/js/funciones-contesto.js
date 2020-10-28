$(document).ready(function(){

	$("#guardar_con").click(validarNuevaCon);
		$("#con_usuario").change(validarConUsuario);
		$("#con_validacion").change(validaronValidacion);
		$("#con_registro").keyup(validarConRegistro);
		$("#con_fecha").keyup(validarConFecha);

	$("#actualizar_con").click(validarNuevaCon_e);
	$("#con_usuario_e").change(validarConUsuario_e);
	$("#con_validacion_e").change(validaronValidacion_e);
	$("#con_registro_e").keyup(validarConRegistro_e);
	$("#con_fecha_e").keyup(validarConFecha_e);
		
}); 

function AgregarViewCon(datos){ 
	d = datos.split('||');
	$('#view_con_id').html(d[0]);
	$('#view_con_usuario').html(d[1]);
	$('#view_con_validacion').html(d[2]);
	$('#view_con_registro').html(d[3]);
	$('#view_con_fecha').html(d[4]);
}
  
function agregardatosCon(usuario, validacion, registro, fecha){
	cadenaCon="id_usuario=" + usuario +
			  "&id_validacion="+ validacion+
			  "&id_registro="+ registro+
			  "&fecha="+ fecha;
	$.ajax({
		type:"post",
		url:"../../cuerpo/contenido/contesto/add.php",
		data:cadenaCon,
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
    $('#contenedor_categoria').load('../../cuerpo/contenido/categoria/tabla.php'); 
	$('#contenedor_contesto').load('../../cuerpo/contenido/contesto/tabla.php'); 		 
}else{
			console.log(r);
			Swal.fire({
				title: 'Error en el proceso!\n\n\n<br>'+r,
				icon: 'error',
				confirmButtonText: 'Continuar'
			});
		   }
	    }
	});
}  

function agregarformCon(datos){
	d = datos.split('||');
	$('#idcon_e').val(d[0]);
	$('#con_usuario_e').val(d[1]);
	$('#con_validacion_e').val(d[2]);
	$('#con_registro_e').val(d[3]);
	$('#con_fecha_e').val(d[4]);
}

function actualizaDatosCon(){
    id = $('#idcon_e').val();
	id_usuario = $('#con_usuario_e').val();
	id_validacion = $('#con_validacion_e').val();
	id_registro = $('#con_registro_e').val();
	fecha = $('#con_fecha_e').val();
    
	cadenacon=
    "id="+ id +
	"&id_usuario=" + id_usuario +
	"&id_validacion=" + id_validacion +
	"&id_registro=" + id_registro +
	"&fecha="+ fecha;
    
		   $.ajax({
			type:"post",
			url:"../../cuerpo/contenido/contesto/edit.php",
			data:cadenacon,
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
				$('#contenedor_categoria').load('../../cuerpo/contenido/categoria/tabla.php'); 
	 			$('#contenedor_contesto').load('../../cuerpo/contenido/contesto/tabla.php'); 
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

function preguntarCon(id){
 alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
 function(){ eliminarDatosCon(id) },
 function(){ alertify.error('Se cancelo')});
}
function eliminarDatosCon(id){
	cadena = "id="+id;
	$.ajax({
		type:"post",
		url:"../../cuerpo/contenido/contesto/delete.php",
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
	$('#contenedor_categoria').load('../../cuerpo/contenido/categoria/tabla.php'); 
	$('#contenedor_contesto').load('../../cuerpo/contenido/contesto/tabla.php'); 
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


function validarNuevaCon(){
	var Con_usuario = validarConUsuario();
	var Con_validacion = validaronValidacion();
	var Con_registro = validarConRegistro();
	var Con_fecha = validarConFecha();

	if (Con_usuario=="true" && Con_validacion=="true" && Con_registro=="true" && Con_fecha=="true") {
		alertify.success("Enviando datos...");

		usuario = $('#con_usuario').val();
		validacion = $('#con_validacion').val();
		registro = $('#con_registro').val();
		fecha = $('#con_fecha').val();

		agregardatosCon(usuario, validacion, registro, fecha)
	}else{
		console.log('Error al agregar informacion(Contesto)');
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
function validarConUsuario(){  
	var valor = document.getElementById("con_usuario").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null" || valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_con_usuario').remove();
		$('#con_usuario').parent().attr("class", "form-group has-error has-feedback");
		$('#con_usuario').parent().append('<span id="icono_con_usuario" class="icon-cross form-control-feedback mt-2" style="top:32px; rigth:10px;"></span>');
		$('#text_con_usuario').text("Seleccione otra opcion").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_con_usuario').remove();
		$('#con_usuario').parent().attr("class", "form-group has-success has-feedback");
		$('#con_usuario').parent().children("span").text("").hide();
		$('#con_usuario').parent().append('<span id="icono_con_usuario" class="icon-checkmark form-control-feedback mt-2" style="top:32px;  rigth:10px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validaronValidacion(){  
	var valor = document.getElementById("con_validacion").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null" || valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_con_validacion').remove();
		$('#con_validacion').parent().attr("class", "form-group has-error has-feedback");
		$('#con_validacion').parent().append('<span id="icono_con_validacion" class="icon-cross form-control-feedback mt-2" style="top:32px; rigth:10px;"></span>');
		$('#text_con_validacion').text("Seleccione otra opcion").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_con_validacion').remove();
		$('#con_validacion').parent().attr("class", "form-group has-success has-feedback");
		$('#con_validacion').parent().children("span").text("").hide();
		$('#con_validacion').parent().append('<span id="icono_con_validacion" class="icon-checkmark form-control-feedback mt-2" style="top:32px;  rigth:10px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarConRegistro(){  
	var valor = document.getElementById("con_registro").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_con_registro').remove();
		$('#con_registro').parent().attr("class", "form-group has-error has-feedback");
		$('#con_registro').parent().append('<span id="icono_con_registro" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_con_registro').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(letras.test(valor)){
		$('#icono_con_registro').remove();
		$('#con_registro').parent().attr("class", "form-group has-error has-feedback");
		$('#con_registro').parent().append('<span id="icono_con_registro" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_con_registro').text("Letras no validos").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_con_registro').remove();
		$('#con_registro').parent().attr("class", "form-group has-success has-feedback");
		$('#con_registro').parent().children("span").text("").hide();
		$('#con_registro').parent().append('<span id="icono_con_registro" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarConFecha(){  
	var valor = document.getElementById("con_fecha").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_con_fecha').remove();
		$('#con_fecha').parent().attr("class", "form-group has-error has-feedback");
		$('#con_fecha').parent().append('<span id="icono_con_fecha" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_con_fecha').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_con_fecha').remove();
		$('#con_fecha').parent().attr("class", "form-group has-success has-feedback");
		$('#con_fecha').parent().children("span").text("").hide();
		$('#con_fecha').parent().append('<span id="icono_con_fecha" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}

/*editar*/


function validarNuevaCon_e(){
	var Con_usuario_e = validarConUsuario_e();
	var Con_validacion_e = validaronValidacion_e();
	var Con_registro_e = validarConRegistro_e();
	var Con_fecha_e = validarConFecha_e();

	if (Con_usuario_e=="true" && Con_validacion_e=="true" && Con_registro_e=="true" && Con_fecha_e=="true") {
		alertify.success("Enviando datos...");
		actualizaDatosCon();
	}else{
		console.log('Error al agregar informacion(Categoria)');
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
function validarConUsuario_e(){  
	var valor = document.getElementById("con_usuario_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null" || valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_con_usuario_e').remove();
		$('#con_usuario_e').parent().attr("class", "form-group has-error has-feedback");
		$('#con_usuario_e').parent().append('<span id="icono_con_usuario_e" class="icon-cross form-control-feedback mt-2" style="top:32px; rigth:10px;"></span>');
		$('#text_con_usuario_e').text("Seleccione otra opcion").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_con_usuario_e').remove();
		$('#con_usuario_e').parent().attr("class", "form-group has-success has-feedback");
		$('#con_usuario_e').parent().children("span").text("").hide();
		$('#con_usuario_e').parent().append('<span id="icono_con_usuario_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;  rigth:10px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validaronValidacion_e(){  
	var valor = document.getElementById("con_validacion_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null" || valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_con_validacion_e').remove();
		$('#con_validacion_e').parent().attr("class", "form-group has-error has-feedback");
		$('#con_validacion_e').parent().append('<span id="icono_con_validacion_e" class="icon-cross form-control-feedback mt-2" style="top:32px; rigth:10px;"></span>');
		$('#text_con_validacion_e').text("Seleccione otra opcion").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_con_validacion_e').remove();
		$('#con_validacion_e').parent().attr("class", "form-group has-success has-feedback");
		$('#con_validacion_e').parent().children("span").text("").hide();
		$('#con_validacion_e').parent().append('<span id="icono_con_validacion_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;  rigth:10px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarConRegistro_e(){  
	var valor = document.getElementById("con_registro_e").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_con_registro_e').remove();
		$('#con_registro_e').parent().attr("class", "form-group has-error has-feedback");
		$('#con_registro_e').parent().append('<span id="icono_con_registro_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_con_registro_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(letras.test(valor)){
		$('#icono_con_registro_e').remove();
		$('#con_registro_e').parent().attr("class", "form-group has-error has-feedback");
		$('#con_registro_e').parent().append('<span id="icono_con_registro_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_con_registro_e').text("Letras no validos").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_con_registro_e').remove();
		$('#con_registro_e').parent().attr("class", "form-group has-success has-feedback");
		$('#con_registro_e').parent().children("span").text("").hide();
		$('#con_registro_e').parent().append('<span id="icono_con_registro_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarConFecha_e(){  
	var valor = document.getElementById("con_fecha_e").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_con_fecha_e').remove();
		$('#con_fecha_e').parent().attr("class", "form-group has-error has-feedback");
		$('#con_fecha_e').parent().append('<span id="icono_con_fecha_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_con_fecha_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_con_fecha_e').remove();
		$('#con_fecha_e').parent().attr("class", "form-group has-success has-feedback");
		$('#con_fecha_e').parent().children("span").text("").hide();
		$('#con_fecha_e').parent().append('<span id="icono_con_fecha_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}