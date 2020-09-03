function AgregarViewCat(datos){ 
d = datos.split('||');
 a = " - ".concat(d[2]);
 area = d[1].concat(a);
	$('#view_cat_id').html(d[0]);
	$('#view_cat_area').html(area);
	$('#view_cat_nombre').html(d[3]);
    $('#view_cat_desc').html(d[4]);
	$('#view_cat_sueldo').html(d[5]);
	$('#view_cat_comentarios').html(d[6]);
}

function agregardatosCat(idac, nombrec, descc, sueldoc, comentariosc){
	cadenacat="id=" + idac +
		   "&nombre=" + nombrec +
           "&descc=" + descc +
		   "&sueldo=" + sueldoc+
		   "&comentaarios=" + comentariosc
        ;
	$.ajax({
		type:"post",
		url:"../contenido/categoria/add.php",
		data:cadenacat,
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
			  //alert('fallo');
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

function agregarformCat(datos){
    d = datos.split('||');
 
	$('#idCatact').val(d[0]);
	$('#Cat_idarea').val(d[1]);
	$('#Cat_nombre_act').val(d[2]);
    $('#Cat_descripcion_act').val(d[3]);
	$('#Cat_sueldo_act').val(d[4]);
	$('#Cat_comentarios_act').val(d[5]);
}

function actualizaDatosCat(){
    id=$('#idCatact').val();
	ida=$('#Cat_idarea').val();
	nombre=$('#Cat_nombre_act').val();
    desc=$('#Cat_descripcion_act').val();
	sueldo=$('#Cat_sueldo_act').val();
	comentarios= $('#Cat_comentarios_act').val();
    
	cadenaACT=
    "id="+ id +
	"&ida=" +ida+
	"&nombre="+nombre+
    "&desc="+desc+
	"&sueldo="+sueldo+
	"&comentarios=" + comentarios;
    
		   $.ajax({
			type:"post",
			url:"../contenido/categoria/edit.php",
			data:cadenaACT,
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
				  //alert('fallo');
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

function preguntarCat(id){
 alertify.confirm('Emininar Datos', '¿Esta seguro de eliminar este registro?', 
 function(){ eliminarDatosCat(id) },
 function(){ alertify.error('Se cancelo')});
}
 
function eliminarDatosCat(id){
	cadena = "id="+id;
	$.ajax({
		type:"post",
		url:"../contenido/categoria/delete.php",
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
	$("#guardar_categoria").click(validarNuevoCategoria);

		$("#Cat_nombre").keyup(validarNombreCat);
		$("#Cat_descripcion").keyup(validarDescCat);
		$("#Cat_sueldo").keyup(validarSueldoCat);

	$("#actualizar_categoria").click(validarNuevoCategoria_E);

	$("#Cat_nombre_act").keyup(validarNombreCat_E);
	$("#Cat_descripcion_act").keyup(validarDescCat_E);
	$("#Cat_sueldo_act").keyup(validarSueldoCat_E);
		
});

function validarNuevoCategoria(){
	var nombre = validarNombreCat();
	var desc = validarDescCat();
	var sueldo = validarSueldoCat();

	if (nombre=="true" && desc=="true" && sueldo=="true") {
	 alertify.success("Enviando datos...");
		idac = $('#Cat_idarea').val();
		nombrec = $('#Cat_nombre').val();
		descc = $('#Cat_descripcion').val();
		sueldoc = $('#Cat_sueldo').val();
	 agregardatosCat(idac, nombrec, descc, sueldoc);

	} else{
		alertify.error('Favor de revisar datos');
	}
}
function validarNombreCat(){  
	var valor = document.getElementById("Cat_nombre").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{4,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_cat_nom').remove();
		$('#Cat_nombre').parent().attr("class", "form-group has-error has-feedback");
		$('#Cat_nombre').parent().append('<span id="icono_cat_nom" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_cat_nom').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_cat_nom').remove();
		$('#Cat_nombre').parent().attr("class", "form-group has-error has-feedback");
		$('#Cat_nombre').parent().append('<span id="icono_cat_nom" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_cat_nom').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_cat_nom').remove();
		$('#Cat_nombre').parent().attr("class", "form-group has-error has-feedback");
		$('#Cat_nombre').parent().append('<span id="icono_cat_nom" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_cat_nom').text("Longitud no valida 4-30").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_cat_nom').remove();
		$('#Cat_nombre').parent().attr("class", "form-group has-success has-feedback");
		$('#Cat_nombre').parent().children("span").text("").hide();
		$('#Cat_nombre').parent().append('<span id="icono_cat_nom" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarDescCat(){  
	var valor = document.getElementById("Cat_descripcion").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_cat_desc').remove();
		$('#Cat_descripcion').parent().attr("class", "form-group has-error has-feedback");
		$('#Cat_descripcion').parent().append('<span id="icono_cat_desc" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_cat_desc').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_cat_desc').remove();
		$('#Cat_descripcion').parent().attr("class", "form-group has-success has-feedback");
		$('#Cat_descripcion').parent().children("span").text("").hide();
		$('#Cat_descripcion').parent().append('<span id="icono_cat_desc" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarSueldoCat(){
	var valor = document.getElementById("Cat_sueldo").value;
	let numeros = /[0-9]{4,10}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) || valor.length > 10){
		$('#icono_cat_sueldo').remove();
		$('#Cat_sueldo').parent().attr("class", "form-group has-error has-feedback");
		$('#Cat_sueldo').parent().append('<span id="icono_cat_sueldo" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_cat_sueldo').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( isNaN(valor) ){
		$('#icono_cat_sueldo').remove();
		$('#Cat_sueldo').parent().attr("class", "form-group has-error has-feedback");
		$('#Cat_sueldo').parent().append('<span id="icono_cat_sueldo" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_cat_sueldo').text("Caracter no valido").show();
		estado  = "false";
		console.log(estado);
	}else if( numeros.test(valor)==false){
		$('#icono_cat_sueldo').remove();
		$('#Cat_sueldo').parent().attr("class", "form-group has-error has-feedback");
		$('#Cat_sueldo').parent().append('<span id="icono_cat_sueldo" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_cat_sueldo').text("longitud permitida 4-10").show();
		estado  = "false";
	}else{
		$('#icono_cat_sueldo').remove();
		$('#Cat_sueldo').parent().attr("class", "form-group has-success has-feedback");
		$('#Cat_sueldo').parent().children("span").text("").hide();
		$('#Cat_sueldo').parent().append('<span id="icono_cat_sueldo" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}



function validarNuevoCategoria_E(){
	var nombre_e = validarNombreCat_E();
	var desc_e = validarDescCat_E();
	var sueldo_e = validarSueldoCat_E();

	if (nombre_e="true" && desc_e=="true" && sueldo_e=="true") {
	 alertify.success("Enviando datos...");
		actualizaDatosCat();
	} else{
		alertify.error('Favor de revisar datos');
	}
}
function validarNombreCat_E(){  
	var valor = document.getElementById("Cat_nombre_act").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{4,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_cat_nom_act').remove();
		$('#Cat_nombre_act').parent().attr("class", "form-group has-error has-feedback");
		$('#Cat_nombre_act').parent().append('<span id="icono_cat_nom_act" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_cat_nomb_act').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_cat_nom_act').remove();
		$('#Cat_nombre_act').parent().attr("class", "form-group has-error has-feedback");
		$('#Cat_nombre_act').parent().append('<span id="icono_cat_nom_act" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_cat_nomb_act').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_cat_nom_act').remove();
		$('#Cat_nombre_act').parent().attr("class", "form-group has-error has-feedback");
		$('#Cat_nombre_act').parent().append('<span id="icono_cat_nom_act" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_cat_nomb_act').text("Longitud no valida 5-30").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_cat_nom_act').remove();
		$('#Cat_nombre_act').parent().attr("class", "form-group has-success has-feedback");
		$('#Cat_nombre_act').parent().children("span").text("").hide();
		$('#Cat_nombre_act').parent().append('<span id="icono_cat_nom_act" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarDescCat_E(){  
	var valor = document.getElementById("Cat_descripcion_act").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_cat_desc_act').remove();
		$('#Cat_descripcion_act').parent().attr("class", "form-group has-error has-feedback");
		$('#Cat_descripcion_act').parent().append('<span id="icono_cat_desc_act" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_cat_desc_act').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_cat_desc_act').remove();
		$('#Cat_descripcion_act').parent().attr("class", "form-group has-success has-feedback");
		$('#Cat_descripcion_act').parent().children("span").text("").hide();
		$('#Cat_descripcion_act').parent().append('<span id="icono_cat_desc_act" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarSueldoCat_E(){
	var valor = document.getElementById("Cat_sueldo_act").value;
	let numeros = /[0-9]{4,10}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) || valor.length > 10){
		$('#icono_cat_sueldo_act').remove();
		$('#Cat_sueldo_act').parent().attr("class", "form-group has-error has-feedback");
		$('#Cat_sueldo_act').parent().append('<span id="icono_cat_sueldo_act" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_cat_sueldo_act').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( isNaN(valor) ){
		$('#icono_cat_sueldo_act').remove();
		$('#Cat_sueldo_act').parent().attr("class", "form-group has-error has-feedback");
		$('#Cat_sueldo_act').parent().append('<span id="icono_cat_sueldo_act" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_cat_sueldo_act').text("Caracter no valido").show();
		estado  = "false";
		console.log(estado);
	}else if( numeros.test(valor)==false){
		$('#icono_cat_sueldo_act').remove();
		$('#Cat_sueldo_act').parent().attr("class", "form-group has-error has-feedback");
		$('#Cat_sueldo_act').parent().append('<span id="icono_cat_sueldo_act" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_cat_sueldo_act').text("longitud permitida 4-10").show();
		estado  = "false";
	}else{
		$('#icono_cat_sueldo_act').remove();
		$('#Cat_sueldo_act').parent().attr("class", "form-group has-success has-feedback");
		$('#Cat_sueldo_act').parent().children("span").text("").hide();
		$('#Cat_sueldo_act').parent().append('<span id="icono_cat_sueldo_act" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}