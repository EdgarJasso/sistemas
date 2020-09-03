function AgregarViewDireccion(datos){ 

	d = datos.split('||');
	nombre = " - ".concat(d[2]);
    name=d[1].concat(nombre);
	$('#view_id_direccion').html(d[0]);
	$('#view_id_empleado').html(name);
	$('#view_pais').html(d[3]);
    $('#view_estado').html(d[4]);
    $('#view_municipio').html(d[5]);
    $('#view_colonia').html(d[6]);
    $('#view_calle').html(d[7]);
    $('#view_numero').html(d[8]);
    $('#view_entre_calles').html(d[9]);

}

function  agregardatosdir(id_empleado, pais, estado, municipio, colonia, calle, numero, entre){
    cadena="idempleado=" + id_empleado +
		   "&pais=" + pais +
           "&estado=" + estado +
           "&municipio=" + municipio +
           "&colonia=" + colonia +
           "&calle=" + calle +
           "&numero=" + numero +
           "&entre=" + entre 
        ;
        //alert(cadena);
	$.ajax({
		type:"post",
		url:"../contenido/direccion/add.php",
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
			$('#contenedor_documentos').load('documentos/tabla.php'); 
			$('#contenedor_imagen').load('imagen/tabla.php'); 
			Swal.fire({
				title: 'Agregado Exitosamente!',
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

function agregarformDir(datos){
    d = datos.split('||');
 
	$('#iddirAct').val(d[0]);
	$('#dir_idempleadoAct').val(d[1]);
	$('#dir_paisAct').val(d[2]);
    $('#dir_estadoAct').val(d[3]);
    $('#dir_municipioAct').val(d[4]);
    $('#dir_coloniaAct').val(d[5]);
    $('#dir_calleAct').val(d[6]);
    $('#dir_numeroAct').val(d[7]);
    $('#dir_entreAct').val(d[8]);

}

function actualizaDatosdir(){
    ida=$('#iddirAct').val();
    idea=$('#dir_idempleadoAct').val();
	paisa=$('#dir_paisAct').val();
	estadoa=$('#dir_estadoAct').val();
    municipioa=$('#dir_municipioAct').val();
    coloniaa=$('#dir_coloniaAct').val();
    callea=$('#dir_calleAct').val();
    numeroa=$('#dir_numeroAct').val();
    entrea=$('#dir_entreAct').val();
    
	cadenaA=
    "id="+ ida +
	"&ide=" +idea+
	"&pais="+paisa+
    "&estado="+estadoa+
    "&municipio="+municipioa+
    "&colonia="+coloniaa+
    "&calle="+callea+
    "&numero="+numeroa+
    "&entre="+entrea;
    
		   $.ajax({
			type:"post",
			url:"../contenido/direccion/edit.php",
			data:cadenaA,
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
				$('#contenedor_documentosnuevos').load('documentosnuevos/tabla.php'); 
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

function preguntardir(id){
 alertify.confirm('Elininar Datos', '¿Esta seguro de eliminar este registro?', 
 function(){ eliminarDatosDir(id) },
 function(){ alertify.error('Se cancelo')});
}

function eliminarDatosDir(id){
	cadena = "id="+id;
	$.ajax({
		type:"post",
		url:"../contenido/direccion/delete.php",
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
	$("#guardar_direccion").click(validarNuevaDireccion);
		$("#dir_idempleado").click(validarDirEmp);
		$("#dir_pais").keyup(validarDirPais);
		$("#dir_estado").keyup(validarDirEstado);
		$("#dir_municipio").keyup(validarDirMunicipio);
		$("#dir_colonia").keyup(validarDirColonia);
		$("#dir_calle").keyup(validarDirCalle);
		$("#dir_numero").keyup(validarDirNumero);
		$("#dir_entre").keyup(validarDirEntreCalle);

	$("#actualizar_direccion").click(validarNuevaDireccion_E);
		$("#dir_idempleadoAct").click(validarDirEmp_E);
		$("#dir_paisAct").keyup(validarDirPais_E);
		$("#dir_estadoAct").keyup(validarDirEstado_E);
		$("#dir_municipioAct").keyup(validarDirMunicipio_E);
		$("#dir_coloniaAct").keyup(validarDirColonia_E);
		$("#dir_calleAct").keyup(validarDirCalle_E);
		$("#dir_numeroAct").keyup(validarDirNumero_E);
		$("#dir_entreAct").keyup(validarDirEntreCalle_E);



		
});

function validarNuevaDireccion(){
	var dir_id = validarDirEmp();
	var dir_p = validarDirPais();
	var dir_e = validarDirEstado();
	var dir_m = validarDirMunicipio();
	var dir_c = validarDirColonia();
	var dir_ca =validarDirCalle();
	var dir_n =validarDirNumero();
	var dir_en =validarDirEntreCalle();

	if (dir_id=="true" && dir_p=="true" && dir_e=="true" && dir_m=="true"
	 && dir_c=="true" && dir_ca=="true" && dir_n=="true" && dir_en=="true") {
		alertify.success("Enviando datos...");
		id_empleado = $('#dir_idempleado').val();
            pais = $('#dir_pais').val();
            estado = $('#dir_estado').val();
            municipio = $('#dir_municipio').val();
            colonia = $('#dir_colonia').val();
            calle = $('#dir_calle').val();
            numero = $('#dir_numero').val();
            entre = $('#dir_entre').val();
	  agregardatosdir(id_empleado, pais, estado, municipio, colonia, calle, numero, entre);
	}else{
		alertify.error('Favor de revisar datos');
	}
}

function validarDirEmp(){
	var valor = document.getElementById("dir_idempleado").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_dir_emp').remove();
		$('#dir_idempleado').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_idempleado').parent().append('<span id="icono_dir_emp" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_emp').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_dir_emp').remove();
		$('#dir_idempleado').parent().attr("class", "form-group has-success has-feedback");
		$('#dir_idempleado').parent().children("span").text("").hide();
		$('#dir_idempleado').parent().append('<span id="icono_dir_emp" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("formato: "+valor);
	console.log("final :"+estado);
	return estado;
}
function validarDirPais(){
	var valor = document.getElementById("dir_pais").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{4,30}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_dir_pais').remove();
		$('#dir_pais').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_pais').parent().append('<span id="icono_dir_pais" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_pais').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_dir_pais').remove();
		$('#dir_pais').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_pais').parent().append('<span id="icono_dir_pais" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_pais').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_dir_pais').remove();
		$('#dir_pais').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_pais').parent().append('<span id="icono_dir_pais" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_pais').text("Longitud no valida 5-20").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_dir_pais').remove();
		$('#dir_pais').parent().attr("class", "form-group has-success has-feedback");
		$('#dir_pais').parent().children("span").text("").hide();
		$('#text_dir_pais').parent().append('<span id="icono_dir_pais" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarDirEstado(){
	var valor = document.getElementById("dir_estado").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{4,30}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,30}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,30}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_dir_estado').remove();
		$('#dir_estado').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_estado').parent().append('<span id="icono_dir_estado" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_estado').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_dir_estado').remove();
		$('#dir_estado').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_estado').parent().append('<span id="icono_dir_estado" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_estado').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_dir_estado').remove();
		$('#dir_estado').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_estado').parent().append('<span id="icono_dir_estado" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_estado').text("Longitud no valida 5-20").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_dir_estado').remove();
		$('#dir_estado').parent().attr("class", "form-group has-success has-feedback");
		$('#dir_estado').parent().children("span").text("").hide();
		$('#text_dir_estado').parent().append('<span id="icono_dir_estado" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarDirMunicipio(){
	var valor = document.getElementById("dir_municipio").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{4,30}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,30}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,30}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_dir_municipio').remove();
		$('#dir_municipio').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_municipio').parent().append('<span id="icono_dir_municipio" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_municipio').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_dir_municipio').remove();
		$('#dir_municipio').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_municipio').parent().append('<span id="icono_dir_municipio" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_municipio').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_dir_municipio').remove();
		$('#dir_municipio').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_municipio').parent().append('<span id="icono_dir_municipio" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_municipio').text("Longitud no valida 5-20").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_dir_municipio').remove();
		$('#dir_municipio').parent().attr("class", "form-group has-success has-feedback");
		$('#dir_municipio').parent().children("span").text("").hide();
		$('#text_dir_municipio').parent().append('<span id="icono_dir_municipio" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarDirColonia(){
	var valor = document.getElementById("dir_colonia").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{2,30}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,30}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,30}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_dir_colonia').remove();
		$('#dir_colonia').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_colonia').parent().append('<span id="icono_dir_colonia" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_colonia').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_dir_colonia').remove();
		$('#dir_colonia').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_colonia').parent().append('<span id="icono_dir_colonia" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_colonia').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_dir_colonia').remove();
		$('#dir_colonia').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_colonia').parent().append('<span id="icono_dir_colonia" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_colonia').text("Longitud no valida 5-20").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_dir_colonia').remove();
		$('#dir_colonia').parent().attr("class", "form-group has-success has-feedback");
		$('#dir_colonia').parent().children("span").text("").hide();
		$('#text_dir_colonia').parent().append('<span id="icono_dir_colonia" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarDirCalle(){
	var valor = document.getElementById("dir_calle").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{4,30}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,30}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,30}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_dir_calle').remove();
		$('#dir_calle').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_calle').parent().append('<span id="icono_dir_calle" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_calle').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_dir_calle').remove();
		$('#dir_calle').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_calle').parent().append('<span id="icono_dir_calle" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_calle').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_dir_calle').remove();
		$('#dir_calle').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_calle').parent().append('<span id="icono_dir_calle" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_calle').text("Longitud no valida 5-20").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_dir_calle').remove();
		$('#dir_calle').parent().attr("class", "form-group has-success has-feedback");
		$('#dir_calle').parent().children("span").text("").hide();
		$('#text_dir_calle').parent().append('<span id="icono_dir_calle" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarDirNumero(){
	var valor = document.getElementById("dir_numero").value;
	let numeros = /[0-9]{1,10}[a-zA-Z]{0,2}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) || valor.length > 10){
		$('#icono_dir_numero').remove();
		$('#dir_numero').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_numero').parent().append('<span id="icono_dir_numero" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_num').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( numeros.test(valor)==false){
		$('#icono_dir_numero').remove();
		$('#dir_numero').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_numero').parent().append('<span id="icono_dir_numero" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_num').text("longitud permitida 1-12").show();
		estado  = "false";
	}else{
		$('#icono_dir_numero').remove();
		$('#dir_numero').parent().attr("class", "form-group has-success has-feedback");
		$('#dir_numero').parent().children("span").text("").hide();
		$('#dir_numero').parent().append('<span id="icono_dir_numero" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarDirEntreCalle(){
	var valor = document.getElementById("dir_entre").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{2,30}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,30}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,30}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,30}\s{0,1}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_dir_entre').remove();
		$('#dir_entre').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_entre').parent().append('<span id="icono_dir_calle" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_enc').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_dir_entre').remove();
		$('#dir_entre').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_entre').parent().append('<span id="icono_dir_calle" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_enc').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_dir_entre').remove();
		$('#dir_entre').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_entre').parent().append('<span id="icono_dir_calle" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_enc').text("Longitud no valida 4-60").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_dir_entre').remove();
		$('#dir_entre').parent().attr("class", "form-group has-success has-feedback");
		$('#dir_entre').parent().children("span").text("").hide();
		$('#text_dir_enc').parent().append('<span id="icono_dir_entre" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}


function validarNuevaDireccion_E(){
	var dir_id_E = validarDirEmp_E();
	var dir_p_E = validarDirPais_E();
	var dir_e_E = validarDirEstado_E();
	var dir_m_E = validarDirMunicipio_E();
	var dir_c_E = validarDirColonia_E();
	var dir_ca_E =validarDirCalle_E();
	var dir_n_E =validarDirNumero_E();
	var dir_en_E =validarDirEntreCalle_E();

	if (dir_id_E=="true" && dir_p_E=="true" && dir_e_E=="true" && dir_m_E=="true"
	 && dir_c_E=="true" && dir_ca_E=="true" && dir_n_E=="true" && dir_en_E=="true") {
		alertify.success("Enviando datos...");
	    actualizaDatosdir();
	}else{
		alertify.error('Favor de revisar datos');
	}
}

function validarDirEmp_E(){
	var valor = document.getElementById("dir_idempleadoAct").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_dir_empAct').remove();
		$('#dir_idempleadoAct').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_idempleadoAct').parent().append('<span id="icono_dir_empAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_empAct').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_dir_empAct').remove();
		$('#dir_idempleadoAct').parent().attr("class", "form-group has-success has-feedback");
		$('#dir_idempleadoAct').parent().children("span").text("").hide();
		$('#dir_idempleadoAct').parent().append('<span id="icono_dir_empAct" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("formato: "+valor);
	console.log("final :"+estado);
	return estado;
}
function validarDirPais_E(){
	var valor = document.getElementById("dir_paisAct").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{4,30}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_dir_paisAct').remove();
		$('#dir_paisAct').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_paisAct').parent().append('<span id="icono_dir_paisAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_paisAct').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_dir_paisAct').remove();
		$('#dir_paisAct').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_paisAct').parent().append('<span id="icono_dir_paisAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_paisAct').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_dir_paisAct').remove();
		$('#dir_paisAct').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_paisAct').parent().append('<span id="icono_dir_paisAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_paisAct').text("Longitud no valida 5-20").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_dir_paisAct').remove();
		$('#dir_paisAct').parent().attr("class", "form-group has-success has-feedback");
		$('#dir_paisAct').parent().children("span").text("").hide();
		$('#text_dir_paisAct').parent().append('<span id="icono_dir_paisAct" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarDirEstado_E(){
	var valor = document.getElementById("dir_estadoAct").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{4,30}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,30}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,30}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_dir_estadoAct').remove();
		$('#dir_estadoAct').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_estadoAct').parent().append('<span id="icono_dir_estadoAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_estadoAct').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_dir_estadoAct').remove();
		$('#dir_estadoAct').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_estadoAct').parent().append('<span id="icono_dir_estadoAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_estadoAct').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_dir_estadoAct').remove();
		$('#dir_estadoAct').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_estadoAct').parent().append('<span id="icono_dir_estadoAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_estadoAct').text("Longitud no valida 5-20").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_dir_estadoAct').remove();
		$('#dir_estadoAct').parent().attr("class", "form-group has-success has-feedback");
		$('#dir_estadoAct').parent().children("span").text("").hide();
		$('#text_dir_estadoAct').parent().append('<span id="icono_dir_estadoAct" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarDirMunicipio_E(){
	var valor = document.getElementById("dir_municipioAct").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{4,30}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,30}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,30}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_dir_municipioAct').remove();
		$('#dir_municipioAct').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_municipioAct').parent().append('<span id="icono_dir_municipioAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_municipioAct').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_dir_municipioAct').remove();
		$('#dir_municipioAct').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_municipioAct').parent().append('<span id="icono_dir_municipioAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_municipioAct').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_dir_municipioAct').remove();
		$('#dir_municipioAct').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_municipioAct').parent().append('<span id="icono_dir_municipioAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_municipioAct').text("Longitud no valida 5-20").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_dir_municipioAct').remove();
		$('#dir_municipioAct').parent().attr("class", "form-group has-success has-feedback");
		$('#dir_municipioAct').parent().children("span").text("").hide();
		$('#text_dir_municipioAct').parent().append('<span id="icono_dir_municipioAct" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarDirColonia_E(){
	var valor = document.getElementById("dir_coloniaAct").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{2,30}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,30}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,30}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_dir_coloniaAct').remove();
		$('#dir_coloniaAct').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_coloniaAct').parent().append('<span id="icono_dir_coloniaAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_coloniaAct').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_dir_coloniaAct').remove();
		$('#dir_coloniaAct').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_coloniaAct').parent().append('<span id="icono_dir_coloniaAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_coloniaAct').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_dir_coloniaAct').remove();
		$('#dir_coloniaAct').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_coloniaAct').parent().append('<span id="icono_dir_coloniaAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_coloniaAct').text("Longitud no valida 5-20").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_dir_coloniaAct').remove();
		$('#dir_coloniaAct').parent().attr("class", "form-group has-success has-feedback");
		$('#dir_coloniaAct').parent().children("span").text("").hide();
		$('#text_dir_coloniaAct').parent().append('<span id="icono_dir_coloniaAct" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarDirCalle_E(){
	var valor = document.getElementById("dir_calleAct").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{4,30}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,30}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,30}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_dir_calleAct').remove();
		$('#dir_calleAct').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_calleAct').parent().append('<span id="icono_dir_calleAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_calleAct').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_dir_calleAct').remove();
		$('#dir_calleAct').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_calleAct').parent().append('<span id="icono_dir_calleAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_calleAct').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_dir_calleAct').remove();
		$('#dir_calleAct').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_calleAct').parent().append('<span id="icono_dir_calleAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_calleAct').text("Longitud no valida 5-20").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_dir_calleAct').remove();
		$('#dir_calleAct').parent().attr("class", "form-group has-success has-feedback");
		$('#dir_calleAct').parent().children("span").text("").hide();
		$('#text_dir_calleAct').parent().append('<span id="icono_dir_calleAct" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarDirNumero_E(){
	var valor = document.getElementById("dir_numeroAct").value;
	let numeros = /[0-9]{1,10}[a-zA-Z]{0,2}/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) || valor.length > 10){
		$('#icono_dir_numeroAct').remove();
		$('#dir_numeroAct').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_numeroAct').parent().append('<span id="icono_dir_numeroAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_numAct').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if( numeros.test(valor)==false){
		$('#icono_dir_numeroAct').remove();
		$('#dir_numeroAct').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_numeroAct').parent().append('<span id="icono_dir_numeroAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_numAct').text("longitud permitida 1-12").show();
		estado  = "false";
	}else{
		$('#icono_dir_numeroAct').remove();
		$('#dir_numeroAct').parent().attr("class", "form-group has-success has-feedback");
		$('#dir_numeroAct').parent().children("span").text("").hide();
		$('#dir_numeroAct').parent().append('<span id="icono_dir_numeroAct" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}
function validarDirEntreCalle_E(){
	var valor = document.getElementById("dir_entreAct").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{2,30}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,30}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,30}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,30}\s{0,1}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == null || valor.length == 0 || espacios.test(valor) ){
		$('#icono_dir_entreAct').remove();
		$('#dir_entreAct').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_entreAct').parent().append('<span id="icono_dir_entreAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_encAct').text("Ingrese un caracter").show();
		estado  = "false";
		console.log(estado);
	}else if(numeros.test(valor)){
		$('#icono_dir_entreAct').remove();
		$('#dir_entreAct').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_entreAct').parent().append('<span id="icono_dir_entreAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_encAct').text("Numeros no validos").show();
		estado  = "false";
		console.log(estado);
	}else if( letras.test(valor)==false ){
		$('#icono_dir_entreAct').remove();
		$('#dir_entreAct').parent().attr("class", "form-group has-error has-feedback");
		$('#dir_entreAct').parent().append('<span id="icono_dir_entreAct" class="icon-cross form-control-feedback mt-2" style="top:32px;"></span>');
		$('#text_dir_encAct').text("Longitud no valida 4-60").show();
		estado  = "false";
		console.log(estado);
	}else{
		$('#icono_dir_entreAct').remove();
		$('#dir_entreAct').parent().attr("class", "form-group has-success has-feedback");
		$('#dir_entreAct').parent().children("span").text("").hide();
		$('#text_dir_encAct').parent().append('<span id="icono_dir_entreAct" class="icon-checkmark form-control-feedback mt-2" style="top:32px;"></span>');
		estado  = "true";
		console.log(estado);
	}
	console.log("final :"+estado);
	return estado;
}