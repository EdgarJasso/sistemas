function AgregarViewEmpleado(datos){ 
d = datos.split('||');
$('#view_empleado_id').html(d[0]);
	$('#view_empleado_nombre').html(d[1]);
	$('#view_empleado_ap').html(d[2]);
    $('#view_empleado_am').html(d[3]);
    $('#view_empleado_fn').html(d[4]);
    $('#view_empleado_curp').html(d[5]);
    $('#view_empleado_rfc').html(d[6]);
    $('#view_empleado_tel').html(d[7]);
    $('#view_empleado_cel').html(d[8]);
}
 
function agregardatosEmp(nombre,ap, am, fn, curp, rfc, nss, cel){
	cadena="nombre=" + nombre +
		   "&apep=" + ap +
           "&apem=" + am +
           "&fn=" + fn +
           "&curp=" + curp +
           "&rfc=" + rfc +
           "&nss=" + nss +
           "&cel=" + cel 
        ;
	$.ajax({
		type:"post",
		url:"../contenido/empleados/add.php",
		data:cadena,
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
	 $('#contenedor_horas').load('horas/tabla.php'); 
	 $('#contenedor_documentosnuevos').load('documentos/tabla.php'); 
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

function agregarformEmp(datos){
    d = datos.split('||');
 
	$('#idempleadoAct').val(d[0]);
	$('#Empleado_nombreAct').val(d[1]);
	$('#Empleado_apAct').val(d[2]);
    $('#Empleado_amAct').val(d[3]);
    $('#Empleado_fnAct').val(d[4]);
    $('#Empleado_curpAct').val(d[5]);
    $('#Empleado_rfcAct').val(d[6]);
    $('#Empleado_telAct').val(d[7]);
    $('#Empleado_celAct').val(d[8]);
}

function actualizaDatosEmp(){
    id=$('#idempleadoAct').val();
	nombre=$('#Empleado_nombreAct').val();
	ap=$('#Empleado_apAct').val();
    am=$('#Empleado_amAct').val();
    fn=$('#Empleado_fnAct').val();
    curp=$('#Empleado_curpAct').val();
    rfc=$('#Empleado_rfcAct').val();
    nss=$('#Empleado_telAct').val();
    cel=$('#Empleado_celAct').val();
    
	cadena=
    "id="+ id +
	"&nombre=" +nombre+
	"&ap="+ap+
    "&am="+am+
    "&fn="+fn+
    "&curp="+curp+
    "&rfc="+rfc+
    "&nss="+nss+
    "&cel="+cel;
    
		   $.ajax({
			type:"post",
			url:"../contenido/empleados/edit.php",
			data:cadena,
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
	 $('#contenedor_horas').load('horas/tabla.php'); 
	 $('#contenedor_documentosnuevos').load('documentos/tabla.php'); 
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

function preguntarEmp(id){
 alertify.confirm('Emininar Datos', '¿Esta seguro de eliminar este registro? <br><b>Se Borrara TODO el contenido del sistema al hacerlo!</b>', 
 function(){ eliminarDatosEmp(id) },
 function(){ alertify.error('Se cancelo')});
}

function eliminarDatosEmp(id){
	cadena = "id="+id;
	$.ajax({
		type:"post",
		url:"../contenido/empleados/delete.php",
		data: cadena,
		success:function(r){
		//	alert(r);
         if((r==1)){
			 
	//alertify.success("Eliminado con exito!");
	Swal.fire({
		title: 'Eliminado Exitosamente!',
		icon: 'success',
		timer: 3000,
		timerProgressBar: true,
		showCancelButton: false,
		showConfirmButton: false
	});

	 $('#contenedor_empleados').load('empleados/tabla.php'); 
     $('#contenedor_usuarios').load('usuarios/tabla.php'); 
     $('#contenedor_direccion').load('direccion/tabla.php'); 
     $('#contenedor_area').load('area/tabla.php'); 
     $('#contenedor_categoria').load('categoria/tabla.php'); 
     $('#contenedor_antiguedad').load('antiguedad/tabla.php'); 
     $('#contenedor_objetivos').load('objetivos/tabla.php'); 
     $('#contenedor_asignacion').load('asignacion/tabla.php'); 
	 $('#contenedor_vacaciones').load('vacaciones/tabla.php'); 
	 $('#contenedor_horas').load('horas/tabla.php'); 
	 $('#contenedor_documentosnuevos').load('documentos/tabla.php'); 
     $('#contenedor_imagen').load('imagen/tabla.php');  
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

$(document).ready(function(){
	$("#guardar_empleado").click(validarNuevoEmpleado);
		$("#Empleado_nombre").keyup(validarNombre);
		$("#Empleado_ap").keyup(validarApellidoP);
		$("#Empleado_am").keyup(validarApellidoM);
		$("#Empleado_fn").click(validarFecha);
		$("#Empleado_curp").keyup(validarCURP);
		$("#Empleado_rfc").keyup(validarRFC);
		$("#Empleado_tel").keyup(validarTelefono);
		$("#Empleado_cel").keyup(validarCelular);

	$("#actualizar_empleado").click(validarNuevoEmpleado_E);
		$("#Empleado_nombreAct").keyup(validarNombre_E);
		$("#Empleado_apAct").keyup(validarApellidoP_E);
		$("#Empleado_amAct").keyup(validarApellidoM_E);
		$("#Empleado_fnAct").click(validarFecha_E);
		$("#Empleado_curpAct").keyup(validarCURP_E);
		$("#Empleado_rfcAct").keyup(validarRFC_E);
		$("#Empleado_telAct").keyup(validarTelefono_E);
		$("#Empleado_celAct").keyup(validarCelular_E);
		
});

function validarNuevoEmpleado(){
	var nombre = validarNombre();
	var ap = validarApellidoP();
	var am = validarApellidoM();
	var fn = validarFecha();
	var curp = validarCURP();
	var rfc =validarRFC();
	var tel=validarTelefono();
	var cel=validarCelular();

	if (nombre=="true" && ap=="true" && am=="true" && fn=="true"
	 && curp=="true" && rfc=="true" && tel=="true" && cel=="true") {
		alertify.success("Enviando datos...");
		 nombre = $('#Empleado_nombre').val();
				  ap = $('#Empleado_ap').val();
			     am = $('#Empleado_am').val();
			      fn = $('#Empleado_fn').val();
			    curp = $('#Empleado_curp').val();
			     rfc = $('#Empleado_rfc').val();
			     nss = $('#Empleado_tel').val();
				cel = $('#Empleado_cel').val();
		   agregardatosEmp(nombre,ap, am, fn, curp, rfc, nss, cel);
	} else{
		alertify.error('Favor de revisar datos');
	}
}


function validarNombre(){  
	var valor = document.getElementById("Empleado_nombre").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{3,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚñÑ]{0,20}$/;
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
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚñÑ]{0,20}$/;
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
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚñÑ]{0,20}$/;
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
function validarFecha(){
	
		
	var valor = document.getElementById("Empleado_fn").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_fn').remove();
		$('#Empleado_fn').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_fn').parent().append('<span id="icono_texto_fn" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_fn').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_fn').remove();
		$('#Empleado_fn').parent().attr("class", "form-group has-success has-feedback");
		$('#Empleado_fn').parent().children("span").text("").hide();
		$('#Empleado_fn').parent().append('<span id="icono_texto_fn" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("formato: "+valor);
	console.log("final :"+estado);
	return estado;
}
function validarCURP(){
	var valor = document.getElementById("Empleado_curp").value;
	let espacios = /^\s$/;
	let curp = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_curp').remove();
		$('#Empleado_curp').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_curp').parent().append('<span id="icono_texto_curp" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_curp').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( curp.test(valor)==false ){
		$('#icono_texto_curp').remove();
		$('#Empleado_curp').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_curp').parent().append('<span id="icono_texto_curp" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_curp').text("Formato no valido").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_curp').remove();
		$('#Empleado_curp').parent().attr("class", "form-group has-success has-feedback");
		$('#Empleado_curp').parent().children("span").text("").hide();
		$('#text_help_curp').parent().append('<span id="icono_texto_curp" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarRFC(){
	var valor = document.getElementById("Empleado_rfc").value;
	let espacios = /^\s$/;
	let rfc =/^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_rfc').remove();
		$('#Empleado_rfc').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_rfc').parent().append('<span id="icono_texto_rfc" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_rfc').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( rfc.test(valor)==false ){
		$('#icono_texto_rfc').remove();
		$('#Empleado_rfc').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_rfc').parent().append('<span id="icono_texto_rfc" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_rfc').text("Formato no valido").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_rfc').remove();
		$('#Empleado_rfc').parent().attr("class", "form-group has-success has-feedback");
		$('#Empleado_rfc').parent().children("span").text("").hide();
		$('#text_help_rfc').parent().append('<span id="icono_texto_rfc" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarTelefono(){
	var valor = document.getElementById("Empleado_tel").value;
	let numeros = /[0-9]{11}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) || valor.length > 11){
		$('#icono_texto_tel').remove();
		$('#Empleado_tel').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_tel').parent().append('<span id="icono_texto_tel" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_tel').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( isNaN(valor) ){
		$('#icono_texto_tel').remove();
		$('#Empleado_tel').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_tel').parent().append('<span id="icono_texto_tel" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_tel').text("Letras no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( numeros.test(valor)==false){
		$('#icono_texto_tel').remove();
		$('#Empleado_tel').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_tel').parent().append('<span id="icono_texto_tel" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_tel').text("Formato no valido").show();
		estado  = "false";
	}else{
		$('#icono_texto_tel').remove();
		$('#Empleado_tel').parent().attr("class", "form-group has-success has-feedback");
		$('#Empleado_tel').parent().children("span").text("").hide();
		$('#Empleado_tel').parent().append('<span id="icono_texto_tel" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarCelular(){
	var valor = document.getElementById("Empleado_cel").value;
	let numeros = /[0-9]{10,16}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) || valor.length > 10){
		$('#icono_texto_cel').remove();
		$('#Empleado_cel').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_cel').parent().append('<span id="icono_texto_cel" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_cel').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( isNaN(valor) ){
		$('#icono_texto_cel').remove();
		$('#Empleado_cel').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_cel').parent().append('<span id="icono_texto_cel" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_cel').text("Letras no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( numeros.test(valor)==false){
		$('#icono_texto_cel').remove();
		$('#Empleado_cel').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_cel').parent().append('<span id="icono_texto_cel" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_cel').text("longitud permitida 10-14").show();
		estado  = "false";
	}else{
		$('#icono_texto_cel').remove();
		$('#Empleado_cel').parent().attr("class", "form-group has-success has-feedback");
		$('#Empleado_cel').parent().children("span").text("").hide();
		$('#Empleado_cel').parent().append('<span id="icono_texto_cel" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}



function validarNuevoEmpleado_E(){
	var nombre_e = validarNombre_E();
	var ap_e = validarApellidoP_E();
	var am_e = validarApellidoM_E();
	var fn_e = validarFecha_E();
	var curp_e = validarCURP_E();
	var rfc_e =validarRFC_E();
	var tel_e =validarTelefono_E();
	var cel_e =validarCelular_E();

	if(nombre_e =="true" && ap_e =="true" && am_e =="true" && fn_e=="true"
	 && curp_e =="true" && rfc_e =="true" && tel_e =="true" && cel_e =="true") {
		alertify.success("Enviando datos...");
		   actualizaDatosEmp();
	}else{
		alertify.error('Favor de revisar datos');
	}
}

function validarNombre_E(){  
	var valor = document.getElementById("Empleado_nombreAct").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ]{3,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚÑñ]{0,20}$/;
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
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚÑñ]{0,20}$/;
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
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚÑñ]{0,20}$/;
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
function validarFecha_E(){
	
		
	var valor = document.getElementById("Empleado_fnAct").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_fnAct').remove();
		$('#Empleado_fnAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_fnAct').parent().append('<span id="icono_texto_fnAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_fnAct').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_fnAct').remove();
		$('#Empleado_fnAct').parent().attr("class", "form-group has-success has-feedback");
		$('#Empleado_fnAct').parent().children("span").text("").hide();
		$('#Empleado_fnAct').parent().append('<span id="icono_texto_fnAct" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("formato: "+valor);
	console.log("final :"+estado);
	return estado;
}
function validarCURP_E(){
	var valor = document.getElementById("Empleado_curpAct").value;
	let espacios = /^\s$/;
	let curp = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_curpAct').remove();
		$('#Empleado_curpAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_curpAct').parent().append('<span id="icono_texto_curpAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_curpAct').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( curp.test(valor)==false ){
		$('#icono_texto_curpAct').remove();
		$('#Empleado_curpAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_curpAct').parent().append('<span id="icono_texto_curpAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_curpAct').text("Formato no valido").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_curpAct').remove();
		$('#Empleado_curpAct').parent().attr("class", "form-group has-success has-feedback");
		$('#Empleado_curpAct').parent().children("span").text("").hide();
		$('#text_help_curpAct').parent().append('<span id="icono_texto_curpAct" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarRFC_E(){
	var valor = document.getElementById("Empleado_rfcAct").value;
	let espacios = /^\s$/;
	let rfc =/^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_texto_rfcAct').remove();
		$('#Empleado_rfcAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_rfcAct').parent().append('<span id="icono_texto_rfcAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_rfcAct').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( rfc.test(valor)==false ){
		$('#icono_texto_rfcAct').remove();
		$('#Empleado_rfcAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_rfcAct').parent().append('<span id="icono_texto_rfcAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_rfcAct').text("Formato no valido").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_texto_rfcAct').remove();
		$('#Empleado_rfcAct').parent().attr("class", "form-group has-success has-feedback");
		$('#Empleado_rfcAct').parent().children("span").text("").hide();
		$('#text_help_rfcAct').parent().append('<span id="icono_texto_rfcAct" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarTelefono_E(){
	var valor = document.getElementById("Empleado_telAct").value;
	let numeros = /[0-9]{11}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) || valor.length > 11){
		$('#icono_texto_telAct').remove();
		$('#Empleado_telAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_telAct').parent().append('<span id="icono_texto_telAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_telAct').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( isNaN(valor) ){
		$('#icono_texto_telAct').remove();
		$('#Empleado_telAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_telAct').parent().append('<span id="icono_texto_telAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_telAct').text("Letras no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( numeros.test(valor)==false){
		$('#icono_texto_telAct').remove();
		$('#Empleado_telAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_telAct').parent().append('<span id="icono_texto_telAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_telAct').text("Formato no valido").show();
		estado  = "false";
	}else{
		$('#icono_texto_telAct').remove();
		$('#Empleado_telAct').parent().attr("class", "form-group has-success has-feedback");
		$('#Empleado_telAct').parent().children("span").text("").hide();
		$('#Empleado_telAct').parent().append('<span id="icono_texto_telAct" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarCelular_E(){
	var valor = document.getElementById("Empleado_celAct").value;
	let numeros = /[0-9]{10,16}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) || valor.length > 10){
		$('#icono_texto_celAct').remove();
		$('#Empleado_celAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_celAct').parent().append('<span id="icono_texto_celAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_celAct').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( isNaN(valor) ){
		$('#icono_texto_celAct').remove();
		$('#Empleado_celAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_celAct').parent().append('<span id="icono_texto_celAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_celAct').text("Letras no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( numeros.test(valor)==false){
		$('#icono_texto_celAct').remove();
		$('#Empleado_celAct').parent().attr("class", "form-group has-error has-feedback");
		$('#Empleado_celAct').parent().append('<span id="icono_texto_celAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_help_celAct').text("longitud permitida 10-14").show();
		estado  = "false";
	}else{
		$('#icono_texto_celAct').remove();
		$('#Empleado_celAct').parent().attr("class", "form-group has-success has-feedback");
		$('#Empleado_celAct').parent().children("span").text("").hide();
		$('#Empleado_celAct').parent().append('<span id="icono_texto_celAct" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}

