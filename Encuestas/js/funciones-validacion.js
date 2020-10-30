$(document).ready(function(){

	$("#guardar_val").click(validarNuevoVal);
		$("#val_cali").change(validarValCali);
		$("#val_eval").change(validarValEval);
		$("#val_nombre").change(validarValNom);
		$("#val_estado").change(validarValEst);
		$("#val_area").change(validarValArea);
		$("#val_categoria").change(validarValCat);
		$("#val_tipo").change(validarValTipo);
		$("#val_periodo").change(validarValPer);

	$("#actualizar_val").click(validarNuevoVal_e);
		$("#val_cali_e").change(validarValCali_e);
		$("#val_eval_e").change(validarValEval_e);
		$("#val_nombre_e").change(validarValNom_e);
		$("#val_estado_e").change(validarValEst_e);
		$("#val_area_e").change(validarValArea_e);
		$("#val_categoria_e").change(validarValCat_e);
		$("#val_tipo_e").change(validarValTipo_e);
		$("#val_periodo_e").change(validarValPer_e);
		
}); 
function AgregarViewVal(datos){ 
	d = datos.split('||');
	$('#view_val_id').html(d[0]);
	$('#view_val_cali').html(d[1]);
	$('#view_val_eval').html(d[2]);
	$('#view_val_nom').html(d[3]);
	$('#view_val_val').html(d[4]);
	$('#view_val_area').html(d[5]);
	$('#view_val_cat').html(d[6]);
	$('#view_val_tipo').html(d[7]);
	$('#view_val_per').html(d[8]);
}  
function agregardatosVal(Calificador, Calificado, Nombre, Validacion, Area, Categoria, tipo, periodo){
	cadenaVal="Calificador=" + Calificador +
			  "&Calificado="+ Calificado+
			  "&Nombre="+ Nombre+
			  "&Validacion="+ Validacion+
			  "&Area="+ Area+
			  "&Categoria="+ Categoria+
			  "&tipo="+ tipo+
			  "&periodo="+ periodo;
	$.ajax({
		type:"post",
		url:"../../cuerpo/contenido/validacion/add.php",
		data:cadenaVal,
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
function agregarformVal(datos){
	d = datos.split('||');
	$('#idval_e').val(d[0]);
	$('#val_cali_e').val(d[1]);
	$('#val_eval_e').val(d[2]);
	$('#val_nombre_e').val(d[3]);
	$('#val_estado_e').val(d[4]);
	$('#val_area_e').val(d[5]);
	$('#val_categoria_e').val(d[6]);
	$('#val_tipo_e').val(d[7]);
	$('#val_periodo_e').val(d[8]);
}
function actualizaDatosVal(){
	id = $('#idval_e').val();
	
	Calificador = $('#val_cali_e').val();
	Calificado = $('#val_eval_e').val();
	Nombre = $('#val_nombre_e').val();
	Validacion = $('#val_estado_e').val();
	Area = $('#val_area_e').val();
	Categoria = $('#val_categoria_e').val();
	tipo = $('#val_tipo_e').val();
	periodo = $('#val_periodo_e').val();
    
	cadenarval=
    "id="+ id +
	"&Calificador=" + Calificador +
	"&Calificado=" + Calificado +
	"&Nombre=" + Nombre +
	"&Validacion="+ Validacion +
	"&Area=" + Area +
	"&Categoria=" + Categoria +
	"&tipo=" + tipo +
	"&periodo="+ periodo;
    
		   $.ajax({
			type:"post",
			url:"../../cuerpo/contenido/validacion/edit.php",
			data:cadenarval,
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
function preguntarVal(id){
 alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
 function(){ eliminarDatosVal(id) },
 function(){ alertify.error('Se cancelo')});
}
function eliminarDatosVal(id){
	cadena = "id="+id;
	$.ajax({
		type:"post",
		url:"../../cuerpo/contenido/validacion/delete.php",
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

function validarNuevoVal(){
	var	val_Calificador = validarValCali();
	var	val_Calificado = validarValEval();
	var	val_Nombre = validarValNom();
	var	val_Validacion = validarValEst();
	var	val_Area = validarValArea();
	var	val_Categoria = validarValCat();
	var	val_tipo = validarValTipo();
	var	val_periodo = validarValPer();

	if (val_Calificador=="true" && val_Calificado=="true" && val_Nombre=="true" && val_Validacion=="true" && val_Area=="true" && val_Categoria=="true" && val_tipo=="true" && val_periodo=="true") {
		alertify.success("Enviando datos...");

		Calificador = $('#val_cali').val();
		Calificado = $('#val_eval').val();
		Nombre = $('#val_nombre').val();
		Validacion = $('#val_estado').val();
		Area = $('#val_area').val();
		Categoria = $('#val_categoria').val();
		tipo = $('#val_tipo').val();
		periodo = $('#val_periodo').val();

		agregardatosVal(Calificador, Calificado, Nombre, Validacion, Area, Categoria, tipo, periodo);
	}else{
		console.log('Error al agregar informacion(Validar)');
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
function validarValCali(){  
			var valor = document.getElementById("val_cali").value;
			let numeros = /[0-9]{1,5}/;
			let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
			let espacios = /^\s$/;
			let estado  = "false";
		
			if( valor == null || valor.length == 0 || espacios.test(valor) ){
				$('#icono_val_cali').remove();
				$('#val_cali').parent().attr("class", "form-group has-error has-feedback");
				$('#val_cali').parent().append('<span id="icono_val_cali" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
				$('#text_val_cali').text("Ingrese un caracter").show();
				estado  = "false";
				console.log(estado);
			}else{
				$('#icono_val_cali').remove();
				$('#val_cali').parent().attr("class", "form-group has-success has-feedback");
				$('#val_cali').parent().children("span").text("").hide();
				$('#val_cali').parent().append('<span id="icono_val_cali" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
				estado  = "true";
				console.log(estado);
			}
			console.log("final :"+estado);
			return estado;
}
function validarValEval(){  
	var valor = document.getElementById("val_eval").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_val_eval').remove();
		$('#val_eval').parent().attr("class", "form-group has-error has-feedback");
		$('#val_eval').parent().append('<span id="icono_val_eval" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_val_eval').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_val_eval').remove();
		$('#val_eval').parent().attr("class", "form-group has-success has-feedback");
		$('#val_eval').parent().children("span").text("").hide();
		$('#val_eval').parent().append('<span id="icono_val_eval" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarValNom(){  
	var valor = document.getElementById("val_nombre").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_val_nombre').remove();
		$('#val_nombre').parent().attr("class", "form-group has-error has-feedback");
		$('#val_nombre').parent().append('<span id="icono_val_nombre" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_val_nombre').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_val_nombre').remove();
		$('#val_nombre').parent().attr("class", "form-group has-success has-feedback");
		$('#val_nombre').parent().children("span").text("").hide();
		$('#val_nombre').parent().append('<span id="icono_val_nombre" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarValEst(){  
	var valor = document.getElementById("val_estado").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_val_estado').remove();
		$('#val_estado').parent().attr("class", "form-group has-error has-feedback");
		$('#val_estado').parent().append('<span id="icono_val_estado" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_val_estado').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_val_estado').remove();
		$('#val_estado').parent().attr("class", "form-group has-success has-feedback");
		$('#val_estado').parent().children("span").text("").hide();
		$('#val_estado').parent().append('<span id="icono_val_estado" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarValArea(){  
	var valor = document.getElementById("val_area").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_val_area').remove();
		$('#val_area').parent().attr("class", "form-group has-error has-feedback");
		$('#val_area').parent().append('<span id="icono_val_area" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_val_area').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_val_area').remove();
		$('#val_area').parent().attr("class", "form-group has-success has-feedback");
		$('#val_area').parent().children("span").text("").hide();
		$('#val_area').parent().append('<span id="icono_val_area" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarValCat(){  
	var valor = document.getElementById("val_categoria").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_val_categoria').remove();
		$('#val_categoria').parent().attr("class", "form-group has-error has-feedback");
		$('#val_categoria').parent().append('<span id="icono_val_categoria" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_val_categoria').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_val_categoria').remove();
		$('#val_categoria').parent().attr("class", "form-group has-success has-feedback");
		$('#val_categoria').parent().children("span").text("").hide();
		$('#val_categoria').parent().append('<span id="icono_val_categoria" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarValTipo(){  
	var valor = document.getElementById("val_tipo").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_val_tipo').remove();
		$('#val_tipo').parent().attr("class", "form-group has-error has-feedback");
		$('#val_tipo').parent().append('<span id="icono_val_tipo" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_val_tipo').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_val_tipo').remove();
		$('#val_tipo').parent().attr("class", "form-group has-success has-feedback");
		$('#val_tipo').parent().children("span").text("").hide();
		$('#val_tipo').parent().append('<span id="icono_val_tipo" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarValPer(){  
	var valor = document.getElementById("val_periodo").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_val_periodo').remove();
		$('#val_periodo').parent().attr("class", "form-group has-error has-feedback");
		$('#val_periodo').parent().append('<span id="icono_val_periodo" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_val_periodo').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_val_periodo').remove();
		$('#val_periodo').parent().attr("class", "form-group has-success has-feedback");
		$('#val_periodo').parent().children("span").text("").hide();
		$('#val_periodo').parent().append('<span id="icono_val_periodo" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
//editar
function validarNuevoVal_e(){
	var	val_Calificador_e = validarValCali_e();
	var	val_Calificado_e = validarValEval_e();
	var	val_Nombre_e = validarValNom_e();
	var	val_Validacion_e = validarValEst_e();
	var	val_Area_e = validarValArea_e();
	var	val_Categoria_e = validarValCat_e();
	var	val_tipo_e = validarValTipo_e();
	var	val_periodo_e = validarValPer_e();

	if (val_Calificador_e=="true" && val_Calificado_e=="true" && val_Nombre_e=="true" && val_Validacion_e=="true" && val_Area_e=="true" && val_Categoria_e=="true" && val_tipo_e=="true" && val_periodo_e=="true") {
		alertify.success("Enviando datos...");
		actualizaDatosVal();
	}else{
		console.log('Error al agregar informacion(Validar)');
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
function validarValCali_e(){  
			var valor = document.getElementById("val_cali_e").value;
			let numeros = /[0-9]{1,5}/;
			let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
			let espacios = /^\s$/;
			let estado  = "false";
		
			if( valor == null || valor.length == 0 || espacios.test(valor) ){
				$('#icono_val_cali_e').remove();
				$('#val_cali_e').parent().attr("class", "form-group has-error has-feedback");
				$('#val_cali_e').parent().append('<span id="icono_val_cali_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
				$('#text_val_cali_e').text("Ingrese un caracter").show();
				estado  = "false";
				console.log(estado);
			}else{
				$('#icono_val_cali_e').remove();
				$('#val_cali_e').parent().attr("class", "form-group has-success has-feedback");
				$('#val_cali_e').parent().children("span").text("").hide();
				$('#val_cali_e').parent().append('<span id="icono_val_cali_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
				estado  = "true";
				console.log(estado);
			}
			console.log("final :"+estado);
			return estado;
}
function validarValEval_e(){  
	var valor = document.getElementById("val_eval_e").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_val_eval_e').remove();
		$('#val_eval_e').parent().attr("class", "form-group has-error has-feedback");
		$('#val_eval_e').parent().append('<span id="icono_val_eval_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_val_eval_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_val_eval_e').remove();
		$('#val_eval_e').parent().attr("class", "form-group has-success has-feedback");
		$('#val_eval_e').parent().children("span").text("").hide();
		$('#val_eval_e').parent().append('<span id="icono_val_eval_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarValNom_e(){  
	var valor = document.getElementById("val_nombre_e").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_val_nombre_e').remove();
		$('#val_nombre_e').parent().attr("class", "form-group has-error has-feedback");
		$('#val_nombre_e').parent().append('<span id="icono_val_nombre_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_val_nombre_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_val_nombre_e').remove();
		$('#val_nombre_e').parent().attr("class", "form-group has-success has-feedback");
		$('#val_nombre_e').parent().children("span").text("").hide();
		$('#val_nombre_e').parent().append('<span id="icono_val_nombre_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarValEst_e(){  
	var valor = document.getElementById("val_estado_e").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_val_estado_e').remove();
		$('#val_estado_e').parent().attr("class", "form-group has-error has-feedback");
		$('#val_estado_e').parent().append('<span id="icono_val_estado_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_val_estado_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_val_estado_e').remove();
		$('#val_estado_e').parent().attr("class", "form-group has-success has-feedback");
		$('#val_estado_e').parent().children("span").text("").hide();
		$('#val_estado_e').parent().append('<span id="icono_val_estado_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarValArea_e(){  
	var valor = document.getElementById("val_area_e").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_val_area_e').remove();
		$('#val_area_e').parent().attr("class", "form-group has-error has-feedback");
		$('#val_area_e').parent().append('<span id="icono_val_area_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_val_area_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_val_area_e').remove();
		$('#val_area_e').parent().attr("class", "form-group has-success has-feedback");
		$('#val_area_e').parent().children("span").text("").hide();
		$('#val_area_e').parent().append('<span id="icono_val_area_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarValCat_e(){  
	var valor = document.getElementById("val_categoria_e").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_val_categoria_e').remove();
		$('#val_categoria_e').parent().attr("class", "form-group has-error has-feedback");
		$('#val_categoria_e').parent().append('<span id="icono_val_categoria_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_val_categoria_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_val_categoria_e').remove();
		$('#val_categoria_e').parent().attr("class", "form-group has-success has-feedback");
		$('#val_categoria_e').parent().children("span").text("").hide();
		$('#val_categoria_e').parent().append('<span id="icono_val_categoria_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarValTipo_e(){  
	var valor = document.getElementById("val_tipo_e").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_val_tipo_e').remove();
		$('#val_tipo_e').parent().attr("class", "form-group has-error has-feedback");
		$('#val_tipo_e').parent().append('<span id="icono_val_tipo_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_val_tipo_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_val_tipo_e').remove();
		$('#val_tipo_e').parent().attr("class", "form-group has-success has-feedback");
		$('#val_tipo_e').parent().children("span").text("").hide();
		$('#val_tipo_e').parent().append('<span id="icono_val_tipo_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarValPer_e(){  
	var valor = document.getElementById("val_periodo_e").value;
	let numeros = /[0-9]{1,5}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{1,5}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_val_periodo_e').remove();
		$('#val_periodo_e').parent().attr("class", "form-group has-error has-feedback");
		$('#val_periodo_e').parent().append('<span id="icono_val_periodo_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_val_periodo_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_val_periodo_e').remove();
		$('#val_periodo_e').parent().attr("class", "form-group has-success has-feedback");
		$('#val_periodo_e').parent().children("span").text("").hide();
		$('#val_periodo_e').parent().append('<span id="icono_val_periodo_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
