$(document).ready(function(){

	$("#guardar_usu").click(validarNuevoUsu);
		$("#usu_area").change(validarUsuArea);
		$("#usu_nombre").keyup(validarUsuNom);
		$("#usu_pass").keyup(validarUsuPass);
		$("#usu_permiso").change(validarUsuPer);

	$("#actualizar_usu").click(validarNuevoUsu_e);
		$("#usu_area_e").change(validarUsuArea_e);
		$("#usu_nombre_e").keyup(validarUsuNom_e);
		$("#usu_pass_e").keyup(validarUsuPass_e);
		$("#usu_permiso_e").change(validarUsuPer_e);
		
}); 
function AgregarViewUsu(datos){ 
	d = datos.split('||');
	$('#view_usu_id').html(d[0]);
	$('#view_usu_area').html(d[1]);
	$('#view_usu_nombre').html(d[2]);
	$('#view_usu_clave').html(d[3]);
	$('#view_usu_permiso').html(d[4]);
}  
function agregardatosUsu(id_area, nombre, clave, permiso){
	cadenaUsu="id_area=" + id_area +
			  "&nombre="+ nombre+
			  "&clave="+ clave+
			  "&permiso="+ permiso;
	$.ajax({
		type:"post",
		url:"../../cuerpo/contenido/usuarios/add.php",
		data:cadenaUsu,
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
	$('#contenedor_usuario').load('../../cuerpo/contenido/usuarios/tabla.php');  

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
function agregarformUsu(datos){
	d = datos.split('||');
	$('#idusu_e').val(d[0]);

	$('#usu_area_e').val(d[1]);
	$('#usu_nombre_e').val(d[2]);
	$('#usu_pass_e').val(d[3]);
	$('#usu_permiso_e').val(d[4]);
}
function actualizaDatosUsu(){
	id = $('#idusu_e').val();
	
	id_area = $('#usu_area_e').val();
	nombre = $('#usu_nombre_e').val();
	clave = $('#usu_pass_e').val();
	permiso = $('#usu_permiso_e').val();
    
	cadenarusu=
    "id="+ id +
	"&id_area=" + id_area +
	"&nombre=" + nombre +
	"&clave=" + clave +
	"&permiso="+ permiso;
    
		   $.ajax({
			type:"post",
			url:"../../cuerpo/contenido/usuarios/edit.php",
			data:cadenarusu,
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
    $('#contenedor_usuario').load('../../cuerpo/contenido/usuarios/tabla.php');  

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
function preguntarUsu(id){
 alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
 function(){ eliminarDatosUsu(id) },
 function(){ alertify.error('Se cancelo')});
}
function eliminarDatosUsu(id){
	cadena = "id="+id;
	$.ajax({
		type:"post",
		url:"../../cuerpo/contenido/usuarios/delete.php",
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
    $('#contenedor_usuario').load('../../cuerpo/contenido/usuarios/tabla.php');  

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

function validarNuevoUsu(){
	var UsuArea = validarUsuArea();
	var UsuNom = validarUsuNom();
	var UsuPass = validarUsuPass();
	var UsuPer = validarUsuPer();

	if (UsuArea=="true" && UsuNom=="true" && UsuPass=="true" && UsuPer=="true") {
		alertify.success("Enviando datos...");

		usu_area = $('#usu_area').val();
		usu_nombre = $('#usu_nombre').val();
		usu_pass = $('#usu_pass').val();
		usu_permiso = $('#usu_permiso').val();

		agregardatosUsu(usu_area, usu_nombre, usu_pass, usu_permiso);
	}else{
		console.log('Error al agregar informacion(Usuario)');
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
function validarUsuArea(){  
	var valor = document.getElementById("usu_area").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_usu_area').remove();
		$('#usu_area').parent().attr("class", "form-group has-error has-feedback");
		$('#usu_area').parent().append('<span id="icono_usu_area" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_usu_area').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_usu_area').remove();
		$('#usu_area').parent().attr("class", "form-group has-success has-feedback");
		$('#usu_area').parent().children("span").text("").hide();
		$('#usu_area').parent().append('<span id="icono_usu_area" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarUsuNom(){  
	var valor = document.getElementById("usu_nombre").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_usu_nombre').remove();
		$('#usu_nombre').parent().attr("class", "form-group has-error has-feedback");
		$('#usu_nombre').parent().append('<span id="icono_usu_nombre" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_usu_nombre').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_usu_nombre').remove();
		$('#usu_nombre').parent().attr("class", "form-group has-success has-feedback");
		$('#usu_nombre').parent().children("span").text("").hide();
		$('#usu_nombre').parent().append('<span id="icono_usu_nombre" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarUsuPass(){  
	var valor = document.getElementById("usu_pass").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_usu_pass').remove();
		$('#usu_pass').parent().attr("class", "form-group has-error has-feedback");
		$('#usu_pass').parent().append('<span id="icono_usu_pass" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_usu_pass').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_usu_pass').remove();
		$('#usu_pass').parent().attr("class", "form-group has-success has-feedback");
		$('#usu_pass').parent().children("span").text("").hide();
		$('#usu_pass').parent().append('<span id="icono_usu_pass" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarUsuPer(){  
	var valor = document.getElementById("usu_permiso").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_usu_permiso').remove();
		$('#usu_permiso').parent().attr("class", "form-group has-error has-feedback");
		$('#usu_permiso').parent().append('<span id="icono_usu_permiso" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_usu_permiso').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_usu_permiso').remove();
		$('#usu_permiso').parent().attr("class", "form-group has-success has-feedback");
		$('#usu_permiso').parent().children("span").text("").hide();
		$('#usu_permiso').parent().append('<span id="icono_usu_permiso" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
//editar
function validarNuevoUsu_e(){
	var UsuArea_e = validarUsuArea_e();
	var UsuNom_e = validarUsuNom_e();
	var UsuPass_e = validarUsuPass_e();
	var UsuPer_e = validarUsuPer_e();

	if (UsuArea_e=="true" && UsuNom_e=="true" && UsuPass_e=="true" && UsuPer_e=="true") {
		alertify.success("Enviando datos...");
		actualizaDatosUsu();
	}else{
		console.log('Error al agregar informacion(Usuario)');
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
function validarUsuArea_e(){  
	var valor = document.getElementById("usu_area_e").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_usu_area_e').remove();
		$('#usu_area_e').parent().attr("class", "form-group has-error has-feedback");
		$('#usu_area_e').parent().append('<span id="icono_usu_area_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_usu_area_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_usu_area_e').remove();
		$('#usu_area_e').parent().attr("class", "form-group has-success has-feedback");
		$('#usu_area_e').parent().children("span").text("").hide();
		$('#usu_area_e').parent().append('<span id="icono_usu_area_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarUsuNom_e(){  
	var valor = document.getElementById("usu_nombre_e").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_usu_nombre_e').remove();
		$('#usu_nombre_e').parent().attr("class", "form-group has-error has-feedback");
		$('#usu_nombre_e').parent().append('<span id="icono_usu_nombre_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_usu_nombre_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_usu_nombre_e').remove();
		$('#usu_nombre_e').parent().attr("class", "form-group has-success has-feedback");
		$('#usu_nombre_e').parent().children("span").text("").hide();
		$('#usu_nombre_e').parent().append('<span id="icono_usu_nombre_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarUsuPass_e(){  
	var valor = document.getElementById("usu_pass_e").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_usu_pass_e').remove();
		$('#usu_pass_e').parent().attr("class", "form-group has-error has-feedback");
		$('#usu_pass_e').parent().append('<span id="icono_usu_pass_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_usu_pass_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_usu_pass_e').remove();
		$('#usu_pass_e').parent().attr("class", "form-group has-success has-feedback");
		$('#usu_pass_e').parent().children("span").text("").hide();
		$('#usu_pass_e').parent().append('<span id="icono_usu_pass_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarUsuPer_e(){  
	var valor = document.getElementById("usu_permiso_e").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_usu_permiso_e').remove();
		$('#usu_permiso_e').parent().attr("class", "form-group has-error has-feedback");
		$('#usu_permiso_e').parent().append('<span id="icono_usu_permiso_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_usu_permiso_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_usu_permiso_e').remove();
		$('#usu_permiso_e').parent().attr("class", "form-group has-success has-feedback");
		$('#usu_permiso_e').parent().children("span").text("").hide();
		$('#usu_permiso_e').parent().append('<span id="icono_usu_permiso_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}