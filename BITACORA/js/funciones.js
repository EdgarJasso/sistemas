function AgregarView(datos){
	d = datos.split('||');
	nombre = " - ".concat(d[2]);
    name=d[1].concat(nombre);
	$('#view_user_i').html(d[0]);
    $('#view_user_nombre').html(name);
	$('#view_user_clav').html(d[3]);
	$('#view_user_permis').html(d[4]);
}

function agregardatos(id_empleado, clave, permiso){
	cadena="ide="+ id_empleado +
           "&clave=" + clave +
		   "&permiso=" + permiso;
	$.ajax({
		type:"post",
		url:"../../cuerpo/contenido/usuarios/add.php",
		data:cadena,
		success:function(data){
		  if(data==1){ 
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
			$('#contenedor_empleados').load('../../cuerpo/contenido/empleados/tabla.php'); 
			$('#contenedor_usuarios').load('../../cuerpo/contenido/usuarios/tabla.php'); 
			$('#contenedor_servicios').load('../../cuerpo/contenido/servicios/tabla.php'); 
			$('#contenedor_peticiones').load('../../cuerpo/contenido/peticiones/tabla.php'); 
			$('#contenedor_bitacora').load('../../cuerpo/contenido/bitacora/tabla.php'); 
			// alertify.success("agregado con exito!");
			  //alert('exito');
	      }else{
			  //alert('fallo');
		  // alertify.error("Fallo en el servidor...");
		  console.log(data);
			Swal.fire({
				title: 'Error en el proceso!\n\n\n'+data,
				icon: 'error',
				confirmButtonText: 'Continuar'
			});
		   }
	    }
	});
}  

function agregarform(datos){
	d = datos.split('||');

	$('#idpersona').val(d[0]);
    $('#idempleado').val(d[1]);
	$('#clave_u').val(d[2]);
	$('#permiso_u').val(d[3]);
}

function actualizaDatosUsuario(){
	id=$('#idpersona').val();
    ide=$('#idempleado').val();
	clave=$('#clave_u').val();
	permiso=$('#permiso_u').val();

	cadena="id="+id+
           "&ide="+ ide+
	       "&clave=" + clave +
		   "&permiso=" + permiso;
	
		   $.ajax({
			type:"post",
			url:"../../cuerpo/contenido/usuarios/edit.php",
			data:cadena,
			success:function(data){
			  if(data==1){
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
    $('#contenedor_empleados').load('../../cuerpo/contenido/empleados/tabla.php'); 
    $('#contenedor_usuarios').load('../../cuerpo/contenido/usuarios/tabla.php'); 
    $('#contenedor_servicios').load('../../cuerpo/contenido/servicios/tabla.php'); 
    $('#contenedor_peticiones').load('../../cuerpo/contenido/peticiones/tabla.php'); 
    $('#contenedor_bitacora').load('../../cuerpo/contenido/bitacora/tabla.php'); 
				//alertify.success("Datos Actualizados!");
				  //alert('exito');
			  }else{
				  //alert('fallo');
			   //alertify.error("fallo en el servidor...");
			   console.log(data);
					Swal.fire({
						title: 'Error en el proceso!\n\n\n'+data,
						icon: 'error',
						confirmButtonText: 'Continuar'
					});
			   }
			}
		});

}

function preguntarUsuario(id){
 alertify.confirm('Emininar Datos', '¿Esta seguro de eliminar este registro?', 
 function(){ eliminarDatos(id) },
 function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(id){
	cadena = "id="+id;
	$.ajax({
		type:"post",
		url:"../../cuerpo/contenido/usuarios/delete.php",
		data: cadena,
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
					title: 'Eliminado Exitosamente!',
					icon: 'success',
					timer: 3000,
					timerProgressBar: true,
					showCancelButton: false,
					showConfirmButton: false
				});
			}else{
				//alertify.error("Error en el servidor...");
				console.log(r);
				Swal.fire({
					title: 'Error en el proceso!\n\n\n'+data,
					icon: 'error',
					confirmButtonText: 'Continuar'
				});
			}
		}

	});
}

$(document).ready(function(){
	$("#guardar_usua").click(validarNuevoUsuario);
		$("#empleado").keyup(validarUserEmp);
		$("#clave").keyup(validarUserPass);
		$("#permiso").click(validarUserPer);

	$("#actualizar_usuario").click(validarNuevoUsuario_E);
		$("#idempleado").keyup(validarUserEmp_E);
		$("#clave_u").keyup(validarUserPass_E);
		$("#permiso_u").click(validarUserPer_E);
	
	$("#empleado").change(generar);
});

function generar(){
	//alert("click");
	$.ajax({
		type:"post",
		url:"../contenido/usuarios/generador.php",
		data:"id=" + $('#empleado').val(),
		success:function(r){
		//	alert(r);
			$('#clave').val(r);
			//$('#clave').replace('/ /', '-');
		}

	});
}

