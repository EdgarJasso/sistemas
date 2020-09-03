function AgregarViewEmpleado(datos){ 
d = datos.split('||');
wa = " - ".concat(d[2]);
area = d[1].concat(wa);
	$('#view_empleado_id').html(d[0]);
	$('#view_empleado_area').html(area);
	$('#view_empleado_nombre').html(d[3]);
	$('#view_empleado_ap').html(d[4]);
    $('#view_empleado_am').html(d[5]);
}
 
function agregardatosEmp(area,nombre,ap, am){
	cadena="area=" + area +
		   "&nombre=" + nombre +
		   "&apep=" + ap +
           "&apem=" + am 
        ;
	$.ajax({
		type:"post",
		url:"../../cuerpo/contenido/empleados/add.php",
		data:cadena,
		success:function(r){
		  if(r==1){
			$('#marcadores').load('../../php/marcadores.php');
    $('#contenedor_area').load('../../cuerpo/contenido/area/tabla.php'); 
    $('#contenedor_empleados').load('../../cuerpo/contenido/empleados/tabla.php'); 
    $('#contenedor_usuarios').load('../../cuerpo/contenido/usuarios/tabla.php'); 
    $('#contenedor_servicios').load('../../cuerpo/contenido/servicios/tabla.php'); 
    $('#contenedor_peticiones').load('../../cuerpo/contenido/peticiones/tabla.php'); 
    $('#contenedor_bitacora').load('../../cuerpo/contenido/bitacora/tabla.php'); 
			Swal.fire({
				title: 'Agregado con exito!',
				icon: 'success',
				timer: 3000,
				timerProgressBar: true,
				showCancelButton: false,
				showConfirmButton: false
			});
			//alertify.success("agregado con exito!");
			  //alert('exito');
	      }else{
			  //alert('fallo');
			  //alertify.error("Fallo en el servidor...");
			  Swal.fire({
				title: 'Fallo en el servidor...!',
				icon: 'error',
				timer: 3000,
				timerProgressBar: true,
				showCancelButton: false,
				showConfirmButton: false
			});
		   }
	    }
	});
}  

function agregarformEmp(datos){
    d = datos.split('||');
 
	$('#idempleadoAct').val(d[0]);
	$('#Empleado_areaAct').val(d[1]);
	$('#Empleado_nombreAct').val(d[2]);
	$('#Empleado_apAct').val(d[3]);
    $('#Empleado_amAct').val(d[4]);
}

function actualizaDatosEmp(){
	id=$('#idempleadoAct').val();
	id_a=$('#Empleado_areaAct').val();
	nombre=$('#Empleado_nombreAct').val();
	ap=$('#Empleado_apAct').val();
    am=$('#Empleado_amAct').val();
    
	cadena=
	"id="+ id +
	"&id_area=" +id_a+
	"&nombre=" +nombre+
	"&ap="+ap+
    "&am="+am;
    
		   $.ajax({
			type:"post",
			url:"../../cuerpo/contenido/empleados/edit.php",
			data:cadena,
			success:function(r){
             if(r==1){
				$('#marcadores').load('../../php/marcadores.php');
    $('#contenedor_area').load('../../cuerpo/contenido/area/tabla.php'); 
    $('#contenedor_empleados').load('../../cuerpo/contenido/empleados/tabla.php'); 
    $('#contenedor_usuarios').load('../../cuerpo/contenido/usuarios/tabla.php'); 
    $('#contenedor_servicios').load('../../cuerpo/contenido/servicios/tabla.php'); 
    $('#contenedor_peticiones').load('../../cuerpo/contenido/peticiones/tabla.php'); 
    $('#contenedor_bitacora').load('../../cuerpo/contenido/bitacora/tabla.php'); 
				Swal.fire({
					title: 'Actualizado con exito!!',
					icon: 'success',
					timer: 3000,
					timerProgressBar: true,
					showCancelButton: false,
					showConfirmButton: false
				});
				//alertify.success("Actualizado con exito!");
				  //alert('exito');
			  }else{
				  //alert('fallo');
				  //alertify.error("fallo en el servidor!!!");
				  Swal.fire({
					title: 'Fallo en el servidor!',
					icon: 'error',
					timer: 3000,
					timerProgressBar: true,
					showCancelButton: false,
					showConfirmButton: false
				});
			   }
			}
		});

}

function preguntarEmp(id){
 alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
 function(){ eliminarDatosEmp(id) },
 function(){ alertify.error('Se cancelo')});
}

