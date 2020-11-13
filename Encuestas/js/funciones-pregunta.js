$(document).ready(function(){

	$("#guardar_pre").click(validarNuevaPre);
		$("#pre_competencia").change(validarPreCom);
		$("#pre_area").change(validarPreArea);
		$("#pre_categoria").change(validarPreCat);
		$("#pre_descripcion").keyup(validarPreDesc);

	$("#actualizar_pre").click(validarNuevaPre_e);
		$("#pre_competencia_e").change(validarPreCom_e);
		$("#pre_area_e").change(validarPreArea_e);
		$("#pre_categoria_e").change(validarPreCat_e);
		$("#pre_descripcion_e").keyup(validarPreDesc_e);
		
}); 
function AgregarViewPre(datos){ 
	d = datos.split('||');
	$('#view_pre_id').html(d[0]);
	$('#view_pre_competencia').html(d[1]);
	$('#view_pre_area').html(d[2]);
	$('#view_pre_categoria').html(d[3]);
	$('#view_pre_descripcion').html(d[4]);
}  
function agregardatosPre(competencia, area, categoria, descripcion){
	cadenaCon="competencia=" + competencia +
			  "&id_area="+ area+
			  "&categoria="+ categoria+
			  "&descripcion="+ descripcion;
	$.ajax({
		type:"post",
		url:"../../cuerpo/contenido/pregunta/add.php",
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
function agregarformPre(datos){
	d = datos.split('||');
	$('#idpre_e').val(d[0]);
	$('#pre_competencia_e').val(d[1]);
	$('#pre_area_e').val(d[2]);
	$('#pre_categoria_e').val(d[3]);
	$('#pre_descripcion_e').val(d[4]);
}
function actualizaDatosPre(){
    id = $('#idpre_e').val();
	competencia = $('#pre_competencia_e').val();
	id_area = $('#pre_area_e').val();
	categoria = $('#pre_categoria_e').val();
	descripcion = $('#pre_descripcion_e').val();
    
	cadenapre=
    "id="+ id +
	"&competencia=" + competencia +
	"&id_area=" + id_area +
	"&categoria=" + categoria +
	"&descripcion="+ descripcion;
    
		   $.ajax({
			type:"post",
			url:"../../cuerpo/contenido/pregunta/edit.php",
			data:cadenapre,
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
function preguntarPre(id){
 alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
 function(){ eliminarDatosPre(id) },
 function(){ alertify.error('Se cancelo')});
}
function eliminarDatosPre(id){
	cadena = "id="+id;
	$.ajax({
		type:"post",
		url:"../../cuerpo/contenido/pregunta/delete.php",
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

function validarNuevaPre(){
	var Pre_com = validarPreCom();
	var Pre_Area = validarPreArea();
	var Pre_Cat = validarPreCat();
	var Pre_Desc = validarPreDesc();

	if (Pre_com=="true" && Pre_Area=="true" && Pre_Cat=="true" && Pre_Desc=="true") {
		alertify.success("Enviando datos...");

		competencia = $('#pre_competencia').val();
		area = $('#pre_area').val();
		categoria = $('#pre_categoria').val();
		descripcion = $('#pre_descripcion').val();

		agregardatosPre(competencia, area, categoria, descripcion);
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
function validarPreCom(){  
	var valor = document.getElementById("pre_competencia").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null" || valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_pre_competencia').remove();
		$('#pre_competencia').parent().attr("class", "form-group has-error has-feedback");
		$('#pre_competencia').parent().append('<span id="icono_pre_competencia" class="icon-cross form-control-feedback mt-2" style="top:32px; rigth:10px;"></span>');
		$('#text_pre_competencia').text("Seleccione otra opcion").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_pre_competencia').remove();
		$('#pre_competencia').parent().attr("class", "form-group has-success has-feedback");
		$('#pre_competencia').parent().children("span").text("").hide();
		$('#pre_competencia').parent().append('<span id="icono_pre_competencia" class="icon-checkmark form-control-feedback mt-2" style="top:32px;  rigth:10px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarPreArea(){  
	var valor = document.getElementById("pre_area").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null" || valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_pre_area').remove();
		$('#pre_area').parent().attr("class", "form-group has-error has-feedback");
		$('#pre_area').parent().append('<span id="icono_pre_area" class="icon-cross form-control-feedback mt-2" style="top:32px; rigth:10px;"></span>');
		$('#text_pre_area').text("Seleccione otra opcion").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_pre_area').remove();
		$('#pre_area').parent().attr("class", "form-group has-success has-feedback");
		$('#pre_area').parent().children("span").text("").hide();
		$('#pre_area').parent().append('<span id="icono_pre_area" class="icon-checkmark form-control-feedback mt-2" style="top:32px;  rigth:10px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarPreCat(){  
	var valor = document.getElementById("pre_categoria").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null" || valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_pre_categoria').remove();
		$('#pre_categoria').parent().attr("class", "form-group has-error has-feedback");
		$('#pre_categoria').parent().append('<span id="icono_pre_categoria" class="icon-cross form-control-feedback mt-2" style="top:32px; rigth:10px;"></span>');
		$('#text_pre_area').text("Seleccione otra opcion").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_pre_categoria').remove();
		$('#pre_categoria').parent().attr("class", "form-group has-success has-feedback");
		$('#pre_categoria').parent().children("span").text("").hide();
		$('#pre_categoria').parent().append('<span id="icono_pre_categoria" class="icon-checkmark form-control-feedback mt-2" style="top:32px;  rigth:10px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarPreDesc(){  
	var valor = document.getElementById("pre_descripcion").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_pre_descripcion').remove();
		$('#pre_descripcion').parent().attr("class", "form-group has-error has-feedback");
		$('#pre_descripcion').parent().append('<span id="icono_pre_descripcion" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_con_fecha').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_pre_descripcion').remove();
		$('#pre_descripcion').parent().attr("class", "form-group has-success has-feedback");
		$('#pre_descripcion').parent().children("span").text("").hide();
		$('#pre_descripcion').parent().append('<span id="icono_pre_descripcion" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}

/*editar*/

function validarNuevaPre_e(){
	var Pre_com_e = validarPreCom_e();
	var Pre_Area_e = validarPreArea_e();
	var Pre_Cat_e = validarPreCat_e();
	var Pre_Desc_e = validarPreDesc_e();

	if (Pre_com_e=="true" && Pre_Area_e=="true" && Pre_Cat_e=="true" && Pre_Desc_e=="true") {
		alertify.success("Enviando datos...");

		actualizaDatosPre();
	}else{
		console.log('Error al editar informacion(Pregunta)');
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
function validarPreCom_e(){  
	var valor = document.getElementById("pre_competencia_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null" || valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_pre_competencia_e').remove();
		$('#pre_competencia_e').parent().attr("class", "form-group has-error has-feedback");
		$('#pre_competencia_e').parent().append('<span id="icono_pre_competencia_e" class="icon-cross form-control-feedback mt-2" style="top:32px; rigth:10px;"></span>');
		$('#text_pre_competencia_e').text("Seleccione otra opcion").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_pre_competencia_e').remove();
		$('#pre_competencia_e').parent().attr("class", "form-group has-success has-feedback");
		$('#pre_competencia_e').parent().children("span").text("").hide();
		$('#pre_competencia_e').parent().append('<span id="icono_pre_competencia_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;  rigth:10px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarPreArea_e(){  
	var valor = document.getElementById("pre_area_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null" || valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_pre_area_e').remove();
		$('#pre_area_e').parent().attr("class", "form-group has-error has-feedback");
		$('#pre_area_e').parent().append('<span id="icono_pre_area_e" class="icon-cross form-control-feedback mt-2" style="top:32px; rigth:10px;"></span>');
		$('#text_pre_area_e').text("Seleccione otra opcion").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_pre_area_e').remove();
		$('#pre_area_e').parent().attr("class", "form-group has-success has-feedback");
		$('#pre_area_e').parent().children("span").text("").hide();
		$('#pre_area_e').parent().append('<span id="icono_pre_area_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;  rigth:10px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarPreCat_e(){  
	var valor = document.getElementById("pre_categoria_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null" || valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_pre_categoria').remove();
		$('#pre_categoria_e').parent().attr("class", "form-group has-error has-feedback");
		$('#pre_categoria_e').parent().append('<span id="icono_pre_categoria_e" class="icon-cross form-control-feedback mt-2" style="top:32px; rigth:10px;"></span>');
		$('#text_pre_area_e').text("Seleccione otra opcion").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_pre_categoria_e').remove();
		$('#pre_categoria_e').parent().attr("class", "form-group has-success has-feedback");
		$('#pre_categoria_e').parent().children("span").text("").hide();
		$('#pre_categoria_e').parent().append('<span id="icono_pre_categoria_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;  rigth:10px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarPreDesc_e(){  
	var valor = document.getElementById("pre_descripcion_e").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_pre_descripcion_e').remove();
		$('#pre_descripcion_e').parent().attr("class", "form-group has-error has-feedback");
		$('#pre_descripcion_e').parent().append('<span id="icono_pre_descripcion_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_con_fecha_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_pre_descripcion_e').remove();
		$('#pre_descripcion_e').parent().attr("class", "form-group has-success has-feedback");
		$('#pre_descripcion_e').parent().children("span").text("").hide();
		$('#pre_descripcion_e').parent().append('<span id="icono_pre_descripcion_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}