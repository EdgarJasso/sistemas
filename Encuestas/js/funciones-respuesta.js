$(document).ready(function(){

	$("#guardar_res").click(validarNuevaRes);
		$("#res_registro").keyup(validarResReg);
		$("#res_pregunta").change(validarResPre);
		$("#res_respuesta").change(validarResRes);
		$("#res_justificacion").keyup(validarResJus);

	$("#actualizar_res").click(validarNuevaRes_e);
		$("#res_registro_e").keyup(validarResReg_e);
		$("#res_pregunta_e").change(validarResPre_e);
		$("#res_respuesta_e").change(validarResRes_e);
		$("#res_justificacion_e").keyup(validarResJus_e);
		
}); 
function AgregarViewRes(datos){ 
	d = datos.split('||');
	$('#view_res_id').html(d[0]);
	$('#view_res_registro').html(d[1]);
	$('#view_res_pregunta').html(d[2]);
	$('#view_res_respuesta').html(d[3]);
	$('#view_res_justificacion').html(d[4]);
}  
function agregardatosRes(registro, id_pregunta, respuesta, justificacion){
	cadenaCon="registro=" + registro +
			  "&id_pregunta="+ id_pregunta+
			  "&respuesta="+ respuesta+
			  "&justificacion="+ justificacion;
	$.ajax({
		type:"post",
		url:"../../cuerpo/contenido/respuestas/add.php",
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
	$('#contenedor_area').load('../../cuerpo/contenido/area/tabla.php'); 
    $('#contenedor_categoria').load('../../cuerpo/contenido/categoria/tabla.php'); 
    $('#contenedor_competencias').load('../../cuerpo/contenido/competencias/tabla.php'); 
    $('#contenedor_contesto').load('../../cuerpo/contenido/contesto/tabla.php'); 
    $('#contenedor_pregunta').load('../../cuerpo/contenido/pregunta/tabla.php'); 
	$('#contenedor_respuesta').load('../../cuerpo/contenido/respuestas/tabla.php');  


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
function agregarformRes(datos){
	d = datos.split('||');
	$('#idres_e').val(d[0]);
	$('#res_registro_e').val(d[1]);
	$('#res_pregunta_e').val(d[2]);
	$('#res_respuesta_e').val(d[3]);
	$('#res_justificacion_e').val(d[4]);
}
function actualizaDatosRes(){
    id = $('#idres_e').val();
	resgistro = $('#res_registro_e').val();
	pregunta = $('#res_pregunta_e').val();
	respuesta = $('#res_respuesta_e').val();
	justificacion = $('#res_justificacion_e').val();
    
	cadenares=
    "id="+ id +
	"&resgistro=" + resgistro +
	"&id_pregunta=" + pregunta +
	"&respuesta=" + respuesta +
	"&justificacion="+ justificacion;
    
		   $.ajax({
			type:"post",
			url:"../../cuerpo/contenido/respuestas/edit.php",
			data:cadenares,
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
				$('#contenedor_area').load('../../cuerpo/contenido/area/tabla.php'); 
    $('#contenedor_categoria').load('../../cuerpo/contenido/categoria/tabla.php'); 
    $('#contenedor_competencias').load('../../cuerpo/contenido/competencias/tabla.php'); 
    $('#contenedor_contesto').load('../../cuerpo/contenido/contesto/tabla.php'); 
    $('#contenedor_pregunta').load('../../cuerpo/contenido/pregunta/tabla.php'); 
	$('#contenedor_respuesta').load('../../cuerpo/contenido/respuestas/tabla.php');  

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
function preguntarRes(id){
 alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
 function(){ eliminarDatosRes(id) },
 function(){ alertify.error('Se cancelo')});
}
function eliminarDatosRes(id){
	cadena = "id="+id;
	$.ajax({
		type:"post",
		url:"../../cuerpo/contenido/respuestas/delete.php",
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
			$('#contenedor_area').load('../../cuerpo/contenido/area/tabla.php'); 
    $('#contenedor_categoria').load('../../cuerpo/contenido/categoria/tabla.php'); 
    $('#contenedor_competencias').load('../../cuerpo/contenido/competencias/tabla.php'); 
    $('#contenedor_contesto').load('../../cuerpo/contenido/contesto/tabla.php'); 
    $('#contenedor_pregunta').load('../../cuerpo/contenido/pregunta/tabla.php'); 
	$('#contenedor_respuesta').load('../../cuerpo/contenido/respuestas/tabla.php');  

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

function validarNuevaRes(){
	var ResReg = validarResReg();
	var ResPre = validarResPre();
	var ResRes = validarResRes();
	var ResJus = validarResJus();

	if (ResReg=="true" && ResPre=="true" && ResRes=="true" && ResJus=="true") {
		alertify.success("Enviando datos...");

		registro = $('#res_registro').val();
		id_pregunta = $('#res_pregunta').val();
		respuesta = $('#res_respuesta').val();
		justificacion = $('#res_justificacion').val();

		agregardatosRes(registro, id_pregunta, respuesta, justificacion);
	}else{
		console.log('Error al agregar informacion(Pregunta)');
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
function validarResReg(){  
	var valor = document.getElementById("res_registro").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_res_registro').remove();
		$('#res_registro').parent().attr("class", "form-group has-error has-feedback");
		$('#res_registro').parent().append('<span id="icono_res_registro" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_res_registro').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_res_registro').remove();
		$('#res_registro').parent().attr("class", "form-group has-success has-feedback");
		$('#res_registro').parent().children("span").text("").hide();
		$('#res_registro').parent().append('<span id="icono_res_registro" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarResPre(){  
	var valor = document.getElementById("res_pregunta").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null" || valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_res_pregunta').remove();
		$('#res_pregunta').parent().attr("class", "form-group has-error has-feedback");
		$('#res_pregunta').parent().append('<span id="icono_res_pregunta" class="icon-cross form-control-feedback mt-2" style="top:32px; rigth:10px;"></span>');
		$('#text_res_pregunta').text("Seleccione otra opcion").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_res_pregunta').remove();
		$('#res_pregunta').parent().attr("class", "form-group has-success has-feedback");
		$('#res_pregunta').parent().children("span").text("").hide();
		$('#res_pregunta').parent().append('<span id="icono_res_pregunta" class="icon-checkmark form-control-feedback mt-2" style="top:32px;  rigth:10px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarResRes(){  
	var valor = document.getElementById("res_respuesta").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null" || valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_res_respuesta').remove();
		$('#res_respuesta').parent().attr("class", "form-group has-error has-feedback");
		$('#res_respuesta').parent().append('<span id="icono_res_respuesta" class="icon-cross form-control-feedback mt-2" style="top:32px; rigth:10px;"></span>');
		$('#text_res_respuesta').text("Seleccione otra opcion").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_res_respuesta').remove();
		$('#res_respuesta').parent().attr("class", "form-group has-success has-feedback");
		$('#res_respuesta').parent().children("span").text("").hide();
		$('#res_respuesta').parent().append('<span id="icono_res_respuesta" class="icon-checkmark form-control-feedback mt-2" style="top:32px;  rigth:10px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarResJus(){  
	var valor = document.getElementById("res_justificacion").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_res_justificacion').remove();
		$('#res_justificacion').parent().attr("class", "form-group has-error has-feedback");
		$('#res_justificacion').parent().append('<span id="icono_res_justificacion" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_res_justificacion').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_res_justificacion').remove();
		$('#res_justificacion').parent().attr("class", "form-group has-success has-feedback");
		$('#res_justificacion').parent().children("span").text("").hide();
		$('#res_justificacion').parent().append('<span id="icono_res_justificacion" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarNuevaRes_e(){
	var ResReg_e = validarResReg_e();
	var ResPre_e = validarResPre_e();
	var ResRes_e = validarResRes_e();
	var ResJus_e = validarResJus_e();

	if (ResReg_e=="true" && ResPre_e=="true" && ResRes_e=="true" && ResJus_e=="true") {
		alertify.success("Enviando datos...");

		actualizaDatosRes();
	}else{
		console.log('Error al agregar informacion(Pregunta)');
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
function validarResReg_e(){  
	var valor = document.getElementById("res_registro_e").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_res_registro_e').remove();
		$('#res_registro_e').parent().attr("class", "form-group has-error has-feedback");
		$('#res_registro_e').parent().append('<span id="icono_res_registro_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_res_registro_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_res_registro_e').remove();
		$('#res_registro_e').parent().attr("class", "form-group has-success has-feedback");
		$('#res_registro_e').parent().children("span").text("").hide();
		$('#res_registro_e').parent().append('<span id="icono_res_registro_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarResPre_e(){  
	var valor = document.getElementById("res_pregunta_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null" || valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_res_pregunta_e').remove();
		$('#res_pregunta_e').parent().attr("class", "form-group has-error has-feedback");
		$('#res_pregunta_e').parent().append('<span id="icono_res_pregunta_e" class="icon-cross form-control-feedback mt-2" style="top:32px; rigth:10px;"></span>');
		$('#text_res_pregunta_e').text("Seleccione otra opcion").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_res_pregunta_e').remove();
		$('#res_pregunta_e').parent().attr("class", "form-group has-success has-feedback");
		$('#res_pregunta_e').parent().children("span").text("").hide();
		$('#res_pregunta_e').parent().append('<span id="icono_res_pregunta_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;  rigth:10px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarResRes_e(){  
	var valor = document.getElementById("res_respuesta_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null" || valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_res_respuesta_e').remove();
		$('#res_respuesta_e').parent().attr("class", "form-group has-error has-feedback");
		$('#res_respuesta_e').parent().append('<span id="icono_res_respuesta_e" class="icon-cross form-control-feedback mt-2" style="top:32px; rigth:10px;"></span>');
		$('#text_res_respuesta_e').text("Seleccione otra opcion").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_res_respuesta_e').remove();
		$('#res_respuesta_e').parent().attr("class", "form-group has-success has-feedback");
		$('#res_respuesta_e').parent().children("span").text("").hide();
		$('#res_respuesta_e').parent().append('<span id="icono_res_respuesta_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;  rigth:10px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarResJus_e(){  
	var valor = document.getElementById("res_justificacion_e").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_res_justificacion_e').remove();
		$('#res_justificacion_e').parent().attr("class", "form-group has-error has-feedback");
		$('#res_justificacion_e').parent().append('<span id="icono_res_justificacion_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_res_justificacion_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_res_justificacion_e').remove();
		$('#res_justificacion_e').parent().attr("class", "form-group has-success has-feedback");
		$('#res_justificacion_e').parent().children("span").text("").hide();
		$('#res_justificacion_e').parent().append('<span id="icono_res_justificacion_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}