$(document).ready(function(){

	$("#guardar_com").click(validarNuevaCom);
		$("#com_codigo").keyup(validarComCodigo);
		$("#com_nombre").keyup(validarComNombre);
		$("#com_desc").keyup(validarComDesc);

	$("#actualizar_com").click(validarNuevaCom_e);
		$("#com_codigo_e").keyup(validarComCodigo_e);
		$("#com_nombre_e").keyup(validarComNombre_e);
		$("#com_desc_e").keyup(validarComDesc_e);


		
}); 

function AgregarViewCom(datos){ 
	d = datos.split('||');
	$('#view_com_id').html(d[0]);
	$('#view_com_codigo').html(d[1]);
	$('#view_com_nombre').html(d[2]);
	$('#view_com_desc').html(d[3]);
}
function agregardatosCom(codigo, nombre, desc){
	cadenaCom="codigo=" + codigo +
			"&nombre="+ nombre +
			"&desc=" + desc;
	$.ajax({
		type:"post",
		url:"../../cuerpo/contenido/competencias/add.php",
		data:cadenaCom,
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
    $('#contenedor_validacion').load('../../cuerpo/contenido/validacion/tabla.php');  
    $('#contenedor_encuestas_faltantes').load('../../cuerpo/contenido/validacion/tabla_individual.php');
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
function agregarformCom(datos){
	d = datos.split('||');
	$('#idcom_e').val(d[0]);
	$('#com_codigo_e').val(d[1]);
	$('#com_nombre_e').val(d[2]);
	$('#com_desc_e').val(d[2]);
}
function actualizaDatosCom(){
    id = $('#idcom_e').val();
	codigo = $('#com_codigo_e').val();
	nombre = $('#com_nombre_e').val();
	desc = $('#com_desc_e').val();
    
	cadenaco=
    "id="+ id +
	"&codigo=" + codigo +
	"&nombre=" + nombre +
	"&desc="+ desc;
    
		   $.ajax({
			type:"post",
			url:"../../cuerpo/contenido/competencias/edit.php",
			data:cadenaco,
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
    $('#contenedor_validacion').load('../../cuerpo/contenido/validacion/tabla.php');  
    $('#contenedor_encuestas_faltantes').load('../../cuerpo/contenido/validacion/tabla_individual.php'); 
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
function preguntarCom(id){
 alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
 function(){ eliminarDatosCom(id) },
 function(){ alertify.error('Se cancelo')});
}
function eliminarDatosCom(id){
	cadena = "id="+id;
	$.ajax({
		type:"post",
		url:"../../cuerpo/contenido/competencias/delete.php",
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
    $('#contenedor_validacion').load('../../cuerpo/contenido/validacion/tabla.php');  
    $('#contenedor_encuestas_faltantes').load('../../cuerpo/contenido/validacion/tabla_individual.php');
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
//añadir
function validarNuevaCom(){
	var Com_codigo = validarComCodigo();
	var Com_nombre = validarComNombre();
	var Com_desc = validarComDesc();

	if (Com_codigo=="true" && Com_nombre=="true" && Com_desc=="true") {
		alertify.success("Enviando datos...");
		codigo = $('#com_codigo').val();
		nombre = $('#com_nombre').val();
		desc = $('#com_desc').val();
		agregardatosCom(codigo, nombre, desc);
	}else{
		console.log('Error al agregar informacion(Competencias)');
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
function validarComCodigo(){  
	var valor = document.getElementById("com_codigo").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ0-9]{2,10}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ0-9]{0,10}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ0-9]{0,10}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_com_codigo').remove();
		$('#com_codigo').parent().attr("class", "form-group has-error has-feedback");
		$('#com_codigo').parent().append('<span id="icono_com_codigo" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_com_codigo').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_com_codigo').remove();
		$('#com_codigo').parent().attr("class", "form-group has-error has-feedback");
		$('#com_codigo').parent().append('<span id="icono_com_codigo" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_com_codigo').text("Longitud no valida 2-10").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_com_codigo').remove();
		$('#com_codigo').parent().attr("class", "form-group has-success has-feedback");
		$('#com_codigo').parent().children("span").text("").hide();
		$('#com_codigo').parent().append('<span id="icono_com_codigo" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarComNombre(){  
	var valor = document.getElementById("com_nombre").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ0-9]{5,50}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ0-9]{0,50}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ0-9]{0,50}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_com_nombre').remove();
		$('#com_nombre').parent().attr("class", "form-group has-error has-feedback");
		$('#com_nombre').parent().append('<span id="icono_com_nombre" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_com_nombre').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_com_nombre').remove();
		$('#com_nombre').parent().attr("class", "form-group has-error has-feedback");
		$('#com_nombre').parent().append('<span id="icono_com_nombre" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_com_nombre').text("Longitud no valida 5-50").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_com_nombre').remove();
		$('#com_nombre').parent().attr("class", "form-group has-success has-feedback");
		$('#com_nombre').parent().children("span").text("").hide();
		$('#com_nombre').parent().append('<span id="icono_com_nombre" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarComDesc(){  
	var valor = document.getElementById("com_desc").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ0-9]{5,50}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ0-9]{0,50}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ0-9]{0,50}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_com_desc').remove();
		$('#com_desc').parent().attr("class", "form-group has-error has-feedback");
		$('#com_desc').parent().append('<span id="icono_com_desc" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_com_desc').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_com_desc').remove();
		$('#com_desc').parent().attr("class", "form-group has-error has-feedback");
		$('#com_desc').parent().append('<span id="icono_com_desc" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_com_desc').text("Longitud no valida 5-50").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_com_desc').remove();
		$('#com_desc').parent().attr("class", "form-group has-success has-feedback");
		$('#com_desc').parent().children("span").text("").hide();
		$('#com_desc').parent().append('<span id="icono_com_desc" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
//editar
function validarNuevaCom_e(){
	var Com_codigo_e = validarComCodigo_e();
	var Com_nombre_e = validarComNombre_e();
	var Com_desc_e = validarComDesc_e();

	if (Com_codigo_e=="true" && Com_nombre_e=="true" && Com_desc_e=="true") {
		alertify.success("Enviando datos...");
		actualizaDatosCom();
	}else{
		console.log('Error al agregar informacion(Competencias)');
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

function validarComCodigo_e(){  
	var valor = document.getElementById("com_codigo_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ0-9]{2,10}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ0-9]{0,10}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ0-9]{0,10}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_com_codigo_e').remove();
		$('#com_codigo_e').parent().attr("class", "form-group has-error has-feedback");
		$('#com_codigo_e').parent().append('<span id="icono_com_codigo_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_com_codigo_e').text("Ingrese un caracter_e").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_com_codigo_e').remove();
		$('#com_codigo_e').parent().attr("class", "form-group has-error has-feedback");
		$('#com_codigo_e').parent().append('<span id="icono_com_codigo_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_com_codigo_e').text("Longitud no valida 2-10").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_com_codigo_e').remove();
		$('#com_codigo_e').parent().attr("class", "form-group has-success has-feedback");
		$('#com_codigo_e').parent().children("span").text("").hide();
		$('#com_codigo_e').parent().append('<span id="icono_com_codigo_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarComNombre_e(){  
	var valor = document.getElementById("com_nombre_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ0-9]{5,50}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ0-9]{0,50}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ0-9]{0,50}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_com_nombre_e').remove();
		$('#com_nombre_e').parent().attr("class", "form-group has-error has-feedback");
		$('#com_nombre_e').parent().append('<span id="icono_com_nombre_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_com_nombre_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_com_nombre_e').remove();
		$('#com_nombre_e').parent().attr("class", "form-group has-error has-feedback");
		$('#com_nombre_e').parent().append('<span id="icono_com_nombre_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_com_nombre_e').text("Longitud no valida 5-50").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_com_nombre_e').remove();
		$('#com_nombre_e').parent().attr("class", "form-group has-success has-feedback");
		$('#com_nombre_e').parent().children("span").text("").hide();
		$('#com_nombre_e').parent().append('<span id="icono_com_nombre_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarComDesc_e(){  
	var valor = document.getElementById("com_desc_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ0-9]{5,50}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ0-9]{0,50}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ0-9]{0,50}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_com_desc_e').remove();
		$('#com_desc_e').parent().attr("class", "form-group has-error has-feedback");
		$('#com_desc_e').parent().append('<span id="icono_com_desc_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_com_desc_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_com_desc_e').remove();
		$('#com_desc_e').parent().attr("class", "form-group has-error has-feedback");
		$('#com_desc_e').parent().append('<span id="icono_com_desc_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_com_desc_e').text("Longitud no valida 5-50").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_com_desc_e').remove();
		$('#com_desc_e').parent().attr("class", "form-group has-success has-feedback");
		$('#com_desc_e').parent().children("span").text("").hide();
		$('#com_desc_e').parent().append('<span id="icono_com_desc_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}