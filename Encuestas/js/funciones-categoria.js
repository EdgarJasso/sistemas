$(document).ready(function(){

	$("#guardar_cat").click(validarNuevaCat);
		$("#cat_area").change(validarCatArea);
		$("#cat_desc").keyup(validarCatDesc);

	$("#actualizar_cat").click(validarNuevaCat_e);
		$("#cat_area_e").change(validarCatArea_e);
		$("#cat_desc_e").keyup(validarCatDesc_e);
		
}); 

function AgregarViewCat(datos){ 
	d = datos.split('||');
	$('#view_cat_id').html(d[0]);
	$('#view_cat_area').html(d[1]);
	$('#view_cat_desc').html(d[2]);
}
  
function agregardatosCat(area, desc){
	cadenaC="id_area=" + area +
			"&desc="+ desc;
	$.ajax({
		type:"post",
		url:"../../cuerpo/contenido/categoria/add.php",
		data:cadenaC,
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

function agregarformCat(datos){
	d = datos.split('||');
	$('#idcat_e').val(d[0]);
	$('#cat_area_e').val(d[1]);
	$('#cat_desc_e').val(d[2]);
}

function actualizaDatosCat(){
    id = $('#idcat_e').val();
	area = $('#cat_area_e').val();
	desc = $('#cat_desc_e').val();;
    
	cadenace=
    "id="+ id +
	"&id_a=" + area +
	"&desc="+ desc;
    
		   $.ajax({
			type:"post",
			url:"../../cuerpo/contenido/categoria/edit.php",
			data:cadenace,
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

function preguntarCat(id){
 alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
 function(){ eliminarDatosCat(id) },
 function(){ alertify.error('Se cancelo')});
}
function eliminarDatosCat(id){
	cadena = "id="+id;
	$.ajax({
		type:"post",
		url:"../../cuerpo/contenido/categoria/delete.php",
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
function validarNuevaCat(){
	var Cat_area = validarCatArea();
	var Cat_des = validarCatDesc();

	if (Cat_area=="true" && Cat_des=="true") {
		alertify.success("Enviando datos...");
		area = $('#cat_area').val();
		desc = $('#cat_desc').val();
		agregardatosCat(area, desc);
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
function validarCatArea(){  
	var valor = document.getElementById("cat_area").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null" || valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_cat_area').remove();
		$('#cat_area').parent().attr("class", "form-group has-error has-feedback");
		$('#cat_area').parent().append('<span id="icono_cat_area" class="icon-cross form-control-feedback mt-2" style="top:32px; rigth:10px;"></span>');
		$('#text_cat_area').text("Seleccione otra opcion").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_cat_area').remove();
		$('#cat_area').parent().attr("class", "form-group has-success has-feedback");
		$('#cat_area').parent().children("span").text("").hide();
		$('#cat_area').parent().append('<span id="icono_cat_area" class="icon-checkmark form-control-feedback mt-2" style="top:32px;  rigth:10px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarCatDesc(){  
	var valor = document.getElementById("cat_desc").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,50}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,50}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,50}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_cat_desc').remove();
		$('#cat_desc').parent().attr("class", "form-group has-error has-feedback");
		$('#cat_desc').parent().append('<span id="icono_cat_desc" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_cat_desc').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_cat_desc').remove();
		$('#cat_desc').parent().attr("class", "form-group has-error has-feedback");
		$('#cat_desc').parent().append('<span id="icono_cat_desc" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_cat_desc').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_cat_desc').remove();
		$('#cat_desc').parent().attr("class", "form-group has-error has-feedback");
		$('#cat_desc').parent().append('<span id="icono_cat_desc" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_cat_desc').text("Longitud no valida 5-50").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_cat_desc').remove();
		$('#cat_desc').parent().attr("class", "form-group has-success has-feedback");
		$('#cat_desc').parent().children("span").text("").hide();
		$('#cat_desc').parent().append('<span id="icono_cat_desc" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}

/*editar*/


function validarNuevaCat_e(){
	var Cat_area_e = validarCatArea_e();
	var Cat_des_e = validarCatDesc_e();

	if (Cat_area_e=="true" && Cat_des_e=="true") {
		alertify.success("Enviando datos...");
		actualizaDatosCat();
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
function validarCatArea_e(){  
	var valor = document.getElementById("cat_area_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null" || valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_cat_area_e').remove();
		$('#cat_area_e').parent().attr("class", "form-group has-error has-feedback");
		$('#cat_area_e').parent().append('<span id="icono_cat_area_e" class="icon-cross form-control-feedback mt-2" style="top:32px; rigth:10px;"></span>');
		$('#text_cat_area_e').text("Seleccione otra opcion").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_cat_area_e').remove();
		$('#cat_area_e').parent().attr("class", "form-group has-success has-feedback");
		$('#cat_area_e').parent().children("span").text("").hide();
		$('#cat_area_e').parent().append('<span id="icono_cat_area_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;  rigth:10px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarCatDesc_e(){  
	var valor = document.getElementById("cat_desc_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,50}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,50}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,50}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_cat_desc_e').remove();
		$('#cat_desc_e').parent().attr("class", "form-group has-error has-feedback");
		$('#cat_desc_e').parent().append('<span id="icono_cat_desc_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_cat_desc_e').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_cat_desc_e').remove();
		$('#cat_desc_e').parent().attr("class", "form-group has-error has-feedback");
		$('#cat_desc_e').parent().append('<span id="icono_cat_desc_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_cat_desc_e').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_cat_desc_e').remove();
		$('#cat_desc_e').parent().attr("class", "form-group has-error has-feedback");
		$('#cat_desc_e').parent().append('<span id="icono_cat_desc_e" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_cat_desc_e').text("Longitud no valida 5-50").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_cat_desc_e').remove();
		$('#cat_desc_e').parent().attr("class", "form-group has-success has-feedback");
		$('#cat_desc_e').parent().children("span").text("").hide();
		$('#cat_desc_e').parent().append('<span id="icono_cat_desc_e" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}