function validarNuevoUsuario(){
	var emp = validarUserEmp();
	var pass = validarUserPass();
	var per = validarUserPer();

	if (emp=="true" && pass=="true" && per=="true") {
		//alertify.success("Enviando datos...");
		id_empleado = $('#empleado').val();
		clave = $('#clave').val();
		permiso = $('#permiso').val();
     agregardatos(id_empleado, clave, permiso);
	} else{
		alertify.error('Favor de revisar datos');
	}
}


function validarUserEmp(){
	
		
	var valor = document.getElementById("empleado").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_user_emp').remove();
		$('#empleado').parent().attr("class", "form-group has-error has-feedback");
		$('#empleado').parent().append('<span id="icono_user_emp" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_user_emp').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_user_emp').remove();
		$('#empleado').parent().attr("class", "form-group has-success has-feedback");
		$('#empleado').parent().children("span").text("").hide();
		$('#empleado').parent().append('<span id="icono_user_emp" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("formato: "+valor);
	console.log("final :"+estado);
	return estado;
}
function validarUserPass(){
	var valorws = document.getElementById("clave").value;
	
	var valor = $.trim(valorws);
	//valor.replace(/ /g, "-");
	//alert(valor.length);
	let espacios = /^\s$/;
	let curp = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/;
	let validador = /^(?=.*[A-Z].*[A-Z])(?=.*[!@#$&*].*[!@#$&*])(?=.*[0-9].*[0-9])(?=.*[a-z].*[a-z]).{8}$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_user_pass').remove();
		$('#clave').parent().attr("class", "form-group has-error has-feedback");
		$('#clave').parent().append('<span id="icono_user_pass" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_user_pass').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( valor.length <= 6 ){
		$('#icono_user_pass').remove();
		$('#clave').parent().attr("class", "form-group has-error has-feedback");
		$('#clave').parent().append('<span id="icono_user_pass" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_user_pass').text("Longitud no valida").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_user_pass').remove();
		$('#clave').parent().attr("class", "form-group has-success has-feedback");
		$('#clave').parent().children("span").text("").hide();
		$('#text_user_pass').parent().append('<span id="icono_user_pass" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarUserPer(){
	
		
	var valor = document.getElementById("permiso").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_user_emp').remove();
		$('#permiso').parent().attr("class", "form-group has-error has-feedback");
		$('#permiso').parent().append('<span id="icono_user_emp" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_user_per').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_user_per').remove();
		$('#permiso').parent().attr("class", "form-group has-success has-feedback");
		$('#permiso').parent().children("span").text("").hide();
		$('#permiso').parent().append('<span id="icono_user_per" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("formato: "+valor);
	console.log("final :"+estado);
	return estado;
}

function validarNuevoUsuario_E(){
	var emp_e = validarUserEmp_E();
	var pass_e = validarUserPass_E();
	var per_e = validarUserPer_E();

	if (emp_e=="true" && pass_e=="true" && per_e=="true") {
		alertify.success("Enviando datos...");
		actualizaDatosUsuario();
	} else{
		alertify.error('Favor de revisar datos');
	}
}


function validarUserEmp_E(){
	
		
	var valor = document.getElementById("idempleado").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_user_empAct').remove();
		$('#idempleado').parent().attr("class", "form-group has-error has-feedback");
		$('#idempleado').parent().append('<span id="icono_user_empAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_user_empAct').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_user_empAct').remove();
		$('#idempleado').parent().attr("class", "form-group has-success has-feedback");
		$('#idempleado').parent().children("span").text("").hide();
		$('#idempleado').parent().append('<span id="icono_user_empAct" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("formato: "+valor);
	console.log("final :"+estado);
	return estado;
}
function validarUserPass_E(){
	var valor = document.getElementById("clave_u").value;
	let espacios = /^\s$/;
	let validador = /^(?=.*[A-Z].*[A-Z])(?=.*[!@#$&*].*[!@#$&*])(?=.*[0-9].*[0-9])(?=.*[a-z].*[a-z]).{8}$/;
	let curp = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_user_passAct').remove();
		$('#clave_u').parent().attr("class", "form-group has-error has-feedback");
		$('#clave_u').parent().append('<span id="icono_user_passAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_user_passAct').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( valor.length <=6 ){
		$('#icono_user_passAct').remove();
		$('#clave_u').parent().attr("class", "form-group has-error has-feedback");
		$('#clave_u').parent().append('<span id="icono_user_passAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_user_passAct').text("Longitud no valida").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_user_passAct').remove();
		$('#clave_u').parent().attr("class", "form-group has-success has-feedback");
		$('#clave_u').parent().children("span").text("").hide();
		$('#text_user_passAct').parent().append('<span id="icono_user_passAct" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarUserPer_E(){
	
		
	var valor = document.getElementById("permiso_u").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_user_perAct').remove();
		$('#permiso_u').parent().attr("class", "form-group has-error has-feedback");
		$('#permiso_u').parent().append('<span id="icono_user_perAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_user_per').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_user_perAct').remove();
		$('#permiso_u').parent().attr("class", "form-group has-success has-feedback");
		$('#permiso_u').parent().children("span").text("").hide();
		$('#permiso_u').parent().append('<span id="icono_user_perAct" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("formato: "+valor);
	console.log("final :"+estado);
	return estado;
}