function eliminarDatosEmp(id){
	cadena = "id="+id;
	$.ajax({
		type:"post",
		url:"../../cuerpo/contenido/empleados/delete.php",
		data: cadena,
		success:function(r){
		//	alert(r);
         if((r==1)){
			 
	//alertify.success("Los Datos han sido eliminados!");
	Swal.fire({
		title: 'Los Datos han sido eliminados!',
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
			//alert(r);
			//alertify.error("Error en el servidorRRRR...");
			Swal.fire({
				title: 'Error en el servidor!',
				icon: 'error',
				timer: 3000,
				timerProgressBar: true,
				showCancelButton: false,
				showConfirmButton: false
			});
			}
		}

	});
}

$(document).ready(function(){
	$("#guardar_empleado").click(validarNuevoEmpleado);
		$("#Empleado_area").click(validarArea);
		$("#Empleado_nombre").keyup(validarNombre);
		$("#Empleado_ap").keyup(validarApellidoP);
		$("#Empleado_am").keyup(validarApellidoM);

	$("#actualizar_empleado").click(validarNuevoEmpleado_E);
		$("#Empleado_areaAct").click(validarArea_E);
		$("#Empleado_nombreAct").keyup(validarNombre_E);
		$("#Empleado_apAct").keyup(validarApellidoP_E);
		$("#Empleado_amAct").keyup(validarApellidoM_E);
		
});

function validarNuevoEmpleado(){
	var area = validarArea();
	var nombre = validarNombre();
	var ap = validarApellidoP();
	var am = validarApellidoM();

	if (area=="true" && nombre=="true" && ap=="true" && am=="true") {
		//alertify.success("Enviando datos...");
		Swal.fire({
			title: 'Enviando datos',
			icon: 'info',
			timer: 1000,
			timerProgressBar: true,
			showCancelButton: false,
			showConfirmButton: false
		});
		area = $('#Empleado_area').val();
		 nombre = $('#Empleado_nombre').val();
				  ap = $('#Empleado_ap').val();
			     am = $('#Empleado_am').val();
		   agregardatosEmp(area, nombre,ap, am);
	} else{
		//alertify.error('Favor de revisar datos');
		Swal.fire({
			title: 'Favor de revisar datos!',
			icon: 'warning',
			timer: 3000,
			timerProgressBar: true,
			showCancelButton: false,
			showConfirmButton: false
		});
	}
}

function validarArea(){
	var valor = document.getElementById("Empleado_area").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null"){
		$('#icono_texto_area').remove();
		$('#Empleado_area').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_area').parent().append('<span id="icono_texto_area" class="icon-cross form-control-feedback mt-2" style="right: 10px;top: 30px;"></span>');
		$('#text_help_area').text("Seleccione un area valida").show();
		estado  = "false";
	}else{
		$('#icono_texto_area').remove();
		$('#Empleado_area').parent().attr("class", "form-group has-success has-feedback");
		$('#Empleado_area').parent().children("span").text("").hide();
		$('#Empleado_area').parent().append('<span id="icono_texto_area" class="icon-checkmark form-control-feedback mt-2" style="right: 10px;top: 30px;"></span>');
		estado  = "true";
    }

return estado;
}
function validarNombre(){  
	var valor = document.getElementById("Empleado_nombre").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{3,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_nom').remove();
		$('#Empleado_nombre').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_nombre').parent().append('<span id="icono_texto_nom" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_nom').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_texto_nom').remove();
		$('#Empleado_nombre').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_nombre').parent().append('<span id="icono_texto_nom" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_nom').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_texto_nom').remove();
		$('#Empleado_nombre').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_nombre').parent().append('<span id="icono_texto_nom" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_nom').text("Longitud no valida 5-20").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_nom').remove();
		$('#Empleado_nombre').parent().attr("class", "form-group has-success has-feedback");
		$('#Empleado_nombre').parent().children("span").text("").hide();
		$('#Empleado_nombre').parent().append('<span id="icono_texto_nom" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarApellidoP(){
	var valor = document.getElementById("Empleado_ap").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_ap').remove();
		$('#Empleado_ap').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_ap').parent().append('<span id="icono_texto_ap" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_ap').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_texto_ap').remove();
		$('#Empleado_ap').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_ap').parent().append('<span id="icono_texto_ap" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_ap').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_texto_ap').remove();
		$('#Empleado_ap').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_ap').parent().append('<span id="icono_texto_ap" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_ap').text("Longitud no valida 5-20").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_ap').remove();
		$('#Empleado_ap').parent().attr("class", "form-group has-success has-feedback");
		$('#Empleado_ap').parent().children("span").text("").hide();
		$('#text_help_ap').parent().append('<span id="icono_texto_ap" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarApellidoM(){
	var valor = document.getElementById("Empleado_am").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_am').remove();
		$('#Empleado_am').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_am').parent().append('<span id="icono_texto_am" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_am').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_texto_am').remove();
		$('#Empleado_am').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_am').parent().append('<span id="icono_texto_am" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_am').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_texto_am').remove();
		$('#Empleado_am').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_am').parent().append('<span id="icono_texto_am" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_am').text("Longitud no valida 5-20").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_am').remove();
		$('#Empleado_am').parent().attr("class", "form-group has-success has-feedback");
		$('#Empleado_am').parent().children("span").text("").hide();
		$('#text_help_am').parent().append('<span id="icono_texto_am" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}

function validarNuevoEmpleado_E(){
	var area_e = validarNombre_E();
	var nombre_e = validarNombre_E();
	var ap_e = validarApellidoP_E();
	var am_e = validarApellidoM_E();

	if(area_e == "true" && nombre_e =="true" && ap_e =="true" && am_e =="true" ) {
		//alertify.success("Enviando datos...");
		Swal.fire({
			title: 'Enviando datos',
			icon: 'info',
			timer: 1000,
			timerProgressBar: true,
			showCancelButton: false,
			showConfirmButton: false
		});
		   actualizaDatosEmp();
	}else{
		//alertify.error('Favor de revisar datos');
		Swal.fire({
			title: 'Favor de revisar datos!',
			icon: 'warning',
			timer: 3000,
			timerProgressBar: true,
			showCancelButton: false,
			showConfirmButton: false
		});
	}
}
function validarArea_E(){
	var valor = document.getElementById("Empleado_areaAct").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null"){
		$('#icono_texto_area_e').remove();
		$('#Empleado_areaAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_areaAct').parent().append('<span id="icono_texto_area_e" class="icon-cross form-control-feedback mt-2" style="right: 10px;top: 30px;"></span>');
		$('#text_help_areaAct').text("Seleccione un area valida").show();
		estado  = "false";
	}else{
		$('#icono_texto_area_e').remove();
		$('#Empleado_areaAct').parent().attr("class", "form-group has-success has-feedback");
		$('#Empleado_areaAct').parent().children("span").text("").hide();
		$('#Empleado_areaAct').parent().append('<span id="icono_texto_area_e" class="icon-checkmark form-control-feedback mt-2" style="right: 10px;top: 30px;"></span>');
		estado  = "true";
    }

return estado;
}
function validarNombre_E(){  
	var valor = document.getElementById("Empleado_nombreAct").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{3,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_nomAct').remove();
		$('#Empleado_nombreAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_nombreAct').parent().append('<span id="icono_texto_nomAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_nomAct').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_texto_nomAct').remove();
		$('#Empleado_nombreAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_nombreAct').parent().append('<span id="icono_texto_nomAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_nomAct').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_texto_nomAct').remove();
		$('#Empleado_nombreAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_nombreAct').parent().append('<span id="icono_texto_nomAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_nomAct').text("Longitud no valida 5-20").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_nomAct').remove();
		$('#Empleado_nombreAct').parent().attr("class", "form-group has-success has-feedback");
		$('#Empleado_nombreAct').parent().children("span").text("").hide();
		$('#Empleado_nombreAct').parent().append('<span id="icono_texto_nomAct" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarApellidoP_E(){
	var valor = document.getElementById("Empleado_apAct").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_apAct').remove();
		$('#Empleado_apAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_apAct').parent().append('<span id="icono_texto_apAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_apAct').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_texto_apAct').remove();
		$('#Empleado_apAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_apAct').parent().append('<span id="icono_texto_apAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_apAct').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_texto_apAct').remove();
		$('#Empleado_apAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_apAct').parent().append('<span id="icono_texto_apAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_apAct').text("Longitud no valida 5-20").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_apAct').remove();
		$('#Empleado_apAct').parent().attr("class", "form-group has-success has-feedback");
		$('#Empleado_apAct').parent().children("span").text("").hide();
		$('#text_help_apAct').parent().append('<span id="icono_texto_apAct" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarApellidoM_E(){
	var valor = document.getElementById("Empleado_amAct").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_amAct').remove();
		$('#Empleado_amAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_amAct').parent().append('<span id="icono_texto_amAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_amAct').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_texto_amAct').remove();
		$('#Empleado_amAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_amAct').parent().append('<span id="icono_texto_amAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_amAct').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_texto_amAct').remove();
		$('#Empleado_amAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_amAct').parent().append('<span id="icono_texto_amAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_amAct').text("Longitud no valida 5-20").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_amAct').remove();
		$('#Empleado_amAct').parent().attr("class", "form-group has-success has-feedback");
		$('#Empleado_amAct').parent().children("span").text("").hide();
		$('#text_help_amAct').parent().append('<span id="icono_texto_amAct" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